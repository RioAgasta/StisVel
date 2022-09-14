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
        return view('menus.profile', [
            "biodata"=>bioModel::where('email', auth()->user()->email)->firstOrFail()
        ]);
    }
}
