@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen px-2 bg-emerald-600">
    <div class="relative w-full pb-4 h-fit">
        <div class="flex items-center justify-between px-2 py-2 h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">News</span>
            <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i class="text-xl text-white fa-solid fa-house"></i></a>
            <a href="" class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i class="fa-solid fa-user text-emerald-600"></i></a>
        </div>
    </div>
    <div class="p-3 mb-4 bg-white rounded-md shadow-lg shadow-tersier">
        <div class="w-full overflow-hidden rounded-md h-fit">
            <img src="{{ asset('images/banner-esport.png') }}" class="object-contain transition-all hover:brightness-75" data-toggle="modal" data-target="#exampleModalCenter">
        </div>
        <span class="block my-2 text-xl font-bold text-emerald-600">Berita 1</span>
        {{-- Keterangan --}}
        <p>Capture keseruan Grand Launching TYES hari ini. Buat postingan dan upload di feed social media Instagram. Bisa berupa foto, video, reels Instagram.</p>

        <p><strong>Mention akun @tyes_jawara dan cantumkan hashtag #tyes_jawara #BukaSemuaPeluang #Challenge1</strong></p>

        <p>&nbsp;</p>

        <p>Akan ada total hadiah <strong>saldo LinkAja 250rb</strong> untuk postingan terbaik dan likes terbanyak</p>

        <p><strong>Periode challenge : 2 s/d 7 Juli 2021</strong></p>

        <p>Pastikan kamu upload link materi di Aplikasi Youth Apps &nbsp;</p>

    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <img src="{{ asset('images/banner-esport.png') }}" class="object-contain" data-toggle="modal" data-target="#exampleModalCenter">
            </div>
        </div>
    </div>

</div>
@endsection
