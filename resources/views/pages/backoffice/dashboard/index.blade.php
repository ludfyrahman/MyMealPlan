@extends('layouts.app')

@section('content-app')
    <div class="container mt-5">
        <!-- breadcrumb -->

        <!-- row -->
        <div class="row row-sm">
            <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Pasien</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{ count($pasien) }}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Total</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Konselor</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{ count($konselor) }}
                                    </h4>
                                    <p class="mb-0 tx-12 text-white op-7">Total Konselor</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Meal Plan Diet</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{ count($meal) }}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Total Meal Plan Diet</p>
                                </div>
                                <span class="float-end my-auto ms-auto">

                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- row closed -->
        {{-- make card for article  --}}
        <div class="container">
            <h4>Informasi</h4>
            @foreach ($article as $data)
            <div class="card px-4 py-4">
                {{-- <a href="{{route('article.show', $data->id)}}"> --}}
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{$data->image}}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h4 class="text-dark text-capitalize">{{$data->name}}</h4>
                            <p class="text-dark">{{$data->description}}</p>
                        </div>
                    </div>
                {{-- </a> --}}
            </div>
            @endforeach
        </div>
        <!-- row close -->
        <!-- /row -->
    </div>
@endsection
