<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{$title}}</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        table.static{
            position: relative;
            border: 0px solid #543535;

        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="form-group">
                <hr>
                <h4 align="center">SISTEM PEMILIHAN KEJURUAN</h4>
                <h4 align="center">BIDANG KETEKNIKAN PERGURUAN TINGGI</h4>
                <br>
                <hr>
                <p align="center">DATA HASIL ANALISA MAHASISWA</p>
                <hr>
                <table class="table table-bordered" align="center"  rules="all" border="1px" style="width: 95%;">
                    <thead align="center">
                        <tr>
                             <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jurusan</th>
                                            <th>Tingkat Kepercayaan</th>
                                            <th>Tanggal Test</th>
                                            <th>Persentase Latar Belakang Keluarga</th>
                                            <th>Status</th>


                                        </tr>
               

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
                                           
                                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>