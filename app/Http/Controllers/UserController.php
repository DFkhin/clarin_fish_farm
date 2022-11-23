<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function profile() {
        $user = auth()->user();
        return view('profile.profile',[
            'user' => $user
        ]);
    }
    
}
