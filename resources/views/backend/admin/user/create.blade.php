@extends('backend.layout.master')

@section('css')

@endsection

@section('title',$title)

@section('content')

<section class="content">
    
    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-bg-cyan">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">account_circle</i> User</a></li>
            <li class="active"><i class="material-icons">add</i> Tambah</li>
        </ol>
        <div class="block-header">
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                             <i class="material-icons">add</i> Tambah User <small>Gunakan halaman ini untuk menambahkan data user baru.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Nama</label>
                            <div class="form-group">
                                <div class="form-line {{ $errors->has('name') ? 'focused error' : '' }}">
                                    <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control" placeholder="Nama User">
                                </div>
                                @if ($errors->has('name'))
                                     <small style="color: red">{{ $errors->first('name') }}</small><br>
                                @endif
                            </div>
                            
                            <label for="username">Username</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" value="{{ old('username') }}" id="username" name="username" class="form-control" placeholder="Username">
                                </div>
                                @if ($errors->has('username'))
                                     <small style="color: red">{{ $errors->first('username') }}</small><br>
                                @endif
                            </div>

                            <label for="email">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" value="{{ old('email') }}" id="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                @if ($errors->has('email'))
                                     <small style="color: red">{{ $errors->first('email') }}</small><br>
                                @endif
                            </div>

                            <label for="password">Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" value="{{ old('password') }}" id="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                @if ($errors->has('password'))
                                     <small style="color: red">{{ $errors->first('password') }}</small><br>
                                @endif
                            </div>

                            <label for="role">Role</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control" name="role">
                                        <option>admin</option>
                                        <option>kaprodi</option>
                                        <option>mahasiswa</option>
                                    </select>
                                </div>
                                @if ($errors->has('role'))
                                     <small style="color: red">{{ $errors->first('role') }}</small><br>
                                @endif
                            </div>
                            
                            <label for="avatar1">Avatar</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" value="{{ old('avatar1') }}" id="avatar1" name="avatar1" class="form-control">
                                </div>
                                @if ($errors->has('avatar1'))
                                     <small style="color: red">{{ $errors->first('avatar1') }}</small><br>
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