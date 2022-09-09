@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative w-full min-h-screen px-2 pb-10 bg-premier">
        <div class="flex items-center justify-between px-2 py-2 pb-4 mt-2 border-b border-white h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Profile</span>
            <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i class="text-xl text-white fa-solid fa-house"></i></a>
        </div>
        <div class="flex flex-col w-full px-2 my-8 gap-y-4">
            <div class="flex items-center gap-x-3">
                <i class="w-8 text-2xl text-white fa-solid fa-id-card"></i>
                <span class="text-xl font-semibold text-white">{{ Auth::user()->nama }}</span>
            </div>
            <div class="flex items-center gap-x-3">
                <i class="w-8 text-2xl text-white fa-solid fa-envelope"></i>
                <span class="text-xl font-semibold text-white">{{ Auth::user()->email }}</span>
            </div>
            <div class="flex items-center gap-x-3">
                <i class="w-8 text-2xl text-white fa-solid fa-phone"></i>
                <span class="text-xl font-semibold text-white">{{ Auth::user()->telp }}</span>
            </div>
            <div class="flex items-center gap-x-3">
                <i class="w-8 text-2xl text-white fa-brands fa-whatsapp"></i>
                <span class="text-xl font-semibold text-white">{{ Auth::user()->wa }}</span>
            </div>
        </div>
        <a href="{{ route('logout') }}" class="inline-block w-full px-4 py-2 mt-8 mb-2 font-bold text-center transition-all rounded-md bg-slate-50 hover:bg-slate-200 text-premier hover:no-underline hover:text-premier">LOGOUT</a>
    </div>
</div>
@endsection
