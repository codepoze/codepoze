<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

    <header id="hero">
        <div id="particles-js"></div>
        <div class="container">
            <h1>{{ __('home.text_1') }}</h1>
            <p>{{ __('home.text_2') }}</p>
        </div>
    </header>

    <main>
        <section id="layanan" class="section-bg">
            <div class="container">
                <div class="text-center mb-5">
                    <h2>Layanan Kami</h2>
                    <p>
                        Kami menyediakan solusi digital yang fleksibel sesuai kebutuhan Anda.</p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-card text-center">
                            <div class="service-icon"><i class="bi bi-cloud-download"></i></div>
                            <h4>Source Code Gratis</h4>
                            <p>Dapatkan akses ke berbagai source code program aplikasi gratis
                                untuk proyek belajar atau prototipe Anda.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-card text-center">
                            <div class="service-icon"><i class="bi bi-gem"></i></div>
                            <h4>Source Code Premium</h4>
                            <p>Beli source code berkualitas tinggi dengan dokumentasi lengkap
                                dan dukungan penuh untuk proyek komersial.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-card text-center">
                            <div class="service-icon"><i class="bi bi-code-slash"></i></div>
                            <h4>Jasa Pembuatan Aplikasi</h4>
                            <p>Tim ahli kami siap membangun aplikasi web atau mobile dari awal
                                sesuai dengan spesifikasi unik Anda.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-card text-center">
                            <div class="service-icon"><i class="bi bi-gear-wide-connected"></i></div>
                            <h4>Pengembangan & Maintenance</h4>
                            <p>Kami membantu mengembangkan fitur baru, optimasi, dan
                                pemeliharaan rutin untuk aplikasi Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- begin:: produk -->
        <section id="produk">
            <div class="container">
                <!-- begin:: product berbayar -->
                <div class="text-center mb-5">
                    <h2>{{ __('home.text_3') }}</h2>
                    <p>{{ __('home.text_4') }}</p>
                </div>
                @if (count($product_paid) > 0)
                <div class="row justify-content-center gy-4 mb-5">
                    @foreach ($product_paid as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <div class="card-img-container">
                                @if ($row->toPrice->diskon === 'y')
                                <span class="discount-badge">Diskon</span>
                                @endif
                                <img src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="{{ $row->judul }}" class="card-img-top">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $row->judul }}</h5>
                                <p class="card-text flex-grow-1">{{ strtoupper($row->toType->singkatan) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    @if ($row->toPrice->diskon === 'y')
                                    <div class="price-container d-flex align-items-center">
                                        <del class="original-price">{{ rupiah($row->toPrice->nilai_normal) }}</del>
                                        <span class="price">{{ rupiah($row->toPrice->nilai_diskon) }}</span>
                                    </div>
                                    @else
                                    <span class="price">{{ rupiah($row->toPrice->nilai_normal) }}</span>
                                    @endif
                                    <a href="{{ route('products.detail', ['slug' => $row->toType->singkatan, 'id' => $row->id_product]) }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
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
                            <strong>{{ __('home.info') }}</strong>
                            <hr class="message-inner-separator">
                            <p>{{ __('home.text_5') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <!-- end:: product berbayar -->

                <!-- begin:: product gratis -->
                <div class="text-center mb-5">
                    <h2>{{ __('home.text_6') }}</h2>
                    <p>{{ __('home.text_7') }}</p>
                </div>
                @if (count($product_free) > 0)
                <div class="row justify-content-center gy-4 mb-5">
                    @foreach ($product_free as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <div class="card-img-container">
                                @if ($row->toPrice->diskon === 'y')
                                <span class="discount-badge">Diskon</span>
                                @endif
                                <img src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="{{ $row->judul }}" class="card-img-top">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $row->judul }}</h5>
                                <p class="card-text flex-grow-1">{{ strtoupper($row->toType->singkatan) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    @if ($row->toPrice->diskon === 'y')
                                    <div class="price-container d-flex align-items-center">
                                        <del class="original-price">{{ rupiah($row->toPrice->nilai_normal) }}</del>
                                        <span class="price">{{ rupiah($row->toPrice->nilai_diskon) }}</span>
                                    </div>
                                    @else
                                    <span class="price">{{ rupiah($row->toPrice->nilai_normal) }}</span>
                                    @endif
                                    <a href="{{ route('products.detail', ['slug' => $row->toType->singkatan, 'id' => $row->id_product]) }}" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
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
                            <strong>{{ __('home.info') }}</strong>
                            <hr class="message-inner-separator">
                            <p>{{ __('home.text_5') }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- end:: product gratis -->
        </section>
        <!-- end:: produk -->

        <!-- begin:: testimoni -->
        <section id="testimoni" class="section-bg">
            <div class="container">
                <div class="text-center mb-5">
                    <h2>{{ __('home.text_9') }}</h2>
                    <p>
                        {{ __('home.text_10') }}
                    </p>
                </div>
                @if (count($testimony) > 0)
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($testimony as $row)
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $loop->index + 1 }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($testimony as $row)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="testimonial-item">
                                <img src="https://i.pravatar.cc/150?img={{ $loop->index }}" alt="Klien {{ $loop->index }}">
                                <p><i class="bi bi-quote pe-2"></i>{{ $row->message }}</p>
                                <h5>{{ $row->first_name }} {{ $row->last_name }}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @else
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="alert alert-info">
                            <strong>{{ __('home.info') }}</strong>
                            <hr class="message-inner-separator">
                            <p>{{ __('home.text_11') }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- end:: testimoni -->
    </main>

    <!-- begin:: js local -->
    @push('js')
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
    @endpush
    <!-- end:: js local -->
</x-pages-layout>