@extends('layouts.app')
@section('content')
<div class="w-full min-h-screen px-2 py-4 bg-sekunder">
    <p class="text-2xl text-center text-white font-batik">Aktivasi Akun</p>
    <div class="p-4 my-8 bg-white rounded-md shadow-xl shadow-tersier">
        <span class="font-semibold text-tersier">Masukkan alamat email yang sudah anda daftarkan pada program Dunia Digital Sekolah Sumut</span>
        <form action="{{ route('password.email') }}" method="POST" class="flex my-4 gap-x-3">
            @csrf
            <input type="email" name="email" id="email" class="p-2 rounded" placeholder="Email">
            <button type="submit" class="w-full p-2 font-semibold text-white rounded bg-sekunder">KIRIM</button>
        </form>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>
</div>
@endsection
