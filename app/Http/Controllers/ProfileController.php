<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile() {
        $user = auth()->user();
        return view('profile.profile',[
            'user' => $user
        ]);
    }

    function index()
    {
        $data = User::findOrFail(Auth::user()->id);
        return view('profile.profile', compact('data'));
    }

    function update(Request $request) {
        $user = auth()->user();
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
        ]);

        $user = $request->all();

        if(!empty($user['password']))
        {
            $form_data = array(
                'name'      =>  $user['name'],
                'email'     =>  $user['email'],
                'password'  =>  Hash::make($user['password'])
            );
        }
        else
        {
            $form_data = array(
                'name'      =>  $user['name'],
                'email'     =>  $user['email']
            );
        }

        User::whereId(Auth::user()->id)->update($form_data);
        return redirect('profile')->with('Info','Your user profile has been updated.');
    }
}
