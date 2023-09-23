@extends('layouts.app')

@section('content-app')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-1">Pengaturan Profil Perusahaan</h4>
                @if (session('failed'))
                    <div class="alert alert-danger mg-b-0" role="alert">
                        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('failed') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success mg-b-0" role="alert">
                        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                @endif

            </div>
            <div class="card-body">

                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{ route('profile.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data" data-parsley-validate="">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Sekolah <span class="tx-danger">*</span></label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') parsley-error @enderror"
                                        placeholder="Nama Perusahaan" value="{{ $data->name }}">
                                    @error('name')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Intro Video <span class="tx-danger">*</span></label>
                                    <input type="url" class="form-control" name="intro" data-height="200"
                                        value="{{ asset($data->intro) }}" />
                                    @error('intro')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Kepala Sekolah <span class="tx-danger">*</span></label>
                                    <input type="text" id="headmaster" headmaster="headmaster"
                                        class="form-control @error('headmaster') parsley-error @enderror"
                                        placeholder="Nama Perusahaan" value="{{ $data->headmaster }}">
                                    @error('headmaster')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email Sekolah <span class="tx-danger">*</span></label>
                                    <input type="text" id="email" name="email"
                                        class="form-control @error('email') parsley-error @enderror"
                                        placeholder="Email Sekolah" value="{{ $data->email }}">
                                    @error('email')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 d-none">
                                <div class="form-group">
                                    <label for="">No Hp Sekolah <span class="tx-danger">*</span></label>
                                    <input type="text" id="email" name="phone"
                                        class="form-control @error('phone') parsley-error @enderror"
                                        placeholder="No Hp Sekolah" value="{{ $data->phone }}">
                                    @error('phone')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Logo <span class="tx-danger">*</span></label>
                                    <input type="file" class="dropify" name="logo" data-height="200"
                                        data-default-file="{{ asset($data->logo) }}" />
                                    @error('logo')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Foto Kepala Sekolah<span class="tx-danger">*</span></label>
                                    <input type="file" accept="image/png, image/gif, image/jpeg"  class="dropify" name="banner" data-height="200"
                                        data-default-file="{{ asset($data->headmaster_photo) }}" />
                                    @error('headmaster_photo')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Foto Banner<span class="tx-danger">*</span></label>
                                    <input type="file" accept="image/png, image/gif, image/jpeg"  class="dropify" name="banner" data-height="200"
                                        data-default-file="{{ asset($data->banner) }}" />
                                    @error('banner')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sambutan Kepala Sekolah <span class="tx-danger">*</span></label>
                                    <textarea rows="5" type="text" id="opening_speech_headmaster" opening_speech_headmaster="opening_speech_headmaster"
                                        class="form-control @error('opening_speech_headmaster') parsley-error @enderror"
                                        placeholder="Nama Perusahaan">{{ $data->opening_speech_headmaster }}</textarea>
                                    @error('opening_speech_headmaster')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Visi <span class="tx-danger">*</span></label>
                                    <textarea name="visi" class="form-control @error('visi') parsley-error @enderror" id="summernote" cols="10"
                                        rows="5"> {{ $data->visi }}</textarea>

                                    @error('visi')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Misi <span class="tx-danger">*</span></label>
                                    <textarea name="misi" class="form-control @error('misi') parsley-error @enderror" id="summernote" cols="10"
                                        rows="5"> {{ $data->misi }}</textarea>

                                    @error('misi')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Facebook <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="facebook" data-height="200"
                                        value="{{ asset($data->facebook) }}" />
                                    @error('facebook')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Instagram <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="instagram" data-height="200"
                                        value="{{ asset($data->instagram) }}" />
                                    @error('instagram')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Twitter <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="twitter" data-height="200"
                                        value="{{ asset($data->twitter) }}" />
                                    @error('twitter')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Alamat <span class="tx-danger">*</span></label>
                                    <textarea name="address" class="form-control @error('address') parsley-error @enderror" id="summernote" cols="10"
                                        rows="3"> {{ $data->address }}</textarea>

                                    @error('address')
                                        <ul class="parsley-errors-list filled" id="parsley-id-5">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" onclick="" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Batal</button>
                                <a href="{{ url('employe') }}" class="btn btn-info">Kembali</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
