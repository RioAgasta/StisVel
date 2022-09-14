@extends('layouts.master')

@section('Header', 'Biodata')

@section('jadwal pelajaran')
<div class="card">
    <div class="card-body">
        <form action="/search" method="GET">
            <div class="row mb-3">
                <input class="form-control col-2 ml-3" type="text" name="search" placeholder="Search Table...">
                <input class="btn btn-primary ml-4" type="submit" value="Search">
            </div>
        </form>
        <table class="table">
            <!-- @if ($message = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong style='font-size: 14px'>{{ $message }}</strong>
                </div>
            @endif -->
            <thead>
                <tr> <!-- Ini yang di file tabel.blade.php -->
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">E-Mail</th>
                <th scope="col">NIS</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $n=1; ?>
                @foreach($bio as $p)
                <tr>
                <th scope="row">{{$n++}}</th>
                <td>{{$p->nama}}</td>
                <td>{{$p->kelas}}</td>
                <td>{{$p->email}}</td>
                <td>{{$p->nis}}</td>
                <td>{{$p->tgllahir}}</td>
                <td>
                    <form action="{{route('hapus', $p->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/ubah/{{ $p->id }}" class="btn btn-warning btn-sm">Ubah</a>
                        <Button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="formulir" class="btn btn-primary">
            <i class="fas fa-plus"></i>
        </a>
    </div>
 </div>
@endsection
