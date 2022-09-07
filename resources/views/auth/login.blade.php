@extends('layouts.app')
@section('content')
<div class="bg-white h-screen flex items-center flex-col px-4">
    <div class="bg-premier rounded-md shadow-xl w-full flex flex-col items-center shadow-[#aeaeae] my-auto py-4 px-4">
        <span class="text-center text-white font-bold text-2xl font-batik">LOGIN</span>
        <form action="{{ route('login') }}" method="post" class="w-full mt-2 flex flex-col gap-y-4">
            @csrf
            <div class="w-full">
                <label class="block text-white font-semibold" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full rounded-md bg-white focus:outline-white focus:border-white focus:ring-white font-semibold">
                @error('email')
                <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full">
                <label class="block text-white font-semibold" for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" class="w-full bg-white rounded-md focus:outline-white focus:border-white focus:ring-white font-semibold">
                @error('password')
                <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button class="w-full bg-slate-50 rounded-md text-premier font-bold px-4 py-2 mt-4 hover:bg-slate-200 transition-all">LOGIN</button>
        </form>
        <span class="text-center text-white inline-block mt-4 underline">Aktivasi Akun</span>
    </div>
</div>
@endsection
