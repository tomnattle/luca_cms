<?php
namespace App\Observers;
use App\UserIdAllot;
use App\UserExtra;

class UserObserver{
    public function saving($user)
    {
        //$user->id = UserIdAllot::genId();
    }

    public function saved($user)
    {
        //UserExtra::create([
        //   'u_id' => $user->id,
        //]);
    }

    public function deleted($user)
    {

    }
}