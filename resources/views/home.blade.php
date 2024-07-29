@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="mb-3">You are logged in!</h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Mahasiswa</h5>
                                    <p class="card-text">View all Mahasiswa records.</p>
                                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-light">View Mahasiswa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pekerjaan</h5>
                                    <p class="card-text">View all Pekerjaan records.</p>
                                    <a href="{{ route('pekerjaan.index') }}" class="btn btn-light">View Pekerjaan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
