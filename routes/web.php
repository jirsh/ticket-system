<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\AttachmentController;

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/tickets/{id}', [TicketsController::class, 'show'])->name('ticket.show');

Route::post('/tickets', [TicketsController::class, 'store'])->name('tickets.new');

Route::post('/reply/{ticketId}', [RepliesController::class, 'store'])->name('reply.new');

Route::get('/attachment/{id}', [AttachmentController::class, 'download'])->name('attachment.download');
