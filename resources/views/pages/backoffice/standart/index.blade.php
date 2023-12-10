@extends('layouts.app')

@section('content-app')
    <div class="container mt-4">
        <div class="card px-4 py-4">
            <h4>Standart Porsi</h4>
            {{-- add button add --}}
            @if(auth()->user()->role != 'Admin')
            <a href="{{ route('standart.create') }}" class="btn btn-primary mb-3">Tambah</a>
            @endif
            {{-- show alert if data empty --}}
            @if (count($datas) == 0)
                <div class="alert alert-danger" role="alert">
                    Data Kosong
                </div>
            @endif
            @foreach ($datas as $data)
                <div class="row mt-2">
                    <div class="col-11">
                        <img src="{{$data->image}}" class="w-100" alt="">
                    </div>
                    <div class="col-1 text-start ">
                        {{-- make delete using get method --}}
                        @if(auth()->user()->role == 'Admin')
                        <a href="{{route('standart.delete', $data->id)}}" onclick="return confirm('apakah anda yakin ingin menghapus data?')" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
