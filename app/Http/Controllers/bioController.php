<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bioModel;
// use Illuminate\Support\Facades\Session;

use Session;

class bioController extends Controller
{
    public function index(){
        $bio=bioModel::all();
        return view('pages.tabel', ['bio'=>$bio]);
    }

    public function ubah($id){
        $bioUbah=bioModel::findOrFail($id);
        // dd($bioUbah)
        return view('pages.ubah', ['bioUbah' => $bioUbah]);
    }

    public function hapusData($idHapus){
        $bioHapus=bioModel::findOrFail($idHapus);
        $bioHapus->delete();
        Session::flash('sukses', 'Hapus data SUKSES!!');
        return redirect('/data');
    }

    public function simpanData(Request $request){
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'email' => 'required',
            'nis' => 'required',
            'tgllahir' => 'required',
        ],
        [
            'nama.required'=>'Nama tidak boleh kosong',
            'kelas.required'=>'Kelas tidak boleh kosong',
            'nis.required'=>'NIS tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'tgllahir.required'=>'Tanggal Lahir tidak boleh kosong',
        ]);

        $data=bioModel::create([
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'nis'=>$request->nis,
            'email'=>$request->email,
            'tgllahir'=>$request->tgllahir,
        ]);

        if($data){
            Session::flash('sukses', 'Tambah Data SUKSES!1!1!1');
            return redirect('/data');
        }
    }

    public function ubahData($id, Request $request){
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'email' => 'required',
            'nis' => 'required',
            'tgllahir' => 'required',
        ],
        [
            'nama.required'=>'Nama tidak boleh kosong',
            'kelas.required'=>'Kelas tidak boleh kosong',
            'nis.required'=>'NIS tidak boleh kosong',
            'email.required'=>'Email tidak boleh kosong',
            'tgllahir.required'=>'Tanggal Lahir tidak boleh kosong',
        ]);

        $bioUpdate=bioModel::findOrFail($id);
        $bioUpdate->nama=$request->nama;
        $bioUpdate->kelas=$request->kelas;
        $bioUpdate->email=$request->email;
        $bioUpdate->nis=$request->nis;
        $bioUpdate->tgllahir=$request->tgllahir;
        $bioUpdate->save();

        Session::flash('sukses', 'Update Data Sukses!!');
        return redirect('/data');
    }
}
