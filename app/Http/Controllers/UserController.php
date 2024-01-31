<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        return [
            "user_name" => "Deltablox",
            "user_code" => "123"
        ];
    }
}
