<?php

namespace App\Http\Livewire;

use App\Models\Attachment;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowReply extends Component
{
    use WithFileUploads;

    public $reply;
    public $isEditing;
    public $files = [];

    protected $rules = [
        'reply.body' => 'required|min:3',
        'files.*' => 'file|max:10000'
    ];

    public function mount($reply)
    {
        $this->reply = $reply;
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.reply');
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();
        $this->reply->save();
        $this->isEditing = false;

        if (empty($this->files))
            return;

        foreach ($this->reply->attachments()->get() as $attachment)
            $attachment->delete(); // delete old attachments, done in this loop to fire event and actually delete from the filesystem

        foreach ($this->files as $file) {
            if (!$file->isValid())
                    continue;
                
            $attachment = new Attachment();
            $attachment->original_file_name = $file->getClientOriginalName();
            $attachment->reply()->associate($this->reply);
            $attachment->save();
            $file->store('files/' . $attachment->id);
        }
    }

    public function delete()
    {
        $this->reply->delete();
    }
}
