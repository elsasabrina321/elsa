<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepribadian;
use App\Models\Karakteristik;
use App\Models\Analisa;
use App\Models\Kuisioner;
use App\Models\Family;
use App\Models\History;
use App\Models\Detail;
use App\Models\Rule;
use App\Models\Jurusan;
use Validator;
use Hash;
use Redirect;
use Session;
use DB;
use Carbon\Carbon;

class AnalisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Analisa Kejuruan';
        $kepribadian = Kepribadian::all();
        $kuisioner = Kuisioner::all();
        $karakteristik = Karakteristik::all();
        $cek = Analisa::where('user_id',auth()->user()->id)->first();
        if(isset($cek)){
            //$label= Jurusan::select('jurusan')->rightJoin('rules','jurusans.id','=','rules.jurusan_id')->limit(3)->pluck('jurusan')->toArray();
            $label = array();
            $data = array();
            $master = Detail::where('analisa_id', $cek->id)->orderBy('kepercayaan','desc')->paginate(3);
            foreach ($master as $mas) {
                $label[] = $mas->rule->jurusan->jurusan;
            }
            foreach ($master as $mas) {
                $data[] = $mas->kepercayaan;
            }

       
            
            
           
            //$data = Detail::where('analisa_id', $cek->id)->limit(3)->pluck('kepercayaan')->toArray();

        }
        else{
            $label = null;
            $data = null;
        }
        return view('backend.analisa.analisa',compact('title','kepribadian','karakteristik','cek','label','data','kuisioner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        /*
        $nilaiMB = $request->mb;

        foreach($nilaiMB as $key => $value){
            if($value != '0'){
                $data[] = $key;
            }
        }
        $karakteristik = implode(",", $data);
        $data["listKarakteristik"] = DB::select("select id,kode,karakteristik from karakteristiks where id in (".$karakteristik.")");
        
        $listKepribadian = DB::select("
            select distinct kepribadian_id,k.kode,k.kepribadian,k.deskripsi from karakteristiks gp inner join kepribadians k on gp.kepribadian_id=k.id where gp.id in (".$karakteristik.") order by kepribadian_id,gp.id
        ");

        $kepribadian = array();
        $p = 0;
        $hasil = array();
        */

        $nilaiMB = $request->mb;

        foreach($nilaiMB as $key => $value){
            if($value == '1' || $value == '0.8' || $value == '0.6'){
                $data[] = $key;
            }
        }

        $rule = Rule::all();
        $cek = [];
        

        //tambahkan dulu data analisa

        $new = new Analisa;
        $new->user_id = auth()->user()->id;
        $new->tanggal = Carbon::now()->format('Y-m-d');
        $new->status = 'Pending';
        $new->save();

        //baru tambahkan data detail analisa
        foreach ($rule as $rul) {
            $imp = explode(",",$rul->rule);
            $matches = array_intersect($imp,$data);
            $a = round(count($matches));
            $b = count($imp);
            $similarity = $a/$b*100;
            
            $new2 = new Detail;
            $new2->analisa_id = $new->id;
            $new2->rule_id = $rul->id;
            $new2->kepercayaan = $similarity;
            $new2->save();
        }
        $tinggi =  Detail::where('analisa_id',$new->id)->orderBy('kepercayaan','desc')->first(); 

            $update = Analisa::find($new->id);
            $update->rule_id = $tinggi->rule_id;
            $update->jurusan_id = $tinggi->rule->jurusan_id;
            $update->tingkat_kepercayaan  = $tinggi->kepercayaan;
            $update->save();

        $kuisioner = Kuisioner::all();
        $hit = count($kuisioner);
        $tot = 5*$hit;

        $jl = array_sum($request->kui);
        $persen = ($jl / $tot) * 100;

        $inp = new Family;
        $inp->user_id = auth()->user()->id;
        $inp->analisa_id = $new->id;
        $inp->persentase = $persen;
        $inp->save();


        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cari = Analisa::find($id);
        $cari->delete();
        return redirect()->route('analisa.index');
    }

    public function result()
    {
        $title = 'Hasil Analisa Kejuruan';
        $datas = Analisa::all();
        return view('backend.analisa.result',compact('title','datas'));
    }

    public function verifikasi($id)
    {
        $cari = Analisa::find($id);
        $cari->status = 'Diverifikasi';
        $cari->save();
        return redirect()->route('analisa.index');
    }
    public function report_result()
    {
        $title = 'Cetak Data Hasil Analisa';
        $datas = Analisa::all();
        return view('backend.analisa.cetak_hasil',compact('title','datas'));
    }
    public function cetak()
    {
        $title = 'Cetak Hasil Analisa Kejuruan';
        $datas = Analisa::all();
        return view('backend.analisa.cetak_hasil',compact('title','datas'));
    }


}
