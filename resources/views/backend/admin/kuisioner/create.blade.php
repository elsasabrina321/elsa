@extends('backend.layout.master')

@section('css')

@endsection

@section('title',$title)

@section('content')

<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-bg-cyan">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">assignment</i> Kuisioner Keluarga</a></li>
            <li class="active"><i class="material-icons">add</i> Tambah</li>
        </ol>
        <div class="block-header">
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                             <i class="material-icons">add</i> Tambah Kuisioner Kondisi Keluarga <small>Gunakan halaman ini untuk menambahkan data kuisioner baru.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('soal.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="karakteristik">Soal</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="soal" value="{{ old('soal') }}" name="soal" class="form-control" placeholder="Soal">
                                </div>
                                @if ($errors->has('soal'))
                                     <small style="color: red">{{ $errors->first('soal') }}</small><br>
                                @endif
                            </div>

                            <label for="keterangan">Keterangan</label>
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('keterangan') ? 'focused error' : '' }}">
                                    <input type="text" value="{{ old('keterangan') }}" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan">
                                </div>
                                @if ($errors->has('keterangan'))
                                     <small style="color: red">{{ $errors->first('keterangan') }}</small><br>
                                @endif
                            </div>

                           
                            <br>
                            <a href="{{route('soal.index')}}" class="btn btn-danger m-t-15 waves-effect"><i class="material-icons">cancel</i> batal</a>
                            <button type="reset" class="btn btn-warning m-t-15 waves-effect"><i class="material-icons">refresh</i> reset</button>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect"><i class="material-icons">save</i> simpan</button>
                        </form>
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

<!-- Custom Js -->
<script src="{{asset('asset/js/admin.js')}}"></script>
<script src="{{asset('asset/js/pages/tables/jquery-datatable.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('asset/js/demo.js')}}"></script>
@endsection