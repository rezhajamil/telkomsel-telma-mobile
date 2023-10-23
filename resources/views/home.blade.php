@extends('layouts.app')
@section('content')
    <div class="flex flex-col min-h-screen">
        <div class="relative w-full px-2 pb-10 bg-premier h-fit">
            <div class="flex items-center justify-end py-2 bg-transparent h-fit">
                <span
                    class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">TELMA</span>
                <a href="{{ URL::to('/profile') }}"
                    class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i
                        class="fa-solid fa-user text-premier"></i></a>
            </div>
            <div id="slider" class="py-2 my-2 carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    {{-- <div class="rounded h-36 carousel-item active">
                    <img src="{{ asset('images/slide-1.png') }}" class="block object-contain w-full h-full">
            </div>
            <div class="rounded h-36 carousel-item">
                <img src="{{ asset('images/slide-2.png') }}" class="block object-contain w-full h-full">
            </div> --}}
                    <div class="rounded carousel-item active">
                        <img src="{{ asset('images/telma.png') }}" class="block object-contain w-full h-full rounded">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 my-2 border-4 border-white rounded-md">
                <div class="col-span-2 p-2 mx-2 ">
                    <span class="block text-2xl font-bold text-white">Selamat Datang,</span>
                    <span class="text-xl font-semibold text-white">{{ ucwords(Auth::user()->nama) }}</span>
                </div>
                <div class="flex items-center justify-center col-span-1 p-1 bg-white">
                    <span
                        class="text-2xl font-bold text-center align-middle font-batik text-premier">{{ Auth::user()->poin }}</span>
                </div>
            </div>
        </div>
        <div class="z-20 flex flex-col w-full h-full px-6 py-6 -mt-6 bg-white rounded-t-3xl grow">
            <div class="grid grid-cols-3 gap-y-6 gap-x-2">
                <div class="flex items-center justify-center px-2">
                    <a href="{{ route('absen.index') }}"
                        class="flex flex-col items-center justify-center w-20 gap-1 p-3 text-white transition-all rounded-md shadow-md hover:shadow-xl shadow-premier hover:no-underline bg-sekunder hover:bg-sekunder aspect-square">
                        <i class="text-xl fa-regular fa-calendar-check"></i>
                        <span class="text-xs font-semibold uppercase">Absen</span>
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="{{ route('challenge.index') }}"
                        class="flex flex-col items-center justify-center w-20 gap-1 p-3 text-white transition-all rounded-md shadow-md hover:shadow-xl shadow-premier hover:no-underline bg-sekunder hover:bg-sekunder aspect-square">
                        <i class="text-xl fa-solid fa-fire"></i>
                        <span class="text-xs font-semibold uppercase">Challenge</span>
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="{{ route('news.index') }}"
                        class="flex flex-col items-center justify-center w-20 gap-1 p-3 text-white transition-all rounded-md shadow-md bg-sekunder hover:shadow-xl shadow-premier hover:no-underline hover:bg-sekunder aspect-square">
                        <i class="text-xl fa-regular fa-newspaper"></i>
                        <span class="text-xs font-semibold uppercase">News</span>
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="{{ route('poin.index') }}"
                        class="flex flex-col items-center justify-center w-20 gap-1 p-3 text-white transition-all rounded-md shadow-md bg-sekunder hover:shadow-xl shadow-premier hover:no-underline hover:bg-sekunder aspect-square">
                        <i class="text-xl fa-solid fa-star"></i>
                        <span class="text-xs font-semibold uppercase">Poin</span>
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="{{ route('quiz.index') }}"
                        class="flex flex-col items-center justify-center w-20 gap-1 p-3 text-white transition-all rounded-md shadow-md bg-sekunder hover:shadow-xl shadow-premier hover:no-underline hover:bg-sekunder aspect-square">
                        {{-- <a href="" class="flex flex-col items-center justify-center w-20 gap-1 p-3 text-white transition-all rounded-md shadow-md bg-sekunder hover:shadow-xl shadow-premier hover:no-underline hover:bg-sekunder aspect-square"> --}}
                        <i class="text-xl fa-solid fa-pen-clip"></i>
                        <span class="text-xs font-semibold uppercase">Quiz</span>
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="{{ route('sales.index') }}"
                        class="flex flex-col items-center justify-center w-20 gap-1 p-3 text-white transition-all rounded-md shadow-md bg-sekunder hover:shadow-xl shadow-premier hover:no-underline hover:bg-sekunder aspect-square">
                        <i class="text-xl fa-solid fa-chart-column"></i>
                        <span class="text-xs font-semibold uppercase whitespace-pre-wrap">Sales</span>
                    </a>
                </div>
            </div>
            <span class="inline-block w-full mt-4 text-xl font-bold text-center font-batik text-tersier">
                MENU
            </span>
        </div>
    </div>
@endsection
