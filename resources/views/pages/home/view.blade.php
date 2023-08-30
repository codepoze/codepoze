<!-- begin:: base -->
@extends('pages/base')
<!-- end:: base -->

<!-- begin:: css local -->
@section('css')
<style>
    .card {
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        border: 0;
        border-radius: 1rem;
    }

    .card-img-top {
        border-top-left-radius: calc(1rem - 1px);
        border-top-right-radius: calc(1rem - 1px)
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
    }
</style>
@endsection
<!-- end:: css local -->

<!-- begin:: content -->
@section('content')
<header class="py-4 intro section-shaped bg-dark">
    <div class="page-header">
        <div id="particles-js"></div>
        <div class="container text-center text-white">
            <h1 class="display-4 fw-bolder">Welcome to CodePoze</h1>
            <p class="lead fw-normal text-white-50 mb-0">
                Penyedia jasa source code program aplikasi gratis, berbayar, jasa pembuatan dan pengembangan.
            </p>
        </div>
    </div>
</header>
<!-- begin:: product berbayar -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xl-12 text-center">
                <h3 class="mb-4">Product Paid</h3>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    Akses Source Code dan Layanan Aplikasi Berkualitas
                </p>
            </div>
        </div>

        @if (count($product_paid) > 0)
        <div class="row justify-content-center">
            @foreach ($product_paid as $row)
            <div class="col-md-12 col-lg-4 col-xl-4 mb-2">
                <div class="card">
                    <img class="card-img-top" src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="{{ $row->judul }}" />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $row->judul }}</h5>
                            {{ rupiah($row->toPrice->nilai_normal) }}
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-primary mt-auto" href="{{ route('products.detail', ['slug' => $row->toType->singkatan, 'id' => $row->id_product]) }}">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                <a class="btn btn-primary mt-auto" href="{{ route('products', 'type='.$row->toPrice->jenis) }}">Lihat Semua</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="alert alert-info">
                    <strong>Info Message</strong>
                    <hr class="message-inner-separator">
                    <p>Maaf, produk belum tersedia.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- end:: product berbayar -->
<!-- begin:: product gratis -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xl-12 text-center">
                <h3 class="mb-4">Product Free</h3>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    Akses Source Code Gratis untuk Semua
                </p>
            </div>
        </div>

        @if (count($product_free) > 0)
        <div class="row justify-content-center">
            @foreach ($product_free as $row)
            <div class="col-md-12 col-lg-4 col-xl-4 mb-2">
                <div class="card">
                    <img class="card-img-top" src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="{{ $row->judul }}" />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $row->judul }}</h5>
                            {{ rupiah($row->toPrice->nilai_normal) }}
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-primary mt-auto" href="{{ route('products.detail', ['slug' => $row->toType->singkatan, 'id' => $row->id_product]) }}">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                <a class="btn btn-primary mt-auto" href="{{ route('products', 'type='.$row->toPrice->jenis) }}">Lihat Semua</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="alert alert-info">
                    <strong>Info Message</strong>
                    <hr class="message-inner-separator">
                    <p>Maaf, produk belum tersedia.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- end:: product gratis -->
<!-- begin:: testimonies -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xl-12 text-center">
                <h3 class="mb-4">Testimonials</h3>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    Pengalaman Luar Biasa dengan Layanan CodePoze
                </p>
            </div>
        </div>

        @if (count($testimony) > 0)
        <div class="row justify-content-center">
            @foreach ($testimony as $row)
            <div class="col-md-4 mb-5 mb-md-0 text-center">
                <h5 class="mb-3">{{ $row->first_name }} {{ $row->last_name }}</h5>
                <p class="px-xl-3">
                    <i class="fa fa-quote-left pe-2"></i>{{ $row->message }}
                </p>
            </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="alert alert-info">
                    <strong>Info Message</strong>
                    <hr class="message-inner-separator">
                    <p>Maaf, testimonials belum tersedia.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- end:: testimonies -->
@endsection
<!-- end:: content -->

<!-- begin:: js local -->
@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

<script>
    particlesJS("particles-js", {
        particles: {
            number: {
                value: 80,
                density: {
                    enable: !0,
                    value_area: 800
                }
            },
            color: {
                value: "#fff"
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#000000"
                },
                polygon: {
                    nb_sides: 5
                },
                image: {
                    src: "img/github.svg",
                    width: 100,
                    height: 100
                }
            },
            opacity: {
                value: .5,
                random: !1,
                anim: {
                    enable: !1,
                    speed: 1,
                    opacity_min: .1,
                    sync: !1
                }
            },
            size: {
                value: 3,
                random: !0,
                anim: {
                    enable: !1,
                    speed: 40,
                    size_min: .1,
                    sync: !1
                }
            },
            line_linked: {
                enable: !0,
                distance: 150,
                color: "#fff",
                opacity: .4,
                width: 1
            },
            move: {
                enable: !0,
                speed: 6,
                direction: "none",
                random: !1,
                straight: !1,
                out_mode: "out",
                bounce: !1,
                attract: {
                    enable: !1,
                    rotateX: 600,
                    rotateY: 1200
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: !0,
                    mode: "repulse"
                },
                onclick: {
                    enable: !0,
                    mode: "push"
                },
                resize: !0
            },
            modes: {
                grab: {
                    distance: 400,
                    line_linked: {
                        opacity: 1
                    }
                },
                bubble: {
                    distance: 400,
                    size: 40,
                    duration: 2,
                    opacity: 4,
                    speed: 3
                },
                repulse: {
                    distance: 200,
                    duration: .4
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: !0
    });
</script>
@endsection
<!-- end:: js local -->