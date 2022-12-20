<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen User';
        if (auth()->user()->role == 'admin') {
            $users = User::all();
        }
        elseif (auth()->user()->role == 'kaprodi') {
            $users = User::where('role','mahasiswa')->get();
        }
        return view('backend.admin.user.list',compact('title','users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data User';
        return view('backend.admin.user.create',compact('title'));
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
                'username' => 'required|unique:users|max:255',
                'email' => 'required|unique:users|max:255',
                'avatar1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [ 
                'username.unique' => 'Username sudah terdaftar.',
                'email.unique' => 'Email sudah terdaftar.',
                'avatar1.mimes' => 'Upload File dengan ekstensi jpg, jpeg, png, gif dan svg.',
            ]
        );

        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $name = $request->file('avatar1')->getClientOriginalName();
        $path = $request->avatar1->storeAs('public/avatar', $name);
        $request->request->add(['avatar' => $name]);

        $data = $request->all();
        $check = $this->saving($data);

        return redirect()->route('user.index')->with('success','User Berhasil Ditambahkan');
    }

    public function saving(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $data['role'],
        'avatar' => $data['avatar']
      ]);
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
        $cari = User::find($id);
        $title = 'Edit Data User';
        return view('backend.admin.user.profile',compact('title','cari'));
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
         $cari = User::find($id);
        if ($request->test == 'profil') {
           
            if(isset($request->avatar1)){
                $validator = Validator::make($request->all(), 
                    [
                        'avatar1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                    ],
                    [ 
                        'avatar1.mimes' => 'Upload File dengan ekstensi jpg, jpeg, png, gif dan svg.',
                    ]
                );
                if ($validator->fails()) {
                    return back()->with("error2", "Upload File dengan ekstensi jpg, jpeg, png, gif dan svg, dan Ukuran File Maksimal 2MB");
                }
                $name = $request->file('avatar1')->getClientOriginalName();
                $path = $request->avatar1->storeAs('public/avatar', $name);
                $request->request->add(['avatar' => $name]);
            }

            $cari->update($request->all());
            return back()->with('success','Data Berhasil Diupdate');
        }
        elseif($request->test == 'pass'){
            if(!Hash::check($request->old, $cari->password)){
                return back()->with("error", "Password Lama Salah");
            }


            #Update the new Password
            User::whereId($cari->id)->update([
                'password' => Hash::make($request->new)
            ]);

            return back()->with("success", "Password Berhasil Diubah");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cari = User::find($id);
        $cari->delete();
        return redirect()->route('user.index')->with('success','Data Berhasil Dihapus');
    }
    public function print()
    {
        $title = 'Cetak Data User';
        $users = User::all();
        return view('backend.admin.user.cetak',compact('title','users'));
    }
}
