<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Session;

class regController extends Controller
{
    public function simpanDataReg(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'name.required'=>'Nama tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'password.required'=>'Password tidak boleh kosong',
        ]);

        $data=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        //Hash::make

        if($data){
            Session::flash('sukses', 'Register Data Sukses!');
            return redirect('/dataReg');
        }
    }

    public function ubahDataReg($id, Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'name.required'=>'Nama tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'password.required'=>'Tanggal Lahir tidak boleh kosong',
        ]);

        $regUpdate=User::findOrFail($id);
        $regUpdate->name=$request->name;
        $regUpdate->email=$request->email;
        $regUpdate->password=$request->password;
        $regUpdate->save();

        Session::flash('sukses', 'Update Data Sukses!!');
        return redirect('/dataReg');
    }

    public function indexReg(){
        $bio=User::all(); 
        return view('register.rgtabel', ['bio'=>$bio]);
    }

    public function ubahReg($id){
        $regUbah=User::findOrFail($id);
        return view('register.rgubah', ['regUbah' => $regUbah]);
    }

    public function hapusDataReg($idHapus){
        $regHapus=User::findOrFail($idHapus);
        $regHapus->delete();
        Session::flash('sukses', 'Hapus data SUKSES!!');
        return redirect('/dataReg');
    }

    public function searchReg(Request $request){
        $searchResult = $request->search;
        $result=User::where('name','like',"%".$searchResult."%")->paginate();
        return view('register.rgtabel',['bio' => $result]);
    }
}
