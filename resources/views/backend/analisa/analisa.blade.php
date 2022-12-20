

@extends('backend.layout.master')

@section('css')

@endsection

@section('title','Halaman Dashboard')

@section('content')

<section class="content">
	
    <div class="container-fluid">
    	<ol class="breadcrumb breadcrumb-bg-cyan">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">assessment</i> Analisa</a></li>
            <li class="active"><i class="material-icons">check</i> analisa</li>
        </ol>
        <div class="block-header">
        </div>
        <div class="row clearfix">
            
            @if(empty($cek))
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                            <i class="material-icons">assessment</i> Analisa <small>Lakukan Analisa Kepribadian untuk Melihat Rekomendasi Penjuruan Keteknikan</small>
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('analisa.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover "> 
                               <thead class="bg-indigo">
                                   <tr>
                                       <td>No</td>
                                       <td>Karakteristik</td>
                          
                                   </tr>
                               </thead>
                               <tbody>
                                        @foreach($karakteristik as $kar)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{$kar->pertanyaan}}
                                                <div class="form-group">
                                                    <input value="0" type="radio" name="mb[{{$kar->id}}]" id="satu[{{$kar->id}}]" class="with-gap">
                                                    <label for="satu[{{$kar->id}}]">Sangat Tidak Setuju</label>
                                                    <input value="0.2" type="radio" name="mb[{{$kar->id}}]" id="dua[{{$kar->id}}]" class="with-gap">
                                                    <label for="dua[{{$kar->id}}]" class="m-l-20">Tidak Setuju</label>
                                                    <input value="0.4" type="radio" name="mb[{{$kar->id}}]" id="tiga[{{$kar->id}}]" class="with-gap">
                                                    <label for="tiga[{{$kar->id}}]" class="m-l-20">Cukup Tidak Setuju</label>
                                                    <input value="0.6" type="radio" name="mb[{{$kar->id}}]" id="empat[{{$kar->id}}]" class="with-gap">
                                                    <label for="empat[{{$kar->id}}]" class="m-l-20">Cukup Setuju</label>
                                                    <input value="0.8" type="radio" name="mb[{{$kar->id}}]" id="lima[{{$kar->id}}]" class="with-gap">
                                                    <label for="lima[{{$kar->id}}]" class="m-l-20">Setuju</label>
                                                    <input value="1" type="radio" name="mb[{{$kar->id}}]" id="enam[{{$kar->id}}]" class="with-gap">
                                                    <label for="enam[{{$kar->id}}]" class="m-l-20">Sangat Setuju</label>
                                                </div>
                                            </td>
                                        </tr>  
                                        @endforeach
                                        @php $no2 = count($karakteristik); @endphp
                                        @foreach($kuisioner as $kar2)
                                        <tr>
                                            <td>{{$no2+=1}}</td>
                                            <td>
                                                {{$kar2->soal}}
                                                <div class="form-group">
                                                    <input value="0" type="radio" name="kui[{{$kar2->id}}]" id="tujuh[{{$kar2->id}}]" class="with-gap">
                                                    <label for="tujuh[{{$kar2->id}}]">Sangat Tidak Setuju</label>
                                                    <input value="1" type="radio" name="kui[{{$kar2->id}}]" id="delapan[{{$kar2->id}}]" class="with-gap">
                                                    <label for="delapan[{{$kar2->id}}]" class="m-l-20">Tidak Setuju</label>
                                                    <input value="2" type="radio" name="kui[{{$kar2->id}}]" id="sembilan[{{$kar2->id}}]" class="with-gap">
                                                    <label for="sembilan[{{$kar2->id}}]" class="m-l-20">Cukup Tidak Setuju</label>
                                                    <input value="3" type="radio" name="kui[{{$kar2->id}}]" id="sepuluh[{{$kar2->id}}]" class="with-gap">
                                                    <label for="sepuluh[{{$kar2->id}}]" class="m-l-20">Cukup Setuju</label>
                                                    <input value="4" type="radio" name="kui[{{$kar2->id}}]" id="sebelah[{{$kar2->id}}]" class="with-gap">
                                                    <label for="sebelah[{{$kar2->id}}]" class="m-l-20">Setuju</label>
                                                    <input value="5" type="radio" name="kui[{{$kar2->id}}]" id="duabelas[{{$kar2->id}}]" class="with-gap">
                                                    <label for="duabelas[{{$kar2->id}}]" class="m-l-20">Sangat Setuju</label>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2"><button style="float: right;" class="btn btn-info" type="submit">Selesai</button></td>
                                        </tr>
                               </tbody>
                            </table>
             
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                            <i class="material-icons">pie_chart</i>Grafik Hasil Analisa <small>Berikut Grafik Hasil dari analisa yang sudah dilakukan</small>
                        </h2>
                    </div>
                    <div class="body">
  
                        <canvas id="bar_chart" height="150"></canvas>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                            <i class="material-icons">assessment</i>Hasil Analisa <small>Berikut Hasil dari analisa yang sudah dilakukan</small>
                        </h2>
                    </div>
                    <div class="body table-responsive" >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="{{count($label)}}">Hasil Analisa</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        @foreach($label as $lab)
                                        <td>{{$lab}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach($data as $lab2)
                                        <td>{{round($lab2,2)}}%</td>
                                        @endforeach
                                    </tr>
                                
                            </tbody>
                        </table>
                        <img src="{{asset('storage/gambar/'.$cek->rule->jurusan->gambar)}}" style="display: block;
                          margin-left: auto;
                          margin-right: auto;
                          width: 50%;" class="img-thumbnail">
                        <p align="justify">Berdasarkan analisa yang telah dilakukan, maka didapatkan tingkat kecocokan sebesar <b>{{round($cek->tingkat_kepercayaan,2)}}%</b> pada jurusan <b>{{$cek->rule->jurusan->jurusan}}</b> Berdasarkan Hal tersebut maka Anda direkomendasikan untuk mengambil jurusan <b>{{$cek->rule->jurusan->jurusan}}</b> karna sudah sesuai dengan kepribadian yang Anda miliki </p>

                        <button type="button" data-toggle="modal" data-target="#ulang" class="btn btn-warning">
                            <i class="material-icons">refresh</i> Ulangi Test
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                            <i class="material-icons">assessment</i>Faktor Latar Belakang Keluarga <small>Berikut Hasil dari analisa terhadap keterkaitan latar belakang keluarga</small>
                        </h2>
                    </div>
                    <div class="body">

                        @php
                            $cari2 = App\Models\Family::where('analisa_id',$cek->id)->first();
                        @endphp
                        <h1 align="center" style="font-size: 30px;
                        font-size: 3.5vw;">{{round($cari2->persentase,2)}}%</h3>
                        <p align="justify">Berdasarkan analisa yang telah dilakukan terhadap pengaruh latar belakang keluarga terhadap pilihan jurusan dari mahasiswa, maka di dapatkan bahwa Latar belakang keluarga Anda memiliki pengaruh sebesar <b>{{round($cari2->persentase,2)}}%</b> terhadap pilihan jurusan Anda.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-indigo" >
                        <h2>
                            <i class="material-icons">mood</i>Kepribadian <small>Penjelasan Terkait Masing-masing Kepribadian</small>
                        </h2>
                    </div>

                    <div class="body table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td>Kepribadian</td>
                                    <td>Minat</td>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td><b>{{$cek->rule->jurusan->kepribadian->kepribadian}}</b></td>
                                        <td>
                                            {{$cek->rule->jurusan->kepribadian->deskripsi}}
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ulang" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                        </div>
                        <div class="modal-body" style="text-align: center;">
                           <i class="material-icons" style="font-size: 100px;color: red;display: inline-block;width: 100%;">error_outline</i>
                           <h4 align="center">Apa Anda yakin ingin mengulangi test ?</h4>
                           

                            <button type="button" style="color: white;" class="btn btn-link btn-warning waves-effect" data-dismiss="modal">BATAL</button>
                            
                            <a href="{{route('analisa.destroy',$cek->id)}}" style="color: white;" class="btn btn-link btn-danger waves-effect">ULANGI</a>
                 
                        </div>

                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
</div>
            @endif
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

<!-- Chart Plugins Js -->
<script src="{{asset('asset/plugins/chartjs/Chart.bundle.js')}}"></script>

<!-- Custom Js -->
<script src="{{asset('asset/js/admin.js')}}"></script>
<script type="text/javascript">
    $(function () {
        new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    });
    function getChartJs(type) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        backgroundColor: 'rgba(233, 30, 99, 0.3)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: {!!json_encode($label)!!},
                datasets: [{
                    label: "Tingkat Kecocokan",
                    data: {!!json_encode($data)!!},
                    backgroundColor: ['AntiqueWhite','Aqua','Aquamarine','CadetBlue','Chartreuse','Chocolate','Coral','CornflowerBlue','DarkOrange','DarkSalmon']
                }]
            },
            /*
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            color: 'rgb(255, 99, 132)'
                        }

                    },
                    title: {
                        display: true,
                        text: 'Custom Chart Title',
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    },
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        formatter: Math.round,
                        font: {
                            weight: 'bold',
                            size: 16
                        }
                    }
                }

            }
            */
            options: {
                legend: {
                    display: false
                },
                tooltips: {
                    callbacks: {
                       label: function(tooltipItem) {
                              return tooltipItem.yLabel;
                       }
                    }
                }
            }
        }
    }
    else if (type === 'radar') {
        config = {
            type: 'radar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 25, 90, 81, 56, 55, 40],
                    borderColor: 'rgba(0, 188, 212, 0.8)',
                    backgroundColor: 'rgba(0, 188, 212, 0.5)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.8)',
                    pointBorderWidth: 1
                }, {
                        label: "My Second dataset",
                        data: [72, 48, 40, 19, 96, 27, 100],
                        borderColor: 'rgba(233, 30, 99, 0.8)',
                        backgroundColor: 'rgba(233, 30, 99, 0.5)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.8)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [225, 50, 100, 40],
                    backgroundColor: [
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(139, 195, 74)"
                    ],
                }],
                labels: [
                    "Pink",
                    "Amber",
                    "Cyan",
                    "Light Green"
                ]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}
</script>
<!-- Demo Js -->
<script src="{{asset('asset/js/demo.js')}}"></script>
@endsection