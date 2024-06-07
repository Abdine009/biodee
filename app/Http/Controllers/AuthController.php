<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;



class AuthController extends Controller
{
    //

    public function login (){
        return view('auth.login');
    }

    public function doLogin (LoginRequest $request){

        $validatedData= $request->validated();

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return to_route('auth.login')->withErrors([
            'email'=> "Pas de correspondance entre l'email et le mot de passe saisi"
        ])->onlyInput('email');

    }

    public function logout (){
        Auth::logout();
        return to_route('auth.login');
    }


    public function create(){

        return view("auth.createAnAccount");
    }
    public function docreate(UserRequest $request){

        $validatedData = $request->validated();

        $user=User:: create ($validatedData);
        return Redirect::route('dashboard')->with('success', 'Compte créé avec succès !');

        
    }
    
}
