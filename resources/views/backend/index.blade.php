@extends('backend.layout.master')

@section('css')

@endsection

@section('title','Halaman Dashboard')

@section('content')

<section class="content">
	
    <div class="container-fluid">
    	<ol class="breadcrumb breadcrumb-bg-cyan">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        </ol>
        <div class="block-header">
        </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-indigo" >
                            <h2>
                                Selamat Datang <small>Sistem Pilihan Kejuruan Bidang Keteknikan Perguruan Tinggi</small>
                            </h2>
                        </div>
                        <div class="body">
                            Anda Login Sebagai <b>{{auth()->user()->role}}</b>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('asset/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{asset('asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('asset/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('asset/plugins/node-waves/waves.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('asset/js/admin.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('asset/js/demo.js')}}"></script>
@endsection