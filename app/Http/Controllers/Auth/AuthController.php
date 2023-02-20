<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Masyarakat;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() 
    {   
        $data = array('title' => 'Register');
        return view('auth.register',$data);
    }

    public function register_action(Request $request) 
    {
        $validate = $request->validate([
            'name'      => 'required', 
            'username'  => 'required', 
            'telp'      => 'required', 
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'telp'      => $request->telp,
            'password'  => Hash::make($request->password)
        ]);

        Masyarakat::create([
            'nik' => $request->nik,
            'user_id' =>  $user->id
        ]);

        return redirect()->route('login');
    }

    public function authenticate(Request $request) 
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // dd($credentials);

        // dd(Auth::user());
        if (Auth::attempt($credentials)) {
            if (Masyarakat::where('user_id', Auth::id())->exists()) {
                $request->session()->regenerate();

                return redirect()->route('masyarakat.dashboard');
            } else {
                $request->session()->regenerate();

                return redirect()->route('petugas.dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'Data kamu tidak ada didalam',
        ])->onlyInput('username');
    }

    public function login(Request $request) 
    {
        return view('auth.login');
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
