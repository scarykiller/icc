<?php

namespace App\Repositories;

use App\User;

class UserRepository extends ResourceRepository
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function updateMail($email){
        $this->model->where('email', 'San Diego')
            ->update(['email' => $email]); // this will also update the record


    }


}