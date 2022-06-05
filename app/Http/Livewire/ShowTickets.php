<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTickets extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.show-tickets', [
            'tickets' =>
            Ticket::select(["id", "title", "author", "status"])
                ->where('title', 'like', '%' . $this->search . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate(5)
        ]);
    }
}
