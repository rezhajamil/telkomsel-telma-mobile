<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenge = DB::table('daftar_challege')->get();
        return view('challenge.index', compact('challenge'));
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
            'url' => ['required'],
        ]);

        $sosmed = DB::table('sosmed')->where('telp', Auth::user()->telp)->where('challenge', $request->judul)->count();

        if ($sosmed) {
            return back()->with('error', 'Anda Sudah Mengupload untuk Challenge Ini');
        }
        DB::table('sosmed')->insert([
            'nama' => Auth::user()->nama,
            'telp' => Auth::user()->telp,
            'id_digipos' => Auth::user()->telp,
            'challenge' => $request->judul,
            'link' => $request->url,
            'keterangan' => '0',
            'poin' => '0',
            'approver' => '0',
            'status' => '0',
            'date' => date('Y-m-d'),
        ]);

        return back()->with('success', 'Berhasil Mengupload Challenge');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        //
    }

    public function get_challenge(Request $request)
    {
        $judul = $request->judul;

        $challenge = DB::table('daftar_challege')->where('judul', $judul)->first();

        return response()->json($challenge);
    }
}
