@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Pekerjaan Alumni</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3> Daftar Pekerjaan ILMU KOMPUTER UNMUL</h3>
            </div>
            <div class="col-sm-2">
                <a class="btn btn-success" href="{{ route('pekerjaan.create') }}"> Tambah Pekerjaan </a>
            </div>
        </div>
        <br>

        <form method="GET" action="{{ route('pekerjaan.index') }}">
            <div class="row">
                <div class="col-md-3">
                    <select name="searchBy" class="form-control">
                        <option value="namaPekerjaan">Cari Nama Pekerjaan</option>
                        <option value="alamatPekerjaan">Cari Alamat Pekerjaan</option>
                        <option value="nomorPekerjaan">Cari Nomor HP Pekerjaan</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" name="searchTerm" class="form-control" placeholder="Masukkan kata kunci" value="{{ request()->get('searchTerm') }}">
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
                    <th width="180px">Nama Pekerjaan</th>
                    <th width="270px">Alamat Pekerjaan</th>
                    <th width="180px">Nomor HP Pekerjaan</th>
                    <th width="210px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pekerjaan as $pekerjaanItem)
                    <tr>
                        <td><b>{{ ++$i }}.<b></td>
                        <td>{{ $pekerjaanItem->namaPekerjaan }}</td>
                        <td>{{ $pekerjaanItem->alamatPekerjaan }}</td>
                        <td>{{ $pekerjaanItem->nomorPekerjaan }}</td>
                        <td>
                            <form action="{{ route('pekerjaan.destroy', $pekerjaanItem->id) }}" method="post">
                                <a class="btn btn-sm btn-success" href="{{ route('pekerjaan.show', $pekerjaanItem->id) }}">Show</a>
                                <a class="btn btn-sm btn-warning" href="{{ route('pekerjaan.edit', $pekerjaanItem->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $pekerjaan->links() !!}
    </div>
    </body>

</html>

@endsection
