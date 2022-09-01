@extends('layouts.master')

@section('Header', 'Formulir')
@section('formulir')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/simpanData">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input name="nama" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Enter Your Name">
                @if ($errors->has('nama'))
                <div class="class">
                    {{$errors->first('nama')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Class</label>
                <input name="kelas" type="text" class="form-control" id="exampleInputClass1" aria-describedby="classHelp" placeholder="Enter Your Class">
                @if ($errors->has('kelas'))
                <div class="class">
                    {{$errors->first('kelas')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                @if ($errors->has('email'))
                <div class="class">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>NIS</label>
                <input name="nis" type="tel" class="form-control" id="exampleInputNis1" placeholder="NIS">
                @if ($errors->has('nis'))
                <div class="class">
                    {{$errors->first('nis')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input name="tgllahir" type="date" class="form-control" id="exampleInputDate1" aria-describedby="dateHelp" placeholder="Enter Your Birth Date">
                @if ($errors->has('tgllahir'))
                <div class="class">
                    {{$errors->first('tgllahir')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
