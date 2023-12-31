@extends('layouts.app')
@section('content')
    <div class="flex flex-col min-h-screen">
        <div class="relative w-full px-2 pb-10 bg-sekunder h-fit">
            <div class="flex items-center justify-between px-2 py-2 h-fit">
                <span
                    class="absolute inset-x-0 inline-block w-full text-3xl text-center text-white select-none font-batik">Quiz</span>
                <a href="{{ URL::to('/') }}" class="z-10 flex items-center h-fit w-fit"><i
                        class="text-xl text-white fa-solid fa-house"></i></a>
                <a href="{{ URL::to('/profile') }}"
                    class="z-10 flex items-center p-3 rounded-full shadow h-fit w-fit bg-slate-50"><i
                        class="text-sekunder fa-solid fa-user"></i></a>
            </div>
        </div>
        <div class="z-20 flex flex-col w-full h-full px-6 py-2 -mt-6 bg-white rounded-t-3xl grow">
            <span
                class="{{ $quiz ? 'block' : 'hidden' }} w-full py-2 mb-2 text-2xl font-bold text-center text-sekunder border-b-2">{{ $quiz ? $quiz->nama : '' }}</span>
            @if ($answer)
                @if (strtotime(date('Y-m-d H:i:s')) - strtotime($answer->time_start) > $quiz->time * 60 || $answer->finish)
                    <span class="block w-full mt-4 mb-2 text-xl font-bold text-center text-tersier">Quiz Telah
                        Selesai</span>
                    <span class="block w-full font-bold text-center text-tersier">Hasil Quiz Anda :
                        {{ $answer->hasil }}/{{ count(json_decode($quiz->soal)) }}</span>
                    <div class="p-3 mx-auto my-8 rounded-full bg-sekunder w-fit aspect-square">
                        <span
                            class="block w-full py-2 text-2xl font-bold text-center text-white">{{ number_format(($answer->hasil / count(json_decode($quiz->soal))) * 100, 0, '.', ',') }}</span>
                    </div>
                @else
                    <form action="{{ route('quiz.answer.store') }}" method="post" id="form-quiz">
                        @csrf
                        <input type="hidden" name="telp" value="{{ request()->get('telp') }}">
                        <input type="hidden" name="session" value="{{ $quiz->id }}">
                        @foreach (json_decode($quiz->soal) as $key => $data)
                            <div class="flex flex-col py-4 border-b-4 gap-y-3">
                                <span class="font-semibold">{{ $key + 1 }}) {{ $data }}</span>
                                <label>
                                    <input type="radio" name="pilihan{{ $key }}" value="A"
                                        class="hidden peer">
                                    <div
                                        class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                        <span class="inline-block p-4 border-r-2">A</span>
                                        <span
                                            class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi), 5)[$key][0] }}</span>
                                    </div>
                                </label>
                                <label>
                                    <input type="radio" name="pilihan{{ $key }}" value="B"
                                        class="hidden peer">
                                    <div
                                        class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                        <span class="inline-block p-4 border-r-2">B</span>
                                        <span
                                            class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi), 5)[$key][1] }}</span>
                                    </div>
                                </label>
                                <label>
                                    <input type="radio" name="pilihan{{ $key }}" value="C"
                                        class="hidden peer">
                                    <div
                                        class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                        <span class="inline-block p-4 border-r-2">C</span>
                                        <span
                                            class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi), 5)[$key][2] }}</span>
                                    </div>
                                </label>
                                <label>
                                    <input type="radio" name="pilihan{{ $key }}" value="D"
                                        class="hidden peer">
                                    <div
                                        class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                        <span class="inline-block p-4 border-r-2">D</span>
                                        <span
                                            class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi), 5)[$key][3] }}</span>
                                    </div>
                                </label>
                                <label>
                                    <input type="radio" name="pilihan{{ $key }}" value="E"
                                        class="hidden peer">
                                    <div
                                        class="flex w-full font-semibold border-2 peer-checked:text-white peer-checked:bg-green-600 peer-checked:border-green-800">
                                        <span class="inline-block p-4 border-r-2">E</span>
                                        <span
                                            class="inline-block w-full p-4">{{ array_chunk(json_decode($quiz->opsi), 5)[$key][4] }}</span>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                        <button type="submit" id="btn-submit"
                            class="w-full px-6 py-2 my-4 font-semibold text-white rounded bg-sekunder">Selesai</button>
                    </form>
                    <div class="fixed inset-x-0 px-4 py-2 mx-auto text-xs text-white rounded-full top-1 bg-tersier w-fit">
                        <i class="fa-regular fa-clock"></i>
                        <span id="timer"></span>
                    </div>
                    {{-- <input type="hidden" id="time-start" value="{{ date('M d, Y H:i:s', strtotime($answer->time_start)) }}"> --}}
                    <input type="hidden" id="time-end"
                        value="{{ date('M d, Y H:i:s', strtotime('+' . $quiz->time . ' minutes', strtotime($answer->time_start))) }}">
                @endif
            @else
                @if ($quiz)
                    <span class="block w-full my-2 font-semibold text-tersier">Waktu Mengerjakan Quiz : {{ $quiz->time }}
                        Menit</span>
                    {!! $quiz->deskripsi !!}
                    <a href="{{ URL::to('/start/quiz') }}"
                        class="block px-4 py-2 mx-auto my-6 font-semibold text-white transition-all rounded bg-sekunder hover:no-underline w-fit hover:bg-black">
                        Mulai Quiz
                    </a>
                @endif
                <div class="my-8">
                    <span class="block w-full mb-2 font-bold text-center">Riwayat Quiz</span>
                    <table class="mx-auto overflow-auto text-left border border-collapse w-fit">
                        <thead class="border-b">
                            <tr>
                                <th class="p-2 text-sm font-medium text-gray-100 uppercase bg-sekunder">Tanggal</th>
                                <th class="p-2 text-sm font-medium text-gray-100 uppercase bg-sekunder">Nama Quiz</th>
                                <th class="p-2 text-sm font-medium text-gray-100 uppercase bg-sekunder">Hasil</th>
                            </tr>
                        </thead>
                        <tbody class="overflow-auto max-h-36">
                            @foreach ($history as $data)
                                <tr class="hover:bg-gray-200">
                                    <td class="p-4 font-bold text-gray-700 border-b">
                                        {{ date('d-M-Y', strtotime($data->date)) }}</td>
                                    <td class="p-4 font-bold text-gray-700 border-b">{{ $data->nama }}</td>
                                    <td class="p-4 font-bold text-gray-700 border-b">
                                        {{ $data->hasil }}/{{ count(json_decode($data->soal)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // var time_start = $("#time-start").val();
            var time_end = $("#time-end").val();

            // var count_start = new Date(`${time_start}`).getTime();
            var count_end = new Date(`${time_end}`).getTime();
            // Update the count down every 1 second

            var timer = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                // var distance = count_end - now;
                var distance = count_end - now;
                console.log(now, count_end);
                console.log(distance);
                // Time calculations for days, hours, minutes and seconds
                // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                $("#timer").html(minutes + ":" + seconds);

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(timer);
                    $("#timer").html("Waktu Habis");
                    // $("#form-quiz").submit(function() {
                    //     location.reload();
                    // });
                    $("#btn-submit").click();
                }
            }, 1000);
        });
    </script>
@endsection
