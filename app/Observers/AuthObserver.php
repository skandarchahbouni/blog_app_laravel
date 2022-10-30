<?php

namespace App\Observers;
use App\Models\User;

class AuthObserver
{
    public function created(User $user){
        info("{$user->name} registerd.");
    }
}
