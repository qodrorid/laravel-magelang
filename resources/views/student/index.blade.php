@extends('layouts.default')

@section('title', 'Student')

@section('content')
     
    <h1 class="mr-auto">Data Siswa</h1>
    <div class="form-inline my-2 my-lg-0">
      <a class="btn btn-primary my-sm-0" href="{{ route('student.create') }}">Tambah Data</a>
    </div>
     
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Umur</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
             @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('student.destroy', $student->id) }}">
                            <input type="hidden" name="_method" value="delete" />
                            {{ csrf_field() }}
                            <button type="submit" onclick="return confirm('Hapus {{ $student->name }} ?')" class="btn btn-danger">Hapus</button>
                        </form>
                        <a class="btn btn-primary" href="{{ route('student.edit', $student->id) }}">Update</a>
                         
                    </td>
                </tr>
             @endforeach
        </tbody>
    </table>
     
@stop