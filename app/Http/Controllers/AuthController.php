<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //

    public function login (){
        return view('auth.loggin');
    }

    public function doLogin (LoginRequest $request){

        $validatedData= $request->validated();

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return to_route('auth.loggin')->withErrors([
            'email'=> "Pas de correspondance entre l'email et le mot de passe saisi"
        ])->onlyInput('email');

    }

    public function logout (){
        Auth::logout();
        return to_route('auth.loggin');
    }
    
}
