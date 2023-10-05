@extends('layouts.app')

@section('content-app')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    Form Isian Diet
                </div>
                @if (session('success'))
                    <div class="alert alert-success mg-b-0" role="alert">
                        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('failed'))
                    <div class="alert alert-danger mg-b-0" role="alert">
                        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('failed') }}
                    </div>
                @endif
                <table>
                    <tr>
                        <td>Nama Kategori</td><td>:</td><td>{{$subcategory->category->name}}</td>
                    </tr>
                    <tr>
                        <td>Pola Menu Diet</td><td>:</td><td>{{$subcategory->name}}</td>
                    </tr>
                </table>
                <form action="{{route('saveData')}}" method="POST">
                    @csrf
                    <input type="hidden" name="subcategory_id" value="{{$id}}">
                    <div id="wizard1">
                        <h3>Pola menu diet</h3>
                        <section>
                            <div class="table-responsive mg-t-20">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Hari Ke</th><th>Makan Pagi</th><th>Selingan Pagi</th><th>Makan Siang</th><th>Selingan Siang</th><th>Makan Malam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i=1;$i<=7;$i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><textarea type="text" name='pola_makan_pagi[{{$i}}]' class="form-control">{{old("pola_makan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='pola_selingan_pagi[{{$i}}]' class="form-control">{{old("pola_selingan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='pola_makan_siang[{{$i}}]' class="form-control">{{old("pola_makan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='pola_selingan_siang[{{$i}}]' class="form-control">{{old("pola_selingan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='pola_makan_malam[{{$i}}]' class="form-control">{{old("pola_makan_malam[".$i."]")}}</textarea></td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <h3>Master menu diet</h3>
                        <section>
                            <div class="table-responsive mg-t-20">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Hari Ke</th><th>Makan Pagi</th><th>Selingan Pagi</th><th>Makan Siang</th><th>Selingan Siang</th><th>Makan Malam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i=1;$i<=7;$i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><textarea type="text" name='master_makan_pagi[{{$i}}]' class="form-control">{{old("master_makan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='master_selingan_pagi[{{$i}}]' class="form-control">{{old("master_selingan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='master_makan_siang[{{$i}}]' class="form-control">{{old("master_makan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='master_selingan_siang[{{$i}}]' class="form-control">{{old("master_selingan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='master_makan_malam[{{$i}}]' class="form-control">{{old("master_makan_malam[".$i."]")}}</textarea></td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <h3>Siklus Menu Diet</h3>
                        <section>
                            <div class="table-responsive mg-t-20">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Hari Ke</th><th>Makan Pagi</th><th>Selingan Pagi</th><th>Makan Siang</th><th>Selingan Siang</th><th>Makan Malam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i=1;$i<=7;$i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td><textarea type="text" name='siklus_makan_pagi[{{$i}}]' class="form-control">{{old("siklus_makan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='siklus_selingan_pagi[{{$i}}]' class="form-control">{{old("siklus_selingan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='siklus_makan_siang[{{$i}}]' class="form-control">{{old("siklus_makan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='siklus_selingan_siang[{{$i}}]' class="form-control">{{old("siklus_selingan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='siklus_makan_malam[{{$i}}]' class="form-control">{{old("siklus_makan_malam[".$i."]")}}</textarea></td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <h3>Halaman Konfirmasi</h3>
                        <section class="text-center">
                            <h3>Apakah anda yakin ingin menyimpan data?</h3>
                            <p>Jika anda yakin tekan tombol simpan dibawah ini</p>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
