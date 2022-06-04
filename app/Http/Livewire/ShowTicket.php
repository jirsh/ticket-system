<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowTicket extends Component
{
    public $ticket;
    public $isEditing;

    protected $rules = [
        'ticket.title' => 'required|min:3|max:255',
    ];

    public function mount($ticket)
    {
        $this->ticket = $ticket;
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.ticket');
    }

    public function delete()
    {
        $this->ticket->delete();
        return redirect()->route('home');
    }

    public function edit()
    {
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate();
        $this->ticket->save();
        $this->isEditing = false;
    }

    public function switchStatus()
    {
        $this->ticket->status = $this->ticket->status === 'open' ? 'closed' : 'open';
        $this->ticket->save();
    }
}
