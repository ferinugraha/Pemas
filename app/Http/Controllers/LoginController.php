<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
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
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = Auth::attempt($data);
        if (!$user) {
            return redirect()->back()->with('pesan', 'Email atau password salah..!!');
        }

        if (Auth::user()->role == 'Admin') {
            $request->session()->regenerate();
            return redirect()->route('admin.index')->with('success', 'Selamat Datang Admin');
        }elseif (Auth::user()->role ==  'Petugas') {
            $request->session()->regenerate();
            return redirect()->route('petugas.index')->with('success', 'Selamat Datang Petugas');
        } else {
            $request->session()->regenerate();
            return redirect()->route('user.index')->with('success', 'Selamat Datang User');
        }
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

    public function logout(){
        Auth::logout();
        return redirect()->route('login.index')->with('success', 'Logout berhasil');
    }
}
