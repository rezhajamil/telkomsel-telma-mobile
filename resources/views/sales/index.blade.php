@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen">
    <div class="relative w-full px-2 pb-10 bg-teal-600 h-fit">
        <div class="flex items-center justify-between px-2 py-2 h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Sales</span>
            <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i class="text-xl text-white fa-solid fa-house"></i></a>
            <a href="{{ URL::to('/profile') }}" class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i class="text-teal-600 fa-solid fa-user"></i></a>
        </div>
    </div>
    <div class="z-20 flex flex-col w-full h-full px-6 py-4 -mt-6 bg-white rounded-t-3xl grow">
        <form action="{{ route('sales.store') }}" method="post" class="flex flex-col gap-y-6">
            @csrf
            <select name="jenis" id="jenis" class="w-full py-2 font-bold border-2 border-teal-600 rounded outline-2 outline-teal-600 focus:border-teal-800 focus:ring-teal-800" required>
                <option value="" selected disabled>Pilih Jenis Paket</option>
                @foreach ($paket as $data)
                <option value="{{ $data->detail }}">{{ $data->detail }}</option>
                @endforeach
            </select>
            @error('jenis')
            <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
            @enderror
            <div class="w-full px-3 py-2 font-bold border-2 border-teal-600 rounded outline-2 outline-teal-600 focus:border-teal-800 focus:ring-teal-800">
                <span class="">Harga : <span id="harga"></span></span>
            </div>
            <div class="w-full px-3 py-2 font-bold border-2 border-teal-600 rounded outline-2 outline-teal-600 focus:border-teal-800 focus:ring-teal-800">
                <span class="">Poin : <span id="poin"></span></span>
            </div>
            <div class="">
                <input type="number" name="msisdn" id="msisdn" placeholder="Nomor MSISDN" class="w-full px-3 py-2 font-bold border-2 border-teal-600 rounded placeholder:font-normal outline-2 outline-teal-600 focus:border-teal-800 focus:ring-teal-800" required>
                <span class="block mt-1 text-sm italic text-sekunder">Format : 628xxxxxxxxxx</span>
                @error('msisdn')
                <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="inline-block w-full px-4 py-2 mx-auto mt-auto text-xl font-bold text-center text-white transition-all bg-teal-600 rounded hover:no-underline hover:bg-teal-800">Submit</button>
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
@if (session('error'))
<div class="flash-data d-none" data-flashdata="{{ session('error') }}"></div>
<script>
    var data = document.querySelector(".flash-data").getAttribute("data-flashdata");
    Swal.fire({
        title: 'Gagal'
        , text: data
        , icon: 'error'
        , showCancelButton: false
    , })

</script>
@endif
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#jenis").on("input", function() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ URL::to('/get_paket') }}"
                , method: "POST"
                , dataType: "JSON"
                , data: {
                    paket: $('#jenis').val()
                    , _token: _token
                }
                , success: (data) => {
                    $('#poin').html(data.poin.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
                    $('#harga').html(data.harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))

                }
                , error: (e) => {}
            })

        })
    });

</script>
@endsection
