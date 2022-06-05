<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTickets extends Component
{
    use WithPagination;

    public $search = '';

    public $filter = '*';

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
                ->when($this->search !== '', fn ($collection) => $collection->where('title', 'like', '%' . $this->search . '%'))
                ->when($this->filter !== '*', fn ($collection) => $collection->where('status', $this->filter))
                ->orderBy('updated_at', 'desc')
                ->paginate(5)
        ]);
    }
}
