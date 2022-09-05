@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative w-full px-2 pb-10 bg-amber-600 h-fit">
        <div class="flex items-center justify-between px-2 py-2 h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Challenge</span>
            <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i class="text-xl text-white fa-solid fa-house"></i></a>
            <a href="" class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i class="fa-solid fa-user text-amber-600"></i></a>
        </div>
    </div>
    <div class="z-20 flex flex-col w-full h-full px-6 py-4 -mt-6 bg-white rounded-t-3xl grow">
        <span class="inline-block mx-auto text-3xl text-center text-amber-600 font-batik selection:bg-amber-600 selection:text-white">Tari Kelompok Daerah Sekolah</span>
        <div class="flex items-end mx-auto mt-10 border-2 rounded border-amber-600 ">
            <div class="px-3 py-2">
                <i class="text-3xl fa-solid fa-clock text-amber-600"></i>
            </div>
            <div class="px-3 py-2 bg-amber-600">
                <span class="inline-block text-3xl font-semibold text-center text-white align-middle selection:bg-amber-600 selection:text-white" id="clock">09:11</span>
            </div>
        </div>
        <i class="mx-auto mt-20 text-8xl animate-bounce fa-solid fa-angles-down text-amber-600"></i>
        <a href="" class="inline-block w-3/4 px-4 py-2 mx-auto mt-auto mb-4 text-xl font-bold text-center text-white rounded bg-amber-600 hover:no-underline">HADIR</a>
    </div>
</div>
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
