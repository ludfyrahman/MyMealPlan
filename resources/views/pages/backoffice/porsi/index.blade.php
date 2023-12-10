@extends('layouts.app')

@section('content-app')
    <div class="container mt-4">
        <div class="card px-4 py-4">
            <h4>Porsi</h4>
            <ol>
                <li>Makanan pokok sumber karbohidrat
                    <br/>
                    <p>Tabel Kelompok Makanan Pokok sebagai Sumber Karbohidrat.Kandungan zat gizi per porsi nasi kurang lebih seberat 100 gram, yang setara dengan ¾ gelas adalah: 175 Kalori, 4 gram Protein dan 40 gram Karbohidrat.Daftar pangan sumber karbohidrat sebagai penukar 1 (satu) porsi nas</p>
                    <img src="{{asset('assets/img/a.png')}}" alt="" class="img-fluid">
                </li>
                <li>Lauk pauk sumber protein<br/>
                    <p>Tabel Kelompok Lauk Pauk sebagai Sumber Protein Nabati Kandungan zat gizi satu (1) porsi Tempe sebanyak 2 potong sedang atau 50 gram adalah 80 Kalori, 6 gram Protein, 3 gram lemak dan 8 gram karbohidrat. <br>Daftar pangan sumber protein nabati sebagai penukar 1 porsi tempe adalah:</p>
                    <p>Tabel Kelompok Lauk Pauk Sumber Protein Hewani Kandungan zat gizi satu (1) porsi terdiri dari satu (1) potong sedang Ikan segar seberat 40 gram adalah 50 Kalori, 7 gram Protein dan 2 gram lemak. Daftar lauk pauk sumber Protein hewani sebagai penukar 1 porsi Ikan segar adalah:</p>
                    <img src="{{asset('assets/img/b1.png')}}" alt="" class="img-fluid">
                    <img src="{{asset('assets/img/b2.png')}}" alt="" class="img-fluid">
                </li>
                <li>Sayur-sayuran adalah sayuran hijau dan berwarna lainnya. <br>
                <p>Berikut ini tabel Kelompok Pangan Sayuran beserta padanan porsinya : Tabel kelompok Pangan Sayuran Kandungan zat gizi per porsi (100 gram) adalah: 25 Kal, 5 gram karbohidrat, dan1 gram protein. Satu (1) porsi sayuran adalah kurang lebih 1 (satu) gelas sayuran setelah dimasak dan ditiriskan</p>
                <img src="{{asset('assets/img/c.png')}}" alt="" class="img-fluid">
                </li>
                <li>Buah-buahan adalah buah yang berwarna. <br>
                <p>Berikut ini tabel Kelompok Pangan Buah-buahan beserta padanan porsinya : Tabel Kelompok Buah-buahan Kandungan zat gizi perporsi buah (setara dengan 1 buah Pisang Ambon ukuran sedang) atau 50 gram, mengandung 50 Kalori dan 10 gram Karbohidrat. Daftar buah-buahan sebagai penukar 1 (satu) porsi buah: </p>
                <img src="{{asset('assets/img/d.png')}}" alt="" class="img-fluid">
                </li>
            </ol>
            {{-- add button add --}}

        </div>
    </div>
@endsection
