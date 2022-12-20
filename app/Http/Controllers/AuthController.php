<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

use Redirect;

use DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function index()
    {
        $kepribadian = Kepribadian::all();
        return view('frontend.public',compact('kepribadian'));
    } 

    public function login()
     {
         return view('backend.auth.login');
     } 
      
    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ]);

        if ( captcha_check($request->captcha) == false ) {
           return back()->with('invalid-captcha','Captcha yang diinputkan salah!');
        }
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        else{
            return back()->with('invalid-captcha','Password yang diinputkan salah!');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('backend.auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $request->request->add(['role' => 'user']);
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $data['role']
      ]);
    }    
    
    public function dashboard()
    {
        
        if(Auth::check()){
            return view('backend.index');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
