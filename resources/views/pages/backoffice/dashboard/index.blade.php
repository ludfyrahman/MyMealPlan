@extends('layouts.app')

@section('content-app')
    <div class="container mt-5">
        <!-- breadcrumb -->

        <!-- row -->
        {{-- <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Kategori</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{ count($category) }}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Total</p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Resep</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{ count($recipe) }}
                                    </h4>
                                    <p class="mb-0 tx-12 text-white op-7">Total Guru Pengajar</p>
                                </div>
                                <span class="float-end my-auto ms-auto">
                                    <!-- <i
                                        class="fas fa-arrow-circle-{{ $summary->purchaseTodayBefore < 0 ? 'down' : 'up' }} text-white"></i>
                                    <span class="text-white op-7"> {{ $summary->purchaseTodayBefore }}%</span> -->
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Pengguna</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{ count($users) }}</h4>
                                    <p class="mb-0 tx-12 text-white op-7">Total Pengguna</p>
                                </div>
                                <span class="float-end my-auto ms-auto">

                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-warning-gradient">
                    <div class="ps-3 pt-3 pe-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">Agenda</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 fw-bold mb-1 text-white">{{ 0 }}
                                    </h4>
                                    <p class="mb-0 tx-12 text-white op-7">Total Agenda</p>
                                </div>
                                <span class="float-end my-auto ms-auto">

                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        <!-- row closed -->

        <!-- row close -->
        <!-- /row -->
    </div>
    @push('script')
        <script>
            /* Apexcharts (#bar) */
            var optionsBar = {
                chart: {
                    height: 249,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                    fontFamily: 'Nunito, sans-serif'
                },
                colors: ["#036fe7", '#f93a5a'],
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: false
                        },
                        columnWidth: '42%',
                        endingShape: 'rounded',
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    endingShape: 'rounded',
                    colors: ['transparent'],
                },
                responsive: [{
                    breakpoint: 576,
                    options: {
                        stroke: {
                            show: true,
                            width: 1,
                            endingShape: 'rounded',
                            colors: ['transparent'],
                        },
                    },


                }],
                series: [{
                    name: 'Penjualan',
                    data: @json($summary->salesChart)
                }, {
                    name: 'Pembelian',
                    data: @json($summary->purchaseChart)
                }, ],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    show: false,
                    floating: true,
                    position: 'top',
                    horizontalAlign: 'left',
                    // offsetY: -36

                },
                title: {
                    text: 'Grafik Pembelian dan Penjualan toko',
                    align: 'left',
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return " " + val + " Item"
                        }
                    }
                }
            }
            new ApexCharts(document.querySelector('#bar'), optionsBar).render();

            $('#vmap2').vectorMap({
                map: 'usa_en',
                showTooltip: true,
                backgroundColor: '#fff',
                color: '#60adff',
                colors: {
                    mo: '#9fceff',
                    fl: '#60adff',
                    or: '#409cff',
                    ca: '#005cbf',
                    tx: '#005cbf',
                    wy: '#005cbf',
                    ny: '#007bff'
                },
                hoverColor: '#222',
                enableZoom: false,
                borderWidth: 1,
                borderColor: '#fff',
                hoverOpacity: .85
            });

            /*--- Apex (#chart) ---*/
            var options = {
                series: [{{ $summary->product }}, {{ $summary->service }}],
                chart: {
                    width: '100%',
                    type: 'pie',
                },
                labels: ["Produk", "Jasa"],
                theme: {
                    monochrome: {
                        enabled: true
                    }
                },
                plotOptions: {
                    pie: {
                        dataLabels: {
                            offset: -5
                        }
                    }
                },
                title: {
                    text: "Grafik Perbandingan Penjualan"
                },
                legend: {
                    show: true
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
            /*--- Apex (#chart)closed ---*/
        </script>
    @endpush
@endsection
