@extends('layouts.default')

@section('title', 'Tambah Siswa')

@section('content')

    <form class="container" enctype="multipart/form-data" method="POST" action="{{ route('student.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
        @if($errors->first('name'))
            <p style="color:red">{{ $errors->first('name') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="address" class="form-control" placeholder="Masukan Alamat">
        @if($errors->first('address'))
        <p style="color:red">{{ $errors->first('address') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label>Umur</label>
        <input type="text" name="age" class="form-control" placeholder="Masukan Umur">
        @if($errors->first('age'))
        <p style="color:red">{{ $errors->first('age') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" placeholder="Masukan Email">
        @if($errors->first('email'))
        <p style="color:red">{{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control" placeholder="Masukan Email">
       
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br/>
    @if($errors->any())
        <div class="container alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
        </div>
    @endif

@stop