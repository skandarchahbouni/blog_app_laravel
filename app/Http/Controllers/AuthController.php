<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['only' => ['login', 'register', 'store', 'authenticate']]);
        $this->middleware('auth', ['only' => 'logout']);
    }

    public function register(){
        return view('register');
    }

    public function store(UserRequest $request){
        // validating 
        $formFields = $request->validated();
        // $formFields = $request->validate([
        //     'name' => 'required|max:20',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6|confirmed'
        // ]);

        // hashing the password 
        $formFields['password'] = bcrypt($formFields['password']);
        // storing 
        $user = User::create($formFields);
        // login
        auth()->login($user);
        // redirecting 
        return redirect()->route('gigs.index');
    }

    
    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['failure' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
