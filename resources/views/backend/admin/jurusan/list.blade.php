@extends('backend.layout.master')

@section('css')

@endsection

@section('title', $title)

@section('content')

<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-bg-cyan">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">school</i> Jurusan</a></li>
            <li class="active"><i class="material-icons">archive</i> Data</li>
        </ol>
        <div class="block-header">
        </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-indigo" >
                            <h2>
                                 <i class="material-icons">school</i> Data Jurusan <small>Halaman ini memuat data jurusan Keteknikan di Perguruan Tinggu yang telah tersimpan di dalam sistem.</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div>
                                <div class="demo-button-groups">
                                    <div class="btn-group " role="group">
                                        <a href="{{route('jurusan.create')}}" class="btn btn-primary waves-effect"><i class="material-icons">add</i> Tambah</a>
                                        <button type="button" data-toggle="modal" data-target="#import" class="btn btn-info waves-effect "><i class="material-icons">file_upload</i> Import</button>
                                        <a target="_blank" href="{{route('jurusan.print')}}" class="btn btn-success waves-effect"><i class="material-icons">print</i> Cetak</a>
                                    </div>       
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jurusan</th>
                                            <th>Kepribadian Terkait</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Edit/Hapus</th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($jurusan as $kep)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$kep->jurusan}}</td>
                                            <td>{{$kep->kepribadian->kepribadian}}</td>
                                            <td>{{$kep->deskripsi}}</td>
                                            <td><img src="{{asset('storage/gambar/'.$kep->gambar)}}" style="width: 50%;" class="img-thumbnail"></td>
                                            <td>
                                                <a href="{{route('jurusan.edit',$kep->id)}}" class="btn bg-lime btn-circle waves-effect waves-circle waves-float">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button type="button" data-toggle="modal" data-target="#defaultModal{{$kep->id}}" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                    <i class="material-icons">delete</i>
                                                </button>

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
@foreach($jurusan as $kep)
<div class="modal fade" id="defaultModal{{$kep->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body" style="text-align: center;">
               <i class="material-icons" style="font-size: 100px;color: red;display: inline-block;width: 100%;">error_outline</i>
               <h4 align="center">Apa Anda yakin ?</h4>
               <p align="center">Anda ingin menghapus data jurusan : <b>{{$kep->jurusan}}</b> ?</p>

                <button type="button" style="color: white;" class="btn btn-link btn-warning waves-effect" data-dismiss="modal">BATAL</button>
                
                <a href="{{route('jurusan.destroy',$kep->id)}}" style="color: white;" class="btn btn-link btn-danger waves-effect">HAPUS</a>
     
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
            <form action="{{route('jurusan.import')}}" method="POST" enctype="multipart/form-data">
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