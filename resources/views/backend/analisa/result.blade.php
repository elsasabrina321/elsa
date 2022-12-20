@extends('backend.layout.master')

@section('css')

@endsection

@section('title', $title)

@section('content')

<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-bg-cyan">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">check_circle</i> Hasil Analisa</a></li>
            <li class="active"><i class="material-icons">archive</i> Data</li>
        </ol>
        <div class="block-header">
        </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-indigo" >
                            <h2>
                                 <i class="material-icons">check_circle</i> Hasil Analisa <small>Halaman ini memuat data Hasil Analisa yang telah tersimpan di dalam sistem, gunakan halaman ini untuk verifikasi Hasil analisa mahasiswa</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div>
                                <div class="demo-button-groups">
                                    <div class="btn-group " role="group">
                                     <!--
                                        <a href="{{route('user.create')}}" class="btn btn-primary waves-effect"><i class="material-icons">add</i> Tambah</a>
                                       
                                        <button type="button" data-toggle="modal" data-target="#import" class="btn btn-info waves-effect "><i class="material-icons">file_upload</i> Import</button>
                                    -->
                                        <a target="_blank" href="{{route('analisa.cetak')}}" class="btn btn-success waves-effect"><i class="material-icons">print</i> Cetak</a>
                                    </div>       
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jurusan</th>
                                            <th>Tingkat Kepercayaan</th>
                                            <th>Tanggal Test</th>
                                            <th>Persentase Latar Belakang Keluarga</th>
                                            <th>Status</th>
                                            <th>Verifikasi</th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($datas as $kep)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$kep->user->name}}</td>
                                            <td>{{$kep->rule->jurusan->jurusan}}</td>
                                            <td>{{round($kep->tingkat_kepercayaan,2)}}</td>
                                            <td>{{$kep->tanggal}}</td>
                                                @php
                                                    $cari2 = App\Models\Family::where('analisa_id',$kep->id)->first();
                                                @endphp
                                                <td>{{round($cari2->persentase,2)}}</td>
                                            <td>{{$kep->status}}</td>                              
                                            <td>
                                                @if($kep->status =='Pending')
                                                <button type="button" data-toggle="modal" data-target="#defaultModal{{$kep->id}}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                                    <i class="material-icons">check_circle</i>
                                                </button>
                                                @else
                                                Sudah Diverifikasi
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</section>
@foreach($datas as $kep)
<div class="modal fade" id="defaultModal{{$kep->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body" style="text-align: center;">
               <i class="material-icons" style="font-size: 100px;color: green;display: inline-block;width: 100%;">check_circle</i>
               <h4 align="center">Apa Anda yakin ?</h4>
               <p align="center">Anda ingin Melakukan Verifikasi Data Kejuruan Untuk User : <b>{{$kep->user->name}}</b> ?</p>

                <button type="button" style="color: white;" class="btn btn-link btn-warning waves-effect" data-dismiss="modal">BATAL</button>
                
                <a href="{{route('analisa.verifikasi',$kep->id)}}" style="color: white;" class="btn btn-info btn-danger waves-effect">VERIFIKASI</a>
     
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="import" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Import Excel</h4>
            </div>
            <hr>
            <form action="{{route('user.import')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group mb-4">
                    <div class="custom-file text-left">
                        <label class="custom-file-label" for="customFile">Pilih file dengan ekstensi .csv/.xls/,xlsx</label>
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" style="color: white;" class="btn btn-link btn-info waves-effect">Import</button>
                <button type="button" style="color: white;" class="btn btn-link btn-danger waves-effect" data-dismiss="modal">batal</button>
            </div>
            </form>
        </div>
    </div>
</div>
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

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('asset/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('asset/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<!-- Bootstrap Notify Plugin Js -->
<script src="{{asset('asset/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

<!-- SweetAlert Plugin Js -->
<script src="{{asset('asset/plugins/sweetalert/sweetalert.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('asset/js/admin.js')}}"></script>
<script src="{{asset('asset/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('asset/js/pages/ui/dialogs.js')}}"></script>
        <script src="{{asset('asset/js/pages/ui/modals.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('asset/js/demo.js')}}"></script>
@endsection