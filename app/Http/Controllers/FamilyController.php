<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karakteristik;
use App\Models\Kepribadian;
use App\Models\Kuisioner;
use Validator;
use Excel;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
    }

    public function indexSoal()
    {
        $title = 'Data Kuisioner Keluarga';
        $datas = Kuisioner::all();
        return view('backend.admin.kuisioner.index',compact('title','datas'));
    } 
    public function createSoal()
    {
        $title = 'Tambah Kuisioner Keluarga';
        return view('backend.admin.kuisioner.create',compact('title'));
    }
    public function storeSoal(Request $request)
    {
        $new = Kuisioner::create($request->all());
        return redirect()->route('soal.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function destroySoal($id)
    {
        $cari = Kuisioner::find($id);
        $cari->delete();
        return redirect()->route('soal.index')->with('success','Data Berhasil Dihapus');
    }
    public function editSoal($id)
    {
        $cari = Kuisioner::find($id);
        $title = 'Edit Data Kuisioner';
        return view('backend.admin.kuisioner.edit',compact('title','cari'));
    }
    public function updateSoal(Request $request, $id)
    {
        $cari = Kuisioner::find($id);
        $cari->update($request->all());
        return redirect()->route('soal.index')->with('success','Data Berhasil Diupdate');
    }
}
