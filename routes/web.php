<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Homepage;
use App\Http\Controllers\Tickets;
use App\Http\Controllers\Replies;
use App\Http\Controllers\Attachment;

Route::get('/', [Homepage::class, 'index'])->name('home');

Route::get('/tickets/{id}', [Tickets::class, 'show'])->name('ticket.show');

Route::get('/attachment/{id}', [Attachment::class, 'download'])->name('attachment.download');

Route::post('/tickets', [Tickets::class, 'post']);

Route::post('/reply/{ticketId}', [Replies::class, 'post']);
