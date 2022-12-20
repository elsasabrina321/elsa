<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karakteristik;
use App\Models\Kepribadian;
use Validator;
use Excel;
use App\Imports\KarakteristikImport;
class KarakteristikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Karakteristik Kepribadian';
        $karakteristik = Karakteristik::all();
        return view('backend.admin.karakteristik.list',compact('title','karakteristik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Karakteristik';
        $kepribadian = Kepribadian::all();
        return view('backend.admin.karakteristik.create',compact('title','kepribadian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:karakteristiks|max:255',
        ],[ 'kode.unique' => 'Kode sudah digunakan.',]
        );

        if ($validator->fails()) {
            return redirect('karakteristiks/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $new = Karakteristik::create($request->all());
        return redirect()->route('karakteristik.index')->with('success','Data Berhasil Ditambahkan');
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
        $cari = Karakteristik::find($id);
        $title = 'Edit Data Karakteristik';
        $kepribadian = Kepribadian::all();
        return view('backend.admin.karakteristik.edit',compact('title','cari','kepribadian'));
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
        $cari = Karakteristik::find($id);
        $cari->update($request->all());
        return redirect()->route('karakteristik.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cari = Karakteristik::find($id);
        $cari->delete();
        return redirect()->route('karakteristik.index')->with('success','Data Berhasil Dihapus');
    }

    public function print()
    {
        $title = 'Cetak Data Karakteristik';
        $karakteristik = Karakteristik::all();
        return view('backend.admin.karakteristik.cetak',compact('title','karakteristik'));
    }
    public function import(Request $request)
    {
        Excel::import(new KarakteristikImport, $request->file('file')->store('files'));
        return redirect()->back();
    }
}
