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
                        action="{{ $data->type == 'create' ? route($var.'.store') : route($var.'.update', $data->id) }}"
                        method="POST" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf
                        @if ($data->type != 'create')
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NO RM <span class="tx-danger">*</span></label>
                                    <input type="text" name="no_rm"
                                        class="form-control @error('no_rm') parsley-error @enderror" placeholder="NO RM"
                                        value="{{ $data->no_rm == '' ? old('no_rm') : $data->no_rm }}">
                                    @error('no_rm')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama <span class="tx-danger">*</span></label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') parsley-error @enderror" placeholder="Nama"
                                        value="{{ $data->nama == '' ? old('nama') : $data->nama }}">
                                    @error('nama')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">TB <span class="tx-danger">*</span></label>
                                    <input type="text" name="tb"
                                        class="form-control @error('tb') parsley-error @enderror" placeholder="TB"
                                        value="{{ $data->tb == '' ? old('tb') : $data->tb }}">
                                    @error('tb')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">BB <span class="tx-danger">*</span></label>
                                    <input type="text" name="bb"
                                        class="form-control @error('bb') parsley-error @enderror" placeholder="BB"
                                        value="{{ $data->bb == '' ? old('bb') : $data->bb }}">
                                    @error('bb')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Umur <span class="tx-danger">*</span></label>
                                    <input type="text" name="umur"
                                        class="form-control @error('umur') parsley-error @enderror" placeholder="Umur"
                                        value="{{ $data->umur == '' ? old('umur') : $data->umur }}">
                                    @error('umur')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Riwayat Penyakit <span class="tx-danger">*</span></label>
                                        <textarea name="riwayat_penyakit" class="form-control @error('riwayat_penyakit') parsley-error @enderror" id="" cols="30" rows="10">{{ $data->riwayat_penyakit == '' ? old('riwayat_penyakit') : $data->riwayat_penyakit }}</textarea>
                                    @error('umur')
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
