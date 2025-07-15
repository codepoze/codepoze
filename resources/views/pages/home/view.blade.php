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

        <section id="produk">
            <div class="container">
                <!-- begin:: product berbayar -->
                <div class="text-center mb-5">
                    <h2>{{ __('home.text_3') }}</h2>
                    <p>{{ __('home.text_4') }}</p>
                </div>
                <div class="row gy-4 mb-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <div class="card-img-container">
                                <span class="discount-badge">Diskon</span>
                                <img src="https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?q=80&w=2070&auto=format&fit=crop"
                                    class="card-img-top" alt="Produk Berbayar 1">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Aplikasi E-Commerce Lengkap</h5>
                                <p class="card-text flex-grow-1">Sistem toko online modern dengan manajemen produk,
                                    inventori, dan gateway pembayaran.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="price-container d-flex align-items-center">
                                        <del class="original-price">Rp
                                            2.000.000</del>
                                        <span class="price">Rp 1.500.000</span>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=2070&auto=format&fit=crop"
                                class="card-img-top" alt="Produk Berbayar 2">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Sistem Informasi Sekolah</h5>
                                <p class="card-text flex-grow-1">Aplikasi untuk manajemen data siswa, guru, jadwal
                                    pelajaran, dan nilai akademik.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price">Rp 1.200.000</span>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?q=80&w=1974&auto=format&fit=crop"
                                class="card-img-top" alt="Produk Berbayar 3">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Landing Page Builder</h5>
                                <p class="card-text flex-grow-1">Script PHP untuk membuat landing page dinamis tanpa
                                    perlu coding, lengkap dengan template.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price">Rp 750.000</span>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                        <a class="btn btn-primary mt-auto" href="#">Lihat Semua</a>
                    </div>
                </div>
                <!-- end:: product berbayar -->

                <!-- begin:: product gratis -->
                <div class="text-center mb-5">
                    <h2>{{ __('home.text_6') }}</h2>
                    <p>{{ __('home.text_7') }}</p>
                </div>
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop"
                                class="card-img-top" alt="Produk Gratis 1">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Template Portofolio Pribadi</h5>
                                <p class="card-text flex-grow-1">Template website portofolio sederhana menggunakan HTML,
                                    CSS, dan Bootstrap.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price">Gratis</span>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Unduh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1560415755-bd80d06eda60?q=80&w=1974&auto=format&fit=crop"
                                class="card-img-top" alt="Produk Gratis 2">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Sistem Login Sederhana (PHP)</h5>
                                <p class="card-text flex-grow-1">Source code sistem login dan registrasi dasar
                                    menggunakan PHP dan MySQLi.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price">Gratis</span>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Unduh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card product-card h-100">
                            <img src="https://images.unsplash.com/photo-1599696848783-0573934f2d93?q=80&w=2070&auto=format&fit=crop"
                                class="card-img-top" alt="Produk Gratis 3">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">Aplikasi Kalkulator (JavaScript)</h5>
                                <p class="card-text flex-grow-1">Aplikasi kalkulator fungsional yang dibangun dengan
                                    Vanilla JavaScript untuk latihan.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price">Gratis</span>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Unduh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                        <a class="btn btn-primary mt-auto" href="#">Lihat Semua</a>
                    </div>
                </div>
            </div>
            <!-- end:: product gratis -->
        </section>

        <section id="testimoni" class="section-bg">
            <div class="container">
                <div class="text-center mb-5">
                    <h2>{{ __('home.text_9') }}</h2>
                    <p>
                        {{ __('home.text_10') }}
                    </p>
                </div>
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial-item">
                                <img src="https://i.pravatar.cc/150?img=1" alt="Klien 1">
                                <p>"Pelayanannya sangat profesional dan cepat. Aplikasi
                                    yang dibuat sesuai dengan ekspektasi kami. Sangat direkomendasikan!"</p>
                                <h5>Andi Wijaya</h5>
                                <span>CEO, Startup Maju</span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-item">
                                <img src="https://i.pravatar.cc/150?img=2" alt="Klien 2">
                                <p>"Source code premiumnya sangat membantu mempercepat
                                    proyek kami. Kodenya bersih, mudah dimodifikasi, dan dokumentasinya jelas."</p>
                                <h5>Citra Lestari</h5>
                                <span>Lead Developer, Tech Corp</span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-item">
                                <img src="https://i.pravatar.cc/150?img=3" alt="Klien 3">
                                <p>"Tim support sangat responsif. Setiap ada kendala,
                                    mereka selalu siap membantu. Terima kasih KodeVortex!"</p>
                                <h5>Budi Santoso</h5>
                                <span>Project Manager, Digital Agency</span>
                            </div>
                        </div>
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
            </div>
        </section>
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