<?php

use App\Events\Chat\ExampleTwo;
use App\Events\Example;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/broadcast', function () {
    broadcast(new Example(
        User::where('email', 'admin@gmail.com')->firstOrFail(),
        Message::find(1)
    ));
    broadcast(new ExampleTwo);

    return response()->json([
        'message' => 'Event broadcasted',
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
