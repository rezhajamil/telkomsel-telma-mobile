@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative w-full px-2 pb-10 bg-amber-600 h-fit">
        <div class="flex items-center justify-between px-2 py-2 h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Challenge</span>
            <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i class="text-xl text-white fa-solid fa-house"></i></a>
            <a href="{{ URL::to('/profile') }}" class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i class="fa-solid fa-user text-amber-600"></i></a>
        </div>
    </div>
    <div class="z-20 flex flex-col w-full h-full px-6 py-4 -mt-6 bg-white rounded-t-3xl grow">
        <form action="" method="post" class="flex flex-col gap-y-6">
            @csrf
            <select name="judul" id="judul" class="w-full py-2 font-bold border-2 rounded outline-2 outline-amber-600 border-amber-600 focus:border-amber-800 focus:ring-amber-800">
                <option value="" selected disabled>Pilih Judul Challenge</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            @error('judul')
            <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
            @enderror
            <div class="w-full px-3 py-2 font-bold border-2 rounded outline-2 outline-amber-600 border-amber-600 focus:border-amber-800 focus:ring-amber-800">
                <span class="">Poin : 80</span>
            </div>
            <div class="w-full px-3 py-2 font-bold border-2 rounded outline-2 outline-amber-600 border-amber-600 focus:border-amber-800 focus:ring-amber-800">
                <span class="">Keterangan :</span>
            </div>
            <input type="text" name="url" id="url" placeholder="Link" class="w-full px-3 py-2 font-bold border-2 rounded placeholder:font-normal outline-2 outline-amber-600 border-amber-600 focus:border-amber-800 focus:ring-amber-800">
            <button type="submit" class="inline-block w-full px-4 py-2 mx-auto mt-auto text-xl font-bold text-center text-white transition-all rounded bg-amber-600 hover:no-underline hover:bg-amber-800">Submit</button>
        </form>
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
            let s = today.getSeconds();
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
