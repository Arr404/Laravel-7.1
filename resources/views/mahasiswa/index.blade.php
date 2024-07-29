@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Alumni</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3> Daftar Alumni ILMU KOMPUTER UNMUL</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Tambah Alumni </a>
            </div>
        </div>
        <br>

        <form method="GET" action="{{ route('mahasiswa.index') }}">
            <div class="row">

                <div class="col-md-6">
                    <input type="text" name="searchTerm" class="form-control" placeholder="Masukkan kata kunci" value="{{ request()->get('searchTerm') }}">
                </div>
                <div class="col-md-3">
                    <select name="searchBy" class="form-control">
                        <option value="namaMahasiswa">Nama</option>
                        <option value="nimMahasiswa">NIM</option>
                        <option value="angkatanMahasiswa">Angkatan</option>
                        <option value="judulskripsiMahasiswa">Judul Skripsi</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="40px"><b>No.</b></th>
                    <th width="180px">Nama Mahasiswa</th>
                    <th width="100px">NIM</th>
                    <th width="100px">Angkatan</th>
                    <th>Judul Skripsi</th>
                    <th width="210px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswas as $mahasiswa)
                    <tr>
                        <td><b>{{ ++$i }}.<b></td>
                        <td>{{ $mahasiswa->namaMahasiswa }}</td>
                        <td>{{ $mahasiswa->nimMahasiswa }}</td>
                        <td align="center">{{ $mahasiswa->angkatanMahasiswa }}</td>
                        <td>{{ $mahasiswa->judulskripsiMahasiswa }}</td>
                        <td>
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post">
                                <a class="btn btn-sm btn-success" href="{{ route('mahasiswa.show', $mahasiswa->id) }}">Show</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('mahasiswa.edit', $mahasiswa->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $mahasiswas->links() !!}
    </div>
    </body>
</html>

@endsection
