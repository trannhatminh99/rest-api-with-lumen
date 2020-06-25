<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PostRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class EloquentPostRepository implements PostRepository
{
    public function save()
    {
        return '123412';
    }
}
