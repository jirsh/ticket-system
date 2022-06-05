<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\AttachmentController;

// I know, I can use Route::controller and/or Route::name here but it's not needed for 5 routes.

Route::get('/', [HomepageController::class, 'index'])
    ->name('home');

Route::get('/tickets/{id}', [TicketsController::class, 'show'])
    ->whereNumber('id')
    ->name('ticket.show');

Route::post('/tickets', [TicketsController::class, 'store'])
    ->name('tickets.new');

Route::post('/reply/{ticketId}', [RepliesController::class, 'store'])
    ->whereNumber('ticketId')
    ->name('reply.new');

Route::get('/attachment/{id}', [AttachmentController::class, 'download'])
    ->whereNumber('id')
    ->name('attachment.download');
