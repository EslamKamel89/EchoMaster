<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('users.{id}', function (User $user, $id) {
    return (int) $id === (int) $user->id;
});

Broadcast::channel('chat.room.{roomId}', function (User $user, $roomId) {
    return true;
});
