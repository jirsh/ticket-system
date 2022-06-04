<?php

namespace App\View\Components\Tickets;

use Illuminate\View\Component;

class Preview extends Component
{
    public $id, $title, $author, $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $author, $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tickets.preview');
    }
}
