@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative w-full px-2 pb-10 bg-violet-600 h-fit">
        <div class="flex items-center justify-between px-2 py-2 h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Absen</span>
            <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i class="text-xl text-white fa-solid fa-house"></i></a>
            <a href="{{ URL::to('/profile') }}" class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i class="fa-solid fa-user text-violet-600"></i></a>
        </div>
    </div>
    <div class="z-20 flex flex-col w-full h-full px-6 py-4 -mt-6 bg-white rounded-t-3xl grow">
        <span class="inline-block mx-auto text-3xl text-center text-violet-600 font-batik selection:bg-violet-600 selection:text-white">{{ $pertemuan->judul }}</span>
        <div class="flex items-end mx-auto mt-10 border-2 rounded border-violet-600 ">
            <div class="px-3 py-2">
                <i class="text-3xl fa-solid fa-clock text-violet-600"></i>
            </div>
            <div class="px-3 py-2 bg-violet-600">
                <span class="inline-block text-3xl font-semibold text-center text-white align-middle selection:bg-violet-600 selection:text-white" id="clock">09:11</span>
            </div>
        </div>
        <i class="mx-auto mt-20 text-8xl fa-solid fa-angles-down text-violet-600 {{ $absen?'opacity-0':'animate-bounce  ' }}"></i>
        <form action="{{ route('absen.store') }}" method="post" class="w-3/4 mx-auto mt-16 mb-auto">
            @csrf
            <input type="hidden" name="judul" value="{{ $pertemuan->judul }}">
            <input type="hidden" name="pembicara" value="{{ $pertemuan->pembicara }}">
            <input type="hidden" name="poin" value="{{ $pertemuan->poin }}">
            <button type="submit" {{ $absen?'disabled':'' }} class="inline-block w-full px-4 py-2 text-xl font-bold text-center text-white transition-all rounded {{ $absen?'bg-gray-400':'bg-violet-600 hover:no-underline hover:bg-violet-800 ' }}">HADIR</button>

        </form>
    </div>
</div>
@if (session('success'))
<div class="flash-data d-none" data-flashdata="{{ session('success') }}"></div>
<script>
    var data = document.querySelector(".flash-data").getAttribute("data-flashdata");
    Swal.fire({
        title: 'Berhasil'
        , text: data
        , icon: 'success'
        , showCancelButton: false
        , showConfirmButton: false
        , timer: 1500
    , })

</script>
@endif
@endsection
@section('script')
<script>
    $(document).ready(function() {
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            console.log(m)
            let s = today.getSeconds();
            console.log(s)
            h = checkTime(h);
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10 
            return i;
        }

        startTime();

    });

</script>
@endsection
