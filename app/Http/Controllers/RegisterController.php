<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            return redirect('home');
        }
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        auth()->login($user);
        return redirect('home')->with('success', 'User created successfully.');
    }
}
