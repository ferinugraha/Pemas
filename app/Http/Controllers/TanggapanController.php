<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapan1 = DB::table('pengaduan')->wherein('status',['Pending','Proses'])->get();

        return view('petugas.tanggapan.index', compact('tanggapan1'));
    }

    public function indexadmin()
    {
        $tanggapan = DB::table('pengaduan')->wherein('status',['Pending','Proses','Selesai'])->get();

        return view('admin.tanggapan.index', compact('tanggapan'));
    }

    public function historyadmin()
    {
        $tanggapan3 = DB::table('pengaduan')->where('status','Selesai')->get();

        return view('admin.tanggapan.history', compact('tanggapan3'));
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
    public function store(Request $request, $id)
    {
        
    }

    public function approve(Request $request, $id){
        $pengaduan                  = Pengaduan::find($id);
        $pengaduan->update([
            'status'                => $request->input('status'),
        ]);

        $tanggapanAdmin = $pengaduan->lastTanggapan()->get()->first();

        if($tanggapanAdmin){
            $tanggapanAdmin->update([
                'tanggapan' => $request->tanggapan,
            ]);
        }else{
            $newTanggapan = Tanggapan::create([
                'id_pengaduan' => $pengaduan->id,
                'tgl_tanggapan' => now(),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::id()
            ]);
        }

        return redirect()->route('tanggapan2.index')->with('success', 'Berhasil Approve!');
    }

    public function proveadmin(Request $request, $id){
        $pengaduan                  = Pengaduan::find($id);
        $pengaduan->update([
            'status'                => $request->input('status'),
        ]);

        $tanggapanAdmin = $pengaduan->lastTanggapan()->get()->first();

        if($tanggapanAdmin){
            $tanggapanAdmin->update([
                'tanggapan' => $request->tanggapan,
            ]);
        }else{
            $newTanggapan = Tanggapan::create([
                'id_pengaduan' => $pengaduan->id,
                'tgl_tanggapan' => now(),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::id()
            ]);
        }

        return redirect()->route('approveadmin')->with('success', 'Berhasil Approve!');
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
        $tanggapan = Pengaduan::find($id);
        $tanggapanAdmin = $tanggapan->lastTanggapan()->get()->last();

        return view('petugas.tanggapan.edit', compact('tanggapan', 'tanggapanAdmin'));
    }

    public function adminedit($id)
    {
        $tanggapan = Pengaduan::find($id);
        $tanggapanAdmin = $tanggapan->lastTanggapan()->get()->last();

        return view('admin.tanggapan.edit', compact('tanggapan', 'tanggapanAdmin'));
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
        $tanggapan =  Pengaduan::find($id);
        $tanggapan->delete();
        return redirect()->route('tanggapan2.index')->with('success','Berhasil Hapus!');
    }
}
