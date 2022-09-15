<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class logController extends Controller
{
    // public function authenticate(Request $request){
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);
 
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
 
    //         return redirect()->intended('/dataReg');
    //     }
 
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }
    
    // public function _construct(){
    //     $this->middleware('guest')->except('LogOut');
    // }

    public function halamanLogin(){
        return view('login.login');
    }

    public function Login(Request $request){
        $credentials=$request->only(['email','password','name']);
        if(Auth::attempt($credentials)){
            return redirect('/dataReg');
        }
        return redirect('/')->with('message', 'Login gagal! Data tidak sesuai!');
    }

    public function Logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function halamanRegister(){
        return view('register.rgform');
    }
}