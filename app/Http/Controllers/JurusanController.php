<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Kepribadian;
use Validator;
use Excel;
use App\Imports\JurusanImport;
class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Jurusan';
        $jurusan = Jurusan::all();
        return view('backend.admin.jurusan.list',compact('title','jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Jurusan';
        $kepribadian = Kepribadian::all();
        return view('backend.admin.jurusan.create',compact('title','kepribadian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'jurusan' => 'required|unique:jurusans|max:255',
                'gambar1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ],
            [ 
                'jurusan.unique' => 'Jurusan sudah ada.',
                'gambar1.mimes' => 'Upload File dengan ekstensi jpg, jpeg, png, gif dan svg.',

            ]
        );
        if ($validator->fails()) {
            return redirect('jurusans/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }
        $name = $request->file('gambar1')->getClientOriginalName();
        $path = $request->gambar1->storeAs('public/gambar', $name);
        $request->request->add(['gambar' => $name]);

        $new = Jurusan::create($request->all());
        return redirect()->route('jurusan.index')->with('success','Data Berhasil Ditambahkan');
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
        $cari = Jurusan::find($id);
        $title = 'Edit Data Jurusan';
        $kepribadian = Kepribadian::all();
        return view('backend.admin.jurusan.edit',compact('title','cari','kepribadian'));
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

        $cari = Jurusan::find($id);

        if(isset($request->gambar1)){
            $validator = Validator::make($request->all(), 
                [
                    'gambar1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ],
                [ 
                    'gambar1.mimes' => 'Upload File dengan ekstensi jpg, jpeg, png, gif dan svg.',
                ]
            );
            if ($validator->fails()) {
                return redirect('jurusans/create')
                            ->withErrors($validator)
                            ->withInput($request->all());
            }
            $name = $request->file('gambar1')->getClientOriginalName();
            $path = $request->gambar1->storeAs('public/gambar', $name);
            $request->request->add(['gambar' => $name]);
        }

        $cari->update($request->all());
        return redirect()->route('jurusan.index')->with('success','Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $cari = Jurusan::find($id);
        $cari->delete();
        return redirect()->route('jurusan.index')->with('success','Data Berhasil Dihapus');
    }

    public function print()
    {
        $title = 'Cetak Data Jurusan';
        $jurusan = Jurusan::all();
        return view('backend.admin.jurusan.cetak',compact('title','jurusan'));
    }
    public function import(Request $request)
    {
        Excel::import(new JurusanImport, $request->file('file')->store('files'));
        return redirect()->back();
    }
}
