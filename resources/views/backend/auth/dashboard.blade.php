@extends('backend.auth.app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-center">Selamat Datang di Halaman Dashboard {{auth()->user()->name}} </h3>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection