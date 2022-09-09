<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $kategori = DB::table('peserta_event')->select(['kategori', 'jenis'])->where('email', Auth::user()->email)->get();
        return view('profile', compact('kategori'));
    }
}
