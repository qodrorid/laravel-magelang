@extends('layouts.default')

@section('title', 'Edit Siswa')

@section('content')

    <form class="container" enctype="multipart/form-data" method="POST" action="{{ route('student.update', $student->id) }}">
    <input type="hidden" name="_method" value="put" />
    {{ csrf_field() }}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Masukan Nama">
        @if($errors->first('name'))
            <p style="color:red">{{ $errors->first('name') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="address" value="{{ $student->address }}" class="form-control" placeholder="Masukan Alamat">
        @if($errors->first('address'))
        <p style="color:red">{{ $errors->first('address') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label>Umur</label>
        <input type="text" name="age" value="{{ $student->age }}" class="form-control" placeholder="Masukan Umur">
        @if($errors->first('age'))
        <p style="color:red">{{ $errors->first('age') }}</p>
        @endif
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="{{ $student->email }}" class="form-control" placeholder="Masukan Email">
        @if($errors->first('email'))
        <p style="color:red">{{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="form-group">
        <label>Photo(Kosongkan jika tidak diganti)</label>
        <input type="file" name="photo"  class="form-control">
        
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