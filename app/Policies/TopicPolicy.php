<?php

namespace App\Policies;

use App\Topic;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    // check if the user owns a topi or not returns true or false
    public function update(User $user, Topic $topic) {
        return $user->ownsTopic($topic);
    }
}
