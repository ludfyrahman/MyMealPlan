@extends('layouts.app')

@section('content-app')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-1">{{$title}}</h4>
                @if (session('failed'))
                    <div class="alert alert-danger mg-b-0" role="alert">
                        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('failed') }}
                    </div>
                @endif

            </div>
            <div class="card-body">

                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ $data->type == 'create' ? route('agenda.store') : route('agenda.update',$data->id) }}" method="POST"
                        enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        @if($data->type != 'create')
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Agenda <span class="tx-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') parsley-error @enderror"
                                        placeholder="Agenda" value="{{$data->name}}">
                                    @error('name')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Lokasi <span class="tx-danger">*</span></label>
                                    <input type="text" name="location"
                                        class="form-control @error('location') parsley-error @enderror"
                                        placeholder="Lokasi" value="{{$data->location}}">
                                    @error('location')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Deskripsi <span class="tx-danger">*</span></label>
                                    <textarea type="text" name="description"
                                        class="form-control @error('description') parsley-error @enderror"
                                        placeholder="Deskripsi" >{{$data->description}}</textarea>
                                    @error('description')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal<span class="tx-danger">*</span></label>
                                    <input type="date" name="date"
                                        class="form-control @error('date') parsley-error @enderror"
                                        placeholder="Tanggal" value="{{$data->date}}">
                                    @error('date')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status <span class="tx-danger">*</span></label>
                                        <select name="status"
                                            class="form-control @error('status') parsley-error @enderror">
                                            <option value="">Pilih status</option>
                                            <option {{ old('status') == 'Aktif' ? 'selected' : '' }} selected value="Aktif">Aktif
                                            </option>
                                            <option {{ old('status') == 'Nonaktif' ? 'selected' : '' }} value="Nonaktif">
                                                Nonaktif</option>
                                        </select>
                                        @error('status')
                                            <ul class="parsley-errors-list filled" id="parsley-id-5">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>

                        </div>

                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Batal</button>
                                <a href="{{ route('agenda.index') }}" class="btn btn-info">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
