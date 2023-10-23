<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use App\Rules\Msisdn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = DB::table('kategori')->select('detail')->distinct()->where('detail', 'like', '%Byu%')->get();

        return view('sales.index', compact('paket'));
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
            'jenis' => 'required',
            'msisdn' => ['required', 'unique:sales_digisquad,msisdn', new Msisdn],
        ]);

        $paket = DB::table('kategori')->where('detail', $request->jenis)->first();

        DB::table('sales_digisquad')->insert([
            'nama' => Auth::user()->nama,
            'telp' => Auth::user()->telp,
            'id_digipos' => Auth::user()->telp,
            'jenis' => $paket->jenis,
            'detail' => $paket->detail,
            'poi' => $paket->harga,
            'serial' => $paket->poin,
            'msisdn' => $request->msisdn,
            'date' => date('Y-m-d'),
            'status' => '0'
        ]);

        DB::table('user_event')->where('email', auth()->user()->email)->update([
            'poin' => auth()->user()->poin + $paket->poin
        ]);

        Poin::add_poin([
            'email' => auth()->user()->email,
            'telp' => auth()->user()->telp,
            'jenis' => 'Orbit',
            'keterangan' => $paket->jenis,
            'jumlah' => $paket->poin,
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        return back()->with('success', 'Berhasil Submit Penjualan');
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

    public function get_paket(Request $request)
    {
        $detail = $request->paket;

        $paket = DB::table('kategori')->where('detail', $detail)->first();

        return response()->json($paket);
    }
}
