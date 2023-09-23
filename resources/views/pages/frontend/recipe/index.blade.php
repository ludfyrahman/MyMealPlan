@extends('layouts.front')
@section('content-app')
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>{{$title}}</h2>
                    <ul class="bread-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">{{$title}}</li>
                    </ul>
                    <div class="single-widget search">
                        <div class="form">
                            <input type="email" placeholder="Search Here...">
                            <a class="button" href="#"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="blog grid section">
    <div class="container">
        <h4>Resep sehat terbaru</h4>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    @foreach ($data as $d)
                    <div class="col-lg-4 col-md-4 col-12">
                        <a href="{{route('resep.detail', $d->id)}}">
                            <div class="single-news">
                                <div class="news-head">
                                    <img src="/storage/recipe/{{$d->image}}" alt="#">
                                </div>
                                <div class="news-body">
                                    <div class="news-content">
                                        <div class="date">{{$d->created_at->format('D M, Y')}}</div>
                                        <h2><a href="{{route('resep.detail', $d->id)}}">{{$d->name}}</a>
                                        </h2>
                                        <p class="text">{{substr($d->description,0,50)}}</p>
                                        @foreach ($d->category as $cat)
                                            <span class="badge bg-primary text-white">{{$cat->category->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach
                    {{-- <div class="col-12">

                        <div class="pagination">
                            <ul class="pagination-list">
                                <li><a href="#"><i class="icofont-rounded-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                            </ul>
                        </div>

                    </div> --}}
                </div>
            </div>

        </div>
        <h4 class="mt-2">Semua Resep</h4>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    @foreach ($data as $d)
                    <div class="col-lg-4 col-md-4 col-12">
                        <a href="{{route('artikel.detail', $d->id)}}">
                            <div class="single-news">
                                <div class="news-head">
                                    <img src="/storage/recipe/{{$d->image}}" alt="#">
                                </div>
                                <div class="news-body">
                                    <div class="news-content">
                                        <div class="date">{{$d->created_at->format('D M, Y')}}</div>
                                        <h2><a href="{{route('artikel.detail', $d->id)}}">{{$d->name}}</a>
                                        </h2>
                                        <p class="text">{{$d->description}}</p>
                                        @foreach ($d->category as $cat)
                                            <span class="badge bg-primary text-white">{{$cat->category->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
