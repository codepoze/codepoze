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
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <!-- begin:: breadcrumb -->
        <div class="mb-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3>{{ $title }}</h4>
                    <div class="fs-6">
                        <nav aria-label="breadcrumb">
                            {{ Breadcrumbs::render(Route::currentRouteName()) }}
                        </nav>
                    </div>
            </div>
        </div>
        <!-- end:: breadcrumb -->

        <!-- begin:: content -->
        <div class="gx-4 gx-lg-5">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <form action="{{ route('products') }}" method="get">
                        <div class="input-group">
                            <input class="form-control" type="text" name="q" id="q" placeholder="Masukkan nama sistem...">
                            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                        </div>
                    </form>
                </div>
                @if (count($product) > 0)
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-xl-8">
                        <div class="row">
                            @foreach ($product as $row)
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
                            {{ $product->onEachSide(0)->links('partials.custom') }}
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="mb-4">
                            <h4 class="blockquote-footer fs-4">Categories</h4>
                            <ol class="list-group list-group-numbered">
                                @foreach ($products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">
                                            <a href="{{ route('products.type', $product->singkatan) }}">{{ $product->nama }}</a>
                                        </div>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">{{ $product->jumlah }}</span>
                                </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
                @else
                @if (Request::get('q'))
                <div class="col-lg-12">
                    <div class="alert alert-warning">
                        <strong>Info Message</strong>
                        <hr class="message-inner-separator">
                        <p>Maaf, produk yang Anda cari dengan kata kunci <strong>{{ Request::get('q') }}</strong> tidak ditemukan.</p>
                    </div>
                </div>
                @else
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <strong>Info Message</strong>
                        <hr class="message-inner-separator">
                        <p>Maaf, produk belum tersedia.</p>
                    </div>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
<!-- end:: content -->

<!-- begin:: js local -->
@section('js')
@endsection
<!-- end:: js local -->