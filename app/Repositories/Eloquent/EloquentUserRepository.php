<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class EloquentUserRepository implements UserRepository
{
    public function save()
    {
        return '123412';
    }
}
