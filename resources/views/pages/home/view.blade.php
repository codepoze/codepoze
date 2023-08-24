<!-- begin:: base -->
@extends('pages/base')
<!-- end:: base -->

<!-- begin:: css local -->
@section('css')
@endsection
<!-- end:: css local -->

<!-- begin:: content -->
@section('content')
<header class="py-4 intro section-shaped bg-dark">
    <div class="page-header">
        <div id="particles-js"></div>
        <div class="container text-center text-white">
            <h1 class="display-4 fw-bolder">Welcome to CodePoze</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- begin:: product berbayar -->
<section class="py-4">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xl-12 text-center">
                <h3 class="mb-4">Product Paid</h3>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                    numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
                    quisquam eum porro a pariatur veniam.
                </p>
            </div>
        </div>

        @if (count($product_paid) > 0)
        <div class="row justify-content-center">
            @foreach ($product_paid as $row)
            <div class="col-md-12 col-lg-3 col-xl-3 mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="..." />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $row->judul }}</h5>
                            {{ rupiah($row->toPrice->nilai_normal) }}
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('products.detail', ['slug' => $row->toType->singkatan, 'id' => $row->id_product]) }}">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                <a class="btn btn-outline-primary mt-auto" href="{{ route('products', 'type='.$row->toPrice->jenis) }}">Lihat Semua</a>
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
<section class="py-4">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xl-12 text-center">
                <h3 class="mb-4">Product Free</h3>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                    numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
                    quisquam eum porro a pariatur veniam.
                </p>
            </div>
        </div>

        @if (count($product_free) > 0)
        <div class="row justify-content-center">
            @foreach ($product_free as $row)
            <div class="col-md-12 col-lg-3 col-xl-3 mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="..." />
                    <div class="card-body">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $row->judul }}</h5>
                            {{ rupiah($row->toPrice->nilai_normal) }}
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('products.detail', ['slug' => $row->toType->singkatan, 'id' => $row->id_product]) }}">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-md-12 col-lg-12 col-xl-12 text-center">
                <a class="btn btn-outline-primary mt-auto" href="{{ route('products', 'type='.$row->toPrice->jenis) }}">Lihat Semua</a>
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
<section class="py-4">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xl-12 text-center">
                <h3 class="mb-4">Testimonials</h3>
                <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                    numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
                    quisquam eum porro a pariatur veniam.
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
@endsection
<!-- end:: js local -->