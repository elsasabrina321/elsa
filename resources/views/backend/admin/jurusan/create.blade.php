@extends('backend.layout.master')

@section('css')

@endsection

@section('title',$title)

@section('content')

<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-bg-cyan">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">school</i> Jurusan</a></li>
            <li class="active"><i class="material-icons">add</i> Tambah</li>
        </ol>
        <div class="block-header">
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                             <i class="material-icons">add</i> Tambah Jurusan <small>Gunakan halaman ini untuk menambahkan data jurusan baru.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('jurusan.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="kode">Jurusan</label>
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('jurusan') ? 'focused error' : '' }}">
                                    <input type="text" value="{{ old('jurusan') }}" id="jurusan" name="jurusan" class="form-control" placeholder="Nama Jurusan">
                                </div>
                                @if ($errors->has('jurusan'))
                                     <small style="color: red">{{ $errors->first('jurusan') }}</small><br>
                                @endif
                            </div>
                            
                            <label for="kepribadian_id">Kepribadian Terkait</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="kepribadian_id" class="form-control">
                                        @foreach($kepribadian as $ke)
                                            <option value="{{$ke->id}}">{{$ke->kepribadian}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('kepribadian_id'))
                                     <small style="color: red">{{ $errors->first('kepribadian_id') }}</small><br>
                                @endif
                            </div>
                            
                            <label for="karakteristik">Deskripsi Jurusan</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="karakteristik" value="{{ old('deskripsi') }}" name="deskripsi" class="form-control" placeholder="Deskripsi Jurusan">
                                </div>
                                @if ($errors->has('deskripsi'))
                                     <small style="color: red">{{ $errors->first('deskripsi') }}</small><br>
                                @endif
                            </div>

                            <label for="karakteristik">Thumbnail</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="karakteristik" value="{{ old('gambar1') }}" name="gambar1" class="form-control" placeholder="Gambar">
                                </div>
                                @if ($errors->has('gambar1'))
                                     <small style="color: red">{{ $errors->first('gambar1') }}</small><br>
                                @endif
                            </div>
                            
                            <br>
                            <a href="{{route('jurusan.index')}}" class="btn btn-danger m-t-15 waves-effect"><i class="material-icons">cancel</i> batal</a>
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