<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karakteristik;
use App\Models\Kepribadian;
use App\Models\Rule;
use App\Models\Jurusan;
use Validator;
use Excel;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Rule ';
        $rule = Rule::all();
        return view('backend.admin.rule.list',compact('title','rule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Rule';
        $jurusan = Jurusan::all();
        $karakteristik = Karakteristik::all();
        return view('backend.admin.rule.create',compact('title','jurusan','karakteristik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       $serialize = implode(",", $request->arr);       
       $request->request->add(['rule' => $serialize]);
       $new = Rule::create($request->all());
       return redirect()->route('rule.index')->with('success','Data Berhasil Ditambahkan');
      
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
        $cari = Rule::find($id);
        $cari->delete();
        return redirect()->route('rule.index')->with('success','Data Berhasil Dihapus');
    }
    public function print()
    {
        $title = 'Cetak Data Rule';
        $rule = Rule::all();
        return view('backend.admin.rule.cetak',compact('title','rule'));
    }
}
