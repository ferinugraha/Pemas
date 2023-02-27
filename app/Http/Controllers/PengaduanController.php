<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\file;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.pengaduan.index');
    }

    // public function tanggapan()
    // {
    //     $pengaduan = DB::table('pengaduan')->where('id',)->get();

    //     return view('user.pengaduan.tanggapan', compact('pengaduan'));
    // }

    public function tanggapan()
    {
        // $pengaduans = Pengaduan::where('user_id', Auth::user()->role == 'User')->latest()->paginate(5);
        $pengaduans = DB::table('pengaduan')->wherein('status',['Proses','Selesai'])->get();

        return view('user.pengaduan.tanggapan', compact('pengaduans'));
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
        $pengaduan = new pengaduan; 
        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extention;
            $file->move('uploads/', $filename);
            $pengaduan->foto = $filename;
        }
        $pengaduan->tgl_pengaduan = $request->input('tgl_pengaduan');
        $pengaduan->user_id = $request->input('user_id');
        $pengaduan->status = $request->input('status');
        $pengaduan->isi_laporan = $request->input('isi_laporan');
        $pengaduan->save();


        return redirect()->route('pengaduan.index')->with('success', 'Berhasil Menyimpan!');
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
}
