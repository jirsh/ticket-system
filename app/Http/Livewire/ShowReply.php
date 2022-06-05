<?php

namespace App\Http\Livewire;

use App\Helpers\AttachmentHelper;
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
        return view('livewire.show-reply');
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

        foreach ($this->reply->attachments as $attachment)
            $attachment->delete(); // delete old attachments, done in this loop to fire event and actually delete from the filesystem

        AttachmentHelper::storeAttachments($this->files, $this->reply);
    }

    public function delete()
    {
        $this->reply->delete();
    }
}
