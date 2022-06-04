<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowReply extends Component
{
    public $reply;
    public $isEditing;

    protected $rules = [
        'reply.body' => 'required|min:3',
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
    }

    public function delete()
    {
        $this->reply->delete();
    }
}
