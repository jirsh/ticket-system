<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class Homepage extends Controller
{
    /**
     * Renders the homepage
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tickets = Ticket::select(["id", "title", "author", "status"])
                            ->orderBy('updated_at', 'desc')
                            ->paginate(5);
        return view('index', ['tickets' => $tickets]);
    }
}
