<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
    <style>
        .w-full{
            width: 100%;
        }
        .table{
            border-collapse: collapse;
        }
        .table td, .table th{
            padding: 5px;
        }
        .table th{
            text-align: center;
            background-color: #eee;
        }
        .text-center{
            text-align: center;
        }
        @media print{
            button{
                display: none;
            }
        }
    </style>
    <button onclick="window.print()">Print</button>
    <h2 class="text-center">Catatan Konsultasi Pasien {{$data->pasien->nama}}</h2>
    <table class="w-full">
        <tr>
            <td>Tanggal Kunjungan</td>
            <td>:</td>
            <td>{{$data->created_at->format('d, M Y')}}</td>
        </tr>
        <tr>
            <td>No RM</td>
            <td>:</td>
            <td>{{$data->pasien->no_rm ?? '-'}}</td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td>{{$data->pasien->nama ?? '-'}}</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td>{{$data->pasien->umur ?? '-'}}</td>
        </tr>
        <tr>
            <td>TB</td>
            <td>:</td>
            <td>{{$data->pasien->tb ?? '-'}} Cm</td>
        </tr>
        <tr>
            <td>BB</td>
            <td>:</td>
            <td>{{$data->pasien->bb ?? '-'}} Kg</td>
        </tr>
        <tr>
            <td>Riwayat Penyakit</td>
            <td>:</td>
            <td>{{$data->pasien->riwayat_penyakit ?? '-'}}</td>
        </tr>
        <tr>
            <td>Jenis Diet</td>
            <td>:</td>
            <td>{{$data->pasien->jenis_diet ?? '-'}}</td>
        </tr>
        <tr>
            <td>Jumlah Kalori</td>
            <td>:</td>
            <td>{{$data->pasien->jumlah_kalori ?? '-'}}</td>
        </tr>
        <tr>
            <td>Jumlah Protein</td>
            <td>:</td>
            <td>{{$data->pasien->jumlah_protein ?? '-'}}</td>
        </tr>
        <tr>
            <td>Jumlah Lemak</td>
            <td>:</td>
            <td>{{$data->pasien->jumlah_lemak ?? '-'}}</td>
        </tr>
        <tr>
            <td>Jumlah Karbohidrat</td>
            <td>:</td>
            <td>{{$data->pasien->jumlah_karbohidrat ?? '-'}}</td>
        </tr>
        <tr>
            <td>Konselor</td>
            <td>:</td>
            <td>{{$data->user->username ?? ''}}</td>
        </tr>
    </table>
    <h4>Menu</h4>
    <p>Perancangan <b>{{$data->subcategory->category->type == 1 ? 'Meal Plan' : 'Meal Plan Diet'}}</b> -> <b>{{$data->subcategory->category->name ?? '-'}}</b> -> Detail Perancangan <b>{{$data->subcategory->name ?? '-'}}</b></p>
    <h4>Pola Menu Diet</h4>
    <table class="w-full table" border="1">
        <thead>
            <tr>
                <th>Hari Ke</th>
                <th>Makan Pagi</th>
                <th>Selingan Pagi</th>
                <th>Makan Siang</th>
                <th>Selingan Siang</th>
                <th>Makan Malam</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->subcategory->polaMenuDiet as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->makan_pagi ?? '-'}}</td>
                    <td>{{$item->selingan_pagi ?? '-'}}</td>
                    <td>{{$item->makan_siang ?? '-'}}</td>
                    <td>{{$item->selingan_siang ?? '-'}}</td>
                    <td>{{$item->makan_malam ?? '-'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Master Menu Diet</h4>
    <table class="w-full table" border="1">
        <thead>
            <tr>
                <th>Hari Ke</th>
                <th>Makan Pagi</th>
                <th>Selingan Pagi</th>
                <th>Makan Siang</th>
                <th>Selingan Siang</th>
                <th>Makan Malam</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->subcategory->masterMenuDiet as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->makan_pagi ?? '-'}}</td>
                    <td>{{$item->selingan_pagi ?? '-'}}</td>
                    <td>{{$item->makan_siang ?? '-'}}</td>
                    <td>{{$item->selingan_siang ?? '-'}}</td>
                    <td>{{$item->makan_malam ?? '-'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h4>Siklus Menu Diet</h4>
    <table class="w-full table" border="1">
        <thead>
            <tr>
                <th>Hari Ke</th>
                <th>Makan Pagi</th>
                <th>Selingan Pagi</th>
                <th>Makan Siang</th>
                <th>Selingan Siang</th>
                <th>Makan Malam</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->subcategory->siklusMenuDiet as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->makan_pagi ?? '-'}}</td>
                    <td>{{$item->selingan_pagi ?? '-'}}</td>
                    <td>{{$item->makan_siang ?? '-'}}</td>
                    <td>{{$item->selingan_siang ?? '-'}}</td>
                    <td>{{$item->makan_malam ?? '-'}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
