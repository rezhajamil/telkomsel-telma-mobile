@extends('layouts.app')
@section('content')
    <div class="flex flex-col min-h-screen">
        <div class="relative w-full px-2 pb-10 bg-sekunder h-fit">
            <div class="flex items-center justify-between px-2 py-2 h-fit">
                <span
                    class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Poin</span>
                <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i
                        class="text-xl text-white fa-solid fa-house"></i></a>
                <a href="{{ URL::to('/profile') }}"
                    class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i
                        class="text-sekunder fa-solid fa-user"></i></a>
            </div>
        </div>
        <div class="z-20 flex flex-col w-full h-full px-6 py-4 -mt-6 bg-white rounded-t-3xl grow">
            <table class="border-0">
                <tr class="">
                    <td class="w-1/2 px-2 py-4 text-xl font-semibold border-b-2 border-r-2 border-sekunder">Absen</td>
                    <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-b-2 border-sekunder">
                        {{ number_format($absen, 0, ',', '.') }}</td>
                </tr>
                <tr class="">
                    <td class="w-1/2 px-2 py-4 text-xl font-semibold border-b-2 border-r-2 border-sekunder">Challenge</td>
                    <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-b-2 border-sekunder">
                        {{ number_format($challenge, 0, ',', '.') }}</td>
                </tr>
                <tr class="">
                    <td class="w-1/2 px-2 py-4 text-xl font-semibold border-b-2 border-r-2 border-sekunder">Quiz</td>
                    <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-b-2 border-sekunder">
                        {{ number_format($quiz, 0, ',', '.') }}</td>
                </tr>
                <tr class="">
                    <td class="w-1/2 px-2 py-4 text-xl font-semibold border-b-2 border-r-2 border-sekunder">By.U</td>
                    <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-b-2 border-sekunder">
                        {{ number_format($byu, 0, ',', '.') }}</td>
                </tr>
            </table>
            <div
                class="flex flex-col items-center justify-center gap-2 p-3 mx-auto my-4 text-center rounded-full bg-sekunder w-fit h-fit aspect-square">
                {{-- <p class="text-sm font-semibold text-white">Total</p> --}}
                <i class="text-xl text-white fa-solid fa-star"></i>
                <p class="text-2xl font-semibold text-white">{{ number_format($total, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
@endsection
