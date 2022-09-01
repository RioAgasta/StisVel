@extends('layouts.master')

@section('Header', 'Registered Accounts')

@section('jadwal pelajaran')
<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr> <!-- Ini yg di file rgtabel.blade.php  -->
                <th scope="col">No.</th>
                <th scope="col">Name</th> <!-- Semua kecuali Name sama E-Mail dihapus -->
                <th scope="col">E-Mail</th> 
                <th scope="col">Password</th><!-- Trus tambahin Password -->
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $n=1; ?>
                @foreach($bio as $p)
                <tr>
                <th scope="row">{{$n++}}</th>
                <td>{{$p->name}}</td>
                <td>{{$p->email}}</td><!-- Yg dibawah sini sama yg di file rgubah juga jangan lupa -->
                <td>******</td>
                <td>
                    <form action="{{route('hapusReg', $p->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="/ubahReg/{{ $p->id }}" class="btn btn-warning btn-sm">Ubah</a>
                        <Button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="formulirReg" class="btn btn-primary">
            <i class="fas fa-plus"></i>
        </a>
    </div>
 </div>
@endsection
