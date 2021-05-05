<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authController extends Controller
{
    public function register(Request $request)
    {
        $user= new User;
        $user->name=$request->name;
        $user->email=$request->inputEmail4;
        $user->code_melli=$request->code_melli;
        $user->phone_number=$request->phone_number;
        $user->password=Hash::make($request->inputPassword4);
        $user->save();
        return redirect()->route('login');
    }
    public function register_page()
    {
        return view('auth.register');
    }
    public function login_page()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $user=User::where('code_melli',$request->code_melli)->first();
        if(Hash::make($request->inputPassword4)==$user->password){
            return view('welcome');
        }
        return redirect()->route('login');
    }
}
