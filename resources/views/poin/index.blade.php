@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative w-full px-2 pb-10 bg-indigo-600 h-fit">
        <div class="flex items-center justify-between px-2 py-2 h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Poin</span>
            <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i class="text-xl text-white fa-solid fa-house"></i></a>
            <a href="" class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i class="text-indigo-600 fa-solid fa-user"></i></a>
        </div>
    </div>
    <div class="z-20 flex flex-col w-full h-full px-6 py-4 -mt-6 bg-white rounded-t-3xl grow">
        <table class="border-0">
            <tr class="">
                <td class="w-1/2 px-2 py-4 text-xl font-semibold border-b-2 border-r-2 border-indigo-600">Absen</td>
                <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-b-2 border-indigo-600">80</td>
            </tr>
            <tr class="">
                <td class="w-1/2 px-2 py-4 text-xl font-semibold border-b-2 border-r-2 border-indigo-600">Challenge</td>
                <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-b-2 border-indigo-600">80</td>
            </tr>
            <tr class="">
                <td class="w-1/2 px-2 py-4 text-xl font-semibold border-b-2 border-r-2 border-indigo-600">Quiz</td>
                <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-b-2 border-indigo-600">80</td>
            </tr>
            <tr class="">
                <td class="w-1/2 px-2 py-4 text-xl font-semibold border-b-2 border-r-2 border-indigo-600">By.U</td>
                <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-b-2 border-indigo-600">80</td>
            </tr>
            <tr class="">
                <td class="w-1/2 px-2 py-4 text-xl font-semibold border-r-2 border-indigo-600">Orbit</td>
                <td class="w-1/2 px-2 py-4 text-xl font-semibold text-right border-indigo-600">80</td>
            </tr>
        </table>
        <div class="p-4 mx-auto my-4 text-center bg-indigo-600 rounded-full w-fit h-fit aspect-square">
            <p class="text-xs font-semibold text-white">Total</p>
            <p class="text-4xl font-semibold text-white">400</p>
        </div>
    </div>
</div>
@endsection
