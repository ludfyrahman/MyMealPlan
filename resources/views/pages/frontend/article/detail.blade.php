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
                </div>
            </div>
        </div>
    </div>
</div>


<section class="news-single section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="single-main">

                            <div class="news-head">
                                <img src="/storage/article/{{$data->image}}" alt="#">
                            </div>

                            <h1 class="news-title"><a href="news-single.html">{{$data->name}}</a></h1>

                            <div class="meta">
                                <div class="meta-left">
                                    <span class="author d-none"><a href="#"><img src="img/author1.jpg" alt="#">Naimur
                                            Rahman</a></span>
                                    <span class="date"><i class="fa fa-clock-o"></i>{{$data->created_at->format('D M,Y')}}</span>
                                </div>
                                <div class="meta-right d-none">
                                    <span class="comments"><a href="#"><i class="fa fa-comments"></i>05
                                            Comments</a></span>
                                    <span class="views"><i class="fa fa-eye"></i>33K Views</span>
                                </div>
                            </div>

                            <div class="news-text">
                                <p>{{$data->description}}</p>
                                <div class="image-gallery d-none">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="single-image">
                                                <img src="img/blog2.jpg" alt="#">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="single-image">
                                                <img src="img/blog3.jpg" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="blog-bottom d-none">

                                <ul class="social-share">
                                    <li class="facebook"><a href="#"><i
                                                class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                    <li class="twitter"><a href="#"><i
                                                class="fa fa-twitter"></i><span>Twitter</span></a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>

                                <ul class="prev-next">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-none">
                        <div class="blog-comments">
                            <h2>All Comments</h2>
                            <div class="comments-body">

                                <div class="single-comments">
                                    <div class="main">
                                        <div class="head">
                                            <img src="img/author1.jpg" alt="#" />
                                        </div>
                                        <div class="body">
                                            <h4>Afsana Mimi</h4>
                                            <div class="comment-meta"><span class="meta"><i
                                                        class="fa fa-calendar"></i>March 05, 2019</span><span
                                                    class="meta"><i class="fa fa-clock-o"></i>03:38 AM</span></div>
                                            <p>Lorem Ipsum available, but the majority have suffered alteration in
                                                some form, by injected humour, or randomised words Mirum est notare
                                                quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                                litterarum formas</p>
                                            <a href="#"><i class="fa fa-reply"></i>replay</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-comments left">
                                    <div class="main">
                                        <div class="head">
                                            <img src="img/author2.jpg" alt="#" />
                                        </div>
                                        <div class="body">
                                            <h4>Naimur Rahman</h4>
                                            <div class="comment-meta"><span class="meta"><i
                                                        class="fa fa-calendar"></i>March 05, 2019</span><span
                                                    class="meta"><i class="fa fa-clock-o"></i>03:38 AM</span></div>
                                            <p>Lorem Ipsum available, but the majority have suffered alteration in
                                                some form, by injected humour, or randomised words Mirum est notare
                                                quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                                litterarum formas</p>
                                            <a href="#"><i class="fa fa-reply"></i>replay</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-comments">
                                    <div class="main">
                                        <div class="head">
                                            <img src="img/author3.jpg" alt="#" />
                                        </div>
                                        <div class="body">
                                            <h4>Suriya Molharta</h4>
                                            <div class="comment-meta"><span class="meta"><i
                                                        class="fa fa-calendar"></i>March 05, 2019</span><span
                                                    class="meta"><i class="fa fa-clock-o"></i>03:38 AM</span></div>
                                            <p>Lorem Ipsum available, but the majority have suffered alteration in
                                                some form, by injected humour, or randomised words Mirum est notare
                                                quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                                litterarum formas</p>
                                            <a href="#"><i class="fa fa-reply"></i>replay</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-none">
                        <div class="comments-form">
                            <h2>Leave Comments</h2>

                            <form class="form" method="post"
                                action="https://wpthemesgrid.com/themes/mediplus/mail/mail.php">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <i class="fa fa-user"></i>
                                            <input type="text" name="first-name" placeholder="First name"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <i class="fa fa-envelope"></i>
                                            <input type="text" name="last-name" placeholder="Last name"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <i class="fa fa-envelope"></i>
                                            <input type="email" name="email" placeholder="Your Email"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group message">
                                            <i class="fa fa-pencil"></i>
                                            <textarea name="message" rows="7"
                                                placeholder="Type Your Message Here"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn primary"><i
                                                    class="fa fa-send"></i>Submit Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
