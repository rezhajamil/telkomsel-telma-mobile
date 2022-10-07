@extends('layouts.app')
@section('content')
<div class="flex flex-col min-h-screen px-2 bg-emerald-600">
    <div class="relative w-full pb-4 h-fit">
        <div class="flex items-center justify-between px-2 py-2 h-fit">
            <span class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">News</span>
            <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i class="text-xl text-white fa-solid fa-house"></i></a>
            <a href="{{ URL::to('/profile') }}" class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i class="fa-solid fa-user text-emerald-600"></i></a>
        </div>
    </div>
    @if (count($news)>0)
    @foreach ($news as $idx => $data)
    <div class="p-3 mb-8 bg-white rounded-md shadow-lg shadow-tersier">
        <div class="w-full overflow-hidden rounded-md h-fit">
            <img src="https://tyes.live/admin/storage/{{ $data->gambar }}" class="object-contain transition-all hover:brightness-75" data-toggle="modal" data-target="#modal{{ $idx }}">
        </div>
        <span class="block my-2 text-xl font-bold text-emerald-600">{{ $data->judul }}</span>
        {{-- Keterangan --}}
        <div class="mb-4">
            {!! $data->keterangan !!}
        </div>
        @if ($data->link_meeting)
        <a href="{{ $data->link_meeting }}" target="_blank" class="px-3 py-2 text-white bg-emerald-600 transition-all hover:bg-emerald-800 font-semibold hover:no-underline rounded">Kunjungi <i class="fa-solid fa-right-long ml-2 text-white"></i></a>
        @endif
    </div>
    <div class="modal fade" id="modal{{ $idx }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <img src="https://tyes.live/admin/storage/{{ $data->gambar }}" class="object-contain" data-toggle="modal" data-target="#exampleModalCenter">
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="p-3 mb-8 bg-white rounded-md shadow-lg shadow-tersier">
        <p class="text-emerald-600 font-semibold text-center">Tidak Ada Berita</p>
    </div>
    @endif

</div>
@endsection
