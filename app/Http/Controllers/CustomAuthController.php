<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stock;
use App\Models\AllTransaction;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function construct()
    {
        $this->middleware('auth')->only('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function custom_login(Request $request)
    {
        $request->validate([
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential))
        {
            return redirect()->intended('dashboard')->withSuccess('Login Successfully');
        }

        return redirect('login')->with('error', 'Login Details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function custom_registration(Request $request)
    {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'name'      =>  $data['name'],
            'email'     =>  $data['email'],
            'password'  =>  Hash::make($data['password']),
            'type'      =>  'Admin'
        ]);

        return redirect('login')->with('success', 'Registration Complete');
    }

    public function dashboard()
    {
        if(Auth::check())
        {
            return view('pages.dashboard');
        }

        return redirect('login');
    }

    public function transaction()
    {
        if(Auth::check())
        {
            return view('transaction');
        }

        return redirect('login');
    }
    public function logout()
    {
        Session::flush();
        auth()->logout();
        return redirect('login')->with('Info','You have been logged out.');
    }

    public function statbox()
    {
       
        $total_transaction = AllTransaction::count();
        $total_admin = User::count();
        $total_tilapia = Stock::sum('tilapia_stock');
        $total_ornamental = Stock::sum('ornamental_stock');
        $total_carp = Stock::sum('carp_stock');
        $total_beetle_fish = Stock::sum('beetle_fish_stock');
        $total_cat_fish= Stock::sum('cat_fish_stock');

        $total_tilapia_sold = AllTransaction::sum('tilapia');
        $total_ornamental_sold = AllTransaction::sum('ornamental');
        $total_carp_sold = AllTransaction::sum('carp');
        $total_beetle_fish_sold = AllTransaction::sum('beetle_fish');
        $total_cat_fish_sold = AllTransaction::sum('cat_fish');

        
        $total_stocks = $total_tilapia+$total_ornamental+$total_carp+$total_beetle_fish+$total_cat_fish;
        $total_fish_sold = $total_tilapia_sold+$total_ornamental_sold+$total_carp_sold+$total_beetle_fish_sold+$total_cat_fish_sold;

        return view('pages.dashboard', compact('total_transaction','total_admin','total_stocks','total_fish_sold'));

    }
}
