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
                                            <tr class='row-pola'>
                                                <td>{{$i}}</td>
                                                <td><textarea type="text" name='pola_makan_pagi[{{$i}}]' class="form-control">{{old("pola_makan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='pola_selingan_pagi[{{$i}}]' class="form-control">{{old("pola_selingan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='pola_makan_siang[{{$i}}]' class="form-control">{{old("pola_makan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='pola_selingan_siang[{{$i}}]' class="form-control">{{old("pola_selingan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='pola_makan_malam[{{$i}}]' class="form-control">{{old("pola_makan_malam[".$i."]")}}</textarea></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete-pola"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>

                                <button type="button" class="btn btn-primary btn-pola"><i class="fas fa-plus"></i>  Tambah Hari</button>
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
                                            <tr class='row-master'>
                                                <td>{{$i}}</td>
                                                <td><textarea type="text" name='master_makan_pagi[{{$i}}]' class="form-control">{{old("master_makan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='master_selingan_pagi[{{$i}}]' class="form-control">{{old("master_selingan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='master_makan_siang[{{$i}}]' class="form-control">{{old("master_makan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='master_selingan_siang[{{$i}}]' class="form-control">{{old("master_selingan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='master_makan_malam[{{$i}}]' class="form-control">{{old("master_makan_malam[".$i."]")}}</textarea></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete-master"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary btn-master"><i class="fas fa-plus"></i>  Tambah Hari</button>
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
                                            <tr class='row-siklus'>
                                                <td>{{$i}}</td>
                                                <td><textarea type="text" name='siklus_makan_pagi[{{$i}}]' class="form-control">{{old("siklus_makan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='siklus_selingan_pagi[{{$i}}]' class="form-control">{{old("siklus_selingan_pagi[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='siklus_makan_siang[{{$i}}]' class="form-control">{{old("siklus_makan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='siklus_selingan_siang[{{$i}}]' class="form-control">{{old("siklus_selingan_siang[".$i."]")}}</textarea></td>
                                                <td><textarea type="text" name='siklus_makan_malam[{{$i}}]' class="form-control">{{old("siklus_makan_malam[".$i."]")}}</textarea></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete-siklus"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary btn-siklus"><i class="fas fa-plus"></i>  Tambah Hari</button>
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
    @push('script')
    <script>
        $(function(){
            $('.btn-pola').click(function(){
                var count_row_pola = $('.row-pola').length;
                var html = '<tr class="row-pola"><td>'+(count_row_pola+1)+'</td><td><textarea type="text" name="pola_makan_pagi[]" class="form-control"></textarea></td><td><textarea type="text" name="pola_selingan_pagi[]" class="form-control"></textarea></td><td><textarea type="text" name="pola_makan_siang[]" class="form-control"></textarea></td><td><textarea type="text" name="pola_selingan_siang[]" class="form-control"></textarea></td><td><textarea type="text" name="pola_makan_malam[]" class="form-control"></textarea></td></tr>';
                $('.row-pola:last').after(html);
            });
            $('.btn-delete-pola').click(function(){
                var count_row_pola = $('.row-pola').length;
                if(count_row_pola==1){
                    alert('Tidak bisa menghapus baris terakhir');
                    return false;
                }
                $(this).closest('tr').remove();
                $('.row-pola').each(function(index){
                    $(this).find('td:first').html(index+1);
                });
            });
            $('.btn-master').click(function(){
                var count_row_master = $('.row-master').length;
                var html = '<tr class="row-master"><td>'+(count_row_master+1)+'</td><td><textarea type="text" name="master_makan_pagi[]" class="form-control"></textarea></td><td><textarea type="text" name="master_selingan_pagi[]" class="form-control"></textarea></td><td><textarea type="text" name="master_makan_siang[]" class="form-control"></textarea></td><td><textarea type="text" name="master_selingan_siang[]" class="form-control"></textarea></td><td><textarea type="text" name="master_makan_malam[]" class="form-control"></textarea></td></tr>';
                $('.row-master:last').after(html);
            });
            $('.btn-delete-master').click(function(){
                var count_row_master = $('.row-master').length;
                if(count_row_master==1){
                    alert('Tidak bisa menghapus baris terakhir');
                    return false;
                }
                $(this).closest('tr').remove();
                $('.row-master').each(function(index){
                    $(this).find('td:first').html(index+1);
                });
            });
            $('.btn-siklus').click(function(){
                var count_row_siklus = $('.row-siklus').length;
                var html = '<tr class="row-siklus"><td>'+(count_row_siklus+1)+'</td><td><textarea type="text" name="siklus_makan_pagi[]" class="form-control"></textarea></td><td><textarea type="text" name="siklus_selingan_pagi[]" class="form-control"></textarea></td><td><textarea type="text" name="siklus_makan_siang[]" class="form-control"></textarea></td><td><textarea type="text" name="siklus_selingan_siang[]" class="form-control"></textarea></td><td><textarea type="text" name="siklus_makan_malam[]" class="form-control"></textarea></td></tr>';
                $('.row-siklus:last').after(html);
            });
            $('.btn-delete-siklus').click(function(){
                var count_row_siklus = $('.row-siklus').length;
                if(count_row_siklus==1){
                    alert('Tidak bisa menghapus baris terakhir');
                    return false;
                }
                $(this).closest('tr').remove();
                $('.row-siklus').each(function(index){
                    $(this).find('td:first').html(index+1);
                });
            });
        })
    </script>

    @endpush
@endsection
