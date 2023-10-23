@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center h-screen px-4 bg-gradient-to-br from-premier to-sky-500">
        <div class="flex flex-col items-center w-full px-4 py-4 my-auto rounded-md shadow-md bg-sekunder shadow-tersier">
            <span class="text-2xl font-bold text-center text-white font-batik">LOGIN</span>
            <form action="{{ route('login') }}" method="post" class="flex flex-col w-full mt-2 gap-y-4">
                @csrf
                <div class="w-full">
                    <label class="block font-semibold text-white" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="w-full font-semibold bg-white rounded-md focus:outline-white focus:border-white focus:ring-white">
                    @error('email')
                        <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <label class="block font-semibold text-white" for="password">Password</label>
                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                        class="w-full font-semibold bg-white rounded-md focus:outline-white focus:border-white focus:ring-white">
                    @error('password')
                        <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <button
                    class="w-full px-4 py-2 mt-4 font-bold transition-all rounded-md bg-slate-50 text-premier hover:bg-slate-200">LOGIN</button>
            </form>
            <a href="{{ route('akun.aktivasi') }}" class="inline-block mt-4 text-center text-white underline">Aktivasi
                Akun</a>
        </div>
    </div>
@endsection
