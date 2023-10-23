@extends('layouts.app')
@section('content')
    <div class="flex flex-col min-h-screen">
        <div class="relative w-full px-2 pb-10 bg-premier h-fit">
            <div class="flex items-center justify-between px-2 py-2 h-fit">
                <span
                    class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Challenge</span>
                <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i
                        class="text-xl text-white fa-solid fa-house"></i></a>
                <a href="{{ URL::to('/profile') }}"
                    class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i
                        class="fa-solid fa-user text-premier"></i></a>
            </div>
        </div>
        <div class="z-20 flex flex-col w-full h-full px-6 py-4 -mt-6 bg-white rounded-t-3xl grow">
            <form action="{{ route('challenge.store') }}" method="post" class="flex flex-col gap-y-6">
                @csrf
                <select name="judul" id="judul"
                    class="w-full py-2 font-bold border-2 rounded outline-2 outline-premier border-premier focus:border-amber-800 focus:ring-amber-800"
                    required>
                    <option value="" selected disabled>Pilih Judul Challenge</option>
                    @foreach ($challenge as $data)
                        <option value="{{ $data->judul }}">{{ $data->judul }}</option>
                    @endforeach
                </select>
                @error('judul')
                    <span class="block mt-1 text-sm italic text-red-600">{{ $message }}</span>
                @enderror
                <div
                    class="w-full px-3 py-2 font-bold border-2 rounded outline-2 outline-premier border-premier focus:border-amber-800 focus:ring-amber-800">
                    <span class="">Poin : <span id="poin"></span></span>
                </div>
                <div
                    class="w-full px-3 py-2 border-2 rounded outline-2 outline-premier border-premier focus:border-amber-800 focus:ring-amber-800">
                    <span class="font-bold ">Keterangan :</span>
                    <div id="keterangan"></div>
                </div>
                <input type="text" name="url" id="url" placeholder="Link"
                    class="w-full px-3 py-2 font-bold border-2 rounded placeholder:font-normal outline-2 outline-premier border-premier focus:border-amber-800 focus:ring-amber-800"
                    required>
                <button type="submit"
                    class="inline-block w-full px-4 py-2 mx-auto mt-auto text-xl font-bold text-center text-white transition-all rounded bg-premier hover:no-underline hover:bg-amber-800">Submit</button>
            </form>
        </div>
    </div>
    @if (session('success'))
        <div class="flash-data d-none" data-flashdata="{{ session('success') }}"></div>
        <script>
            var data = document.querySelector(".flash-data").getAttribute("data-flashdata");
            Swal.fire({
                title: 'Berhasil',
                text: data,
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false,
                timer: 1500,
            })
        </script>
    @endif
    @if (session('error'))
        <div class="flash-data d-none" data-flashdata="{{ session('error') }}"></div>
        <script>
            var data = document.querySelector(".flash-data").getAttribute("data-flashdata");
            Swal.fire({
                title: 'Gagal',
                text: data,
                icon: 'error',
                showCancelButton: false,
            })
        </script>
    @endif
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#judul").on("input", function() {
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ URL::to('/get_challenge') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        judul: $('#judul').val(),
                        _token: _token
                    },
                    success: (data) => {
                        $('#poin').html(data.poin)
                        $('#keterangan').html(data.keterangan)
                    },
                    error: (e) => {}
                })

            })
        });
    </script>
@endsection
