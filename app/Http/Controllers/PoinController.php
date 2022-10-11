<?php

namespace App\Http\Controllers;

use App\Models\Poin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poin_history = DB::table('poin_history')->where('email', auth()->user()->email)->get();

        $absen = 0;
        $challenge = 0;
        $quiz = 0;
        $byu = 0;
        $orbit = 0;

        foreach ($poin_history as $key => $value) {
            switch ($value->jenis) {
                case 'Absen':
                    $absen += $value->jumlah;
                    break;
                case 'Challenge':
                    $challenge += $value->jumlah;
                    break;
                case 'Quiz':
                    $quiz += $value->jumlah;
                    break;
                case 'BYU':
                    $byu += $value->jumlah;
                    break;
                case 'Orbit':
                    $orbit += $value->jumlah;
                    break;
                default:
                    break;
            }
        }

        $total = $absen + $challenge + $quiz + $byu + $orbit;

        return view('poin.index', compact('absen', 'challenge', 'quiz', 'byu', 'orbit', 'total'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function show(Poin $poin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function edit(Poin $poin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poin $poin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poin  $poin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poin $poin)
    {
        //
    }
}
