@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative w-full px-2 pb-10 bg-premier h-fit">
        <div class="flex items-center justify-end py-2 bg-transparent h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-2xl text-center text-white select-none font-batik">DigiSquad</span>
            <a href="" class="flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i class="fa-solid fa-user text-premier"></i></a>
        </div>
        <div id="slider" class="py-2 my-2 carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="rounded h-36 carousel-item active">
                    <img src="{{ asset('images/slide-1.png') }}" class="block object-contain w-full h-full">
                </div>
                <div class="rounded h-36 carousel-item">
                    <img src="{{ asset('images/slide-2.png') }}" class="block object-contain w-full h-full">
                </div>
            </div>
        </div>
        <div class="p-2 mx-2 my-2 border-4 border-white rounded-md">
            <span class="block text-2xl font-bold text-white">Selamat Datang,</span>
            <span class="text-xl font-semibold text-white">Rezha Jamil</span>
        </div>
    </div>
    <div class="z-20 w-full h-full px-6 py-4 -mt-6 bg-white rounded-t-3xl">
        <div class="flex flex-col justify-between h-full">
            <div class="grid grid-cols-3 gap-4">
                <div class="flex items-center justify-center">
                    <a href="" class="w-20 p-3 text-white transition rounded-md shadow-lg bg-violet-600 hover:bg-violet-800 aspect-square">

                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="" class="w-20 p-3 text-white transition rounded-md shadow-lg bg-amber-600 hover:bg-amber-800 aspect-square">

                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="" class="w-20 p-3 text-white transition rounded-md shadow-lg bg-emerald-600 hover:bg-emerald-800 aspect-square">

                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="" class="w-20 p-3 text-white transition bg-indigo-600 rounded-md shadow-lg hover:bg-indigo-800 aspect-square">

                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="" class="w-20 p-3 text-white transition bg-orange-600 rounded-md shadow-lg hover:bg-orange-800 aspect-square">

                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <a href="" class="w-20 p-3 text-white transition bg-teal-600 rounded-md shadow-lg hover:bg-teal-800 aspect-square">

                    </a>
                </div>
            </div>
            <span class="inline-block w-full text-lg font-bold text-center text-sekunder">
                MENU
            </span>
        </div>
    </div>
</div>
@endsection
