<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kepribadian;
use Validator;
use Excel;
use App\Imports\KepribadianImport;
class KepribadianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Kepribadian';
        $kepribadian = Kepribadian::all();
        return view('backend.admin.kepribadian.list',compact('title','kepribadian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Kepribadian';
        return view('backend.admin.kepribadian.create',compact('title'));
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
            'kode' => 'required|unique:kepribadians|max:255',
        ],[ 'kode.unique' => 'Kode sudah digunakan.',]
        );

        if ($validator->fails()) {
            return redirect('kepribadians/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $new = Kepribadian::create($request->all());
        return redirect()->route('kepribadian.index')->with('success','Data Berhasil Ditambahkan');
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
        $cari = Kepribadian::find($id);
        $title = 'Edit Data Kepribadian';
        return view('backend.admin.kepribadian.edit',compact('title','cari'));
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
        $cari = Kepribadian::find($id);
        $cari->update($request->all());
        return redirect()->route('kepribadian.index')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cari = Kepribadian::find($id);
        $cari->delete();
        return redirect()->route('kepribadian.index')->with('success','Data Berhasil Dihapus');
    }
    public function import(Request $request)
    {
        Excel::import(new KepribadianImport, $request->file('file')->store('files'));
        return redirect()->back();
    }
    public function print()
    {
        $title = 'Cetak Data Kepribadian';
        $kepribadian = Kepribadian::all();
        return view('backend.admin.kepribadian.cetak',compact('title','kepribadian'));
    }
  
}
