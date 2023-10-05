@extends('layouts.app')

@section('content-app')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-1">{{ $title }}</h4>
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
                    <form class="form-horizontal"
                        action="{{ $data->type == 'create' ? route($var.'.store', ['id' => $id]) : route($var.'.update', $data->id,['id' => $id]) }}"
                        method="POST" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        @if ($data->type != 'create')
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Pasien <span class="tx-danger">*</span></label>
                                    <select name="pasien_id" class="form-control" id="" required>
                                        <option value="">Pilih Pasien</option>
                                        @foreach ($pasien as $item)
                                            <option value="{{ $item->id }}" @if ($data->pasien_id == $item->id) selected @endif>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('pasien_id')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Konselor <span class="tx-danger">*</span></label>
                                    <select name="user_id" class="form-control" id="" required>
                                        <option value="">Pilih Konselor</option>
                                        @foreach ($konselor as $item)
                                            <option value="{{ $item->id }}" @if ($data->user_id == $item->id) selected @endif>{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Deskripsi <span class="tx-danger">*</span></label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                    @error('description')
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
                                <a href="{{ route($var.'.index') }}" class="btn btn-info">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
