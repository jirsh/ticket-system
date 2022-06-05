<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    /**
     * Renders the homepage
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }
}
