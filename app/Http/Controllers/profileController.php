<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bioModel;
use Auth;

class profileController extends Controller
{
    // public function editProfile($id, Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'desc' => 'required',
    //     ],
    //     [
    //         'name.required'=>'Nama tidak boleh kosong',
    //         'email.required'=>'Email tidak boleh kosong',
    //         'desc.required'=>'Tanggal Lahir tidak boleh kosong',
    //     ]);

    //     $profileUpdate=User::findOrFail($id);
    //     $profileUpdate->name=$request->name;
    //     $profileUpdate->email=$request->email;
    //     $profileUpdate->desc=$request->desc;
    //     $profileUpdate->save();

    //     // Session::flash('sukses', 'Update Data Sukses!!');
    //     return redirect('/profile');
    // }

    // public function editProfile($id){
    //     $profileUpdate=User::findOrFail($id);
    //     return view('menus.pfubah', ['profileUpdate' => $profileUpdate]);
    // }

    public function profile(){
        
        // $credentials=$request->only(['email','password','name']);
        // if(Auth::attempt($credentials)){
        //     return redirect('/dataReg');
        // }
        // return redirect('/')->with('message', 'Login gagal! Data tidak sesuai!');
        if(count(bioModel::all()->where('email', auth()->user()->email))=== 0){
            return redirect('/dataReg')->with('error', 'Tidak ditemukan email yang sama!');
        }

        return view('menus.profile', [
            "biodata"=>bioModel::where('email', auth()->user()->email)->firstOrFail()
        ]);

        // return view('menus.profile', [
        //     "biodata"=>bioModel::where('email', auth()->user()->email)->firstOrFail()
        // ]);
    }
}