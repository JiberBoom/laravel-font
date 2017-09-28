<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\SendEmailToUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users= User::all();

        foreach ($users as $user){

            $this->dispatch(new  SendEmailToUser($user));
        }
    }
}
