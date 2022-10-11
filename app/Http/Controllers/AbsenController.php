<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Poin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertemuan = DB::table('daftar_pertemuan')->orderByDesc('date')->orderByDesc('time')->first();
        $absen = DB::table('absen')->where('telp', auth()->user()->telp)->where('judul', $pertemuan->judul)->where('date', date('Y-m-d'))->count();
        return view('absen.index', compact('pertemuan', 'absen'));
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
        $request->validate([
            'judul' => ['required'],
            'pembicara' => ['required'],
            'poin' => ['required'],
        ]);

        DB::table('absen')->insert([
            'nama' => auth()->user()->nama,
            'telp' => auth()->user()->telp,
            'id_digipos' => auth()->user()->telp,
            'judul' => $request->judul,
            'pembicara' => $request->pembicara,
            'poin' => $request->poin,
            'date' => date('Y-m-d'),
            'time_in' => date('H:i:s'),
            'status' => 0
        ]);

        DB::table('user_event')->where('email', auth()->user()->email)->update([
            'poin' => auth()->user()->poin + $request->poin
        ]);

        $poin = Poin::add_poin([
            'email' => auth()->user()->email,
            'telp' => auth()->user()->telp,
            'jenis' => 'Absen',
            'keterangan' => $request->judul,
            'jumlah' => $request->poin,
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        return back()->with('success', 'Berhasil Absen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }
}
