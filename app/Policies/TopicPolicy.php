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

    // check if the user owns a topic or not then delete if it is owned
    public function destroy(User $user, Topic $topic) {
        return $user->ownsTopic($topic);
    }
}
