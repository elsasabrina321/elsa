@extends('backend.layout.master')

@section('css')

@endsection

@section('title',$title)

@section('content')

<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-bg-cyan">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Kepribadian</a></li>
            <li class="active"><i class="material-icons">add</i> Tambah</li>
        </ol>
        <div class="block-header">
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                             <i class="material-icons">add</i> Tambah Kepribadian <small>Gunakan halaman ini untuk menambahkan data kepribadian baru.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('kepribadian.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="kode">Kode</label>
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('kode') ? 'focused error' : '' }}">
                                    <input type="text" value="{{ old('kode') }}" id="kode" name="kode" class="form-control" placeholder="Kode Kepribadian">
                                </div>
                                @if ($errors->has('kode'))
                                     <small style="color: red">{{ $errors->first('kode') }}</small><br>
                                @endif
                            </div>
                            
                            <label for="kepribadian">Kepribadian</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="{{ old('kepribadian') }}" id="kepribadian" name="kepribadian" class="form-control" placeholder="Kepribadian">
                                </div>
                                @if ($errors->has('kepribadian'))
                                     <small style="color: red">{{ $errors->first('kepribadian') }}</small><br>
                                @endif
                            </div>
                            
                            <label for="deskripsi">Deskripsi</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="deskripsi" value="{{ old('deskripsi') }}" name="deskripsi" class="form-control" placeholder="Deskripsi Singkat">
                                </div>
                                @if ($errors->has('deskripsi'))
                                     <small style="color: red">{{ $errors->first('deskripsi') }}</small><br>
                                @endif
                            </div>
                            
                            <br>
                            <a href="{{route('kepribadian.index')}}" class="btn btn-danger m-t-15 waves-effect"><i class="material-icons">cancel</i> batal</a>
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