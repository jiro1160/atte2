<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class RegisteredUserController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }
}
