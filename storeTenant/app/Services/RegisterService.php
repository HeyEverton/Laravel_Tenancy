<?php

namespace App\Services;

use App\Models\User;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class RegisterService
{
    public function __construct(private User $user)
    {
    }

    public function register($data)
    {
        $data['password'] = bcrypt($data['password']);
        auth()->login($this->user->create($data));

        return true;
    }
}
