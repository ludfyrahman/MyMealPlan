<section class="space">
        <div class="container z-index-common">
            <div class="title-area text-center">
                <h2 class="sec-title">Agenda Kegiatan <span class="text-theme fw-light"> Civitas Akademika</span></h2>
            </div>
            <div class="row">
                @foreach ($agenda as $agend)

                <div class="col-xl-6">
                    <div class="event-card">
                        <div class="event-card_img"><img src="<?= url('') ?>" alt="event"></div>
                        <div class="event-card_content">
                            <div class="event-meta">
                                <p><i class="fal fa-location-dot"></i>{{$agend->location}}</p>
                                <p><i class="fal fa-clock"></i>{{$agend->start_date}} - {{$agend->end_date}}</p>
                            </div>
                            <h3 class="event-card_title"><a href="event-details.html">{{$agend->description}}</a></h3>
                            <div class="event-card_bottom"><a href="event-details.html" class="as-btn">View Event</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center d-none mt-20 mt-xl-5"><a href="event.html" class="as-btn">View All Events<i
                        class="fas fa-arrow-right ms-2"></i></a></div>
        </div>
        <div class="shape-mockup jump d-none d-md-block" data-top="0%" data-left="0%"><img
                src="fe_assets/img/shape/dot_shape_3.png" alt="shapes"></div>
        <div class="shape-mockup jump d-none d-md-block" data-top="4%" data-right="0%"><img
                src="fe_assets/img/shape/cloud_1.png" alt="shapes"></div>
        <div class="shape-mockup jump-reverse d-none d-md-block" data-top="8%" data-right="0%"><img
                src="fe_assets/img/shape/cloud_2.png" alt="shapes"></div>
    </section>
