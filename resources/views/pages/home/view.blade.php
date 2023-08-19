<!-- begin:: base -->
@extends('pages/base')
<!-- end:: base -->

<!-- begin:: css local -->
@section('css')
@endsection
<!-- end:: css local -->

<!-- begin:: content -->
@section('content')
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Welcome to CodePoze</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach ($product as $row)
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $row->judul }}</h5>
                                    {{ rupiah($row->toPrice->nilai_normal) }}
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{ route('products.detail', ['slug' => $row->toType->singkatan, 'id' => $row->id_product]) }}">View options</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $product->onEachSide(0)->links('vendor.pagination.custom') }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-4">
                    <h4 class="blockquote-footer fs-4">Search</h4>
                    <form action="{{ route('products') }}" method="get">
                        <div class="input-group">
                            <input class="form-control" type="text" name="q" id="q" placeholder="Masukkan nama sistem...">
                            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                        </div>
                    </form>
                </div>
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
    </div>
</section>
@endsection
<!-- end:: content -->

<!-- begin:: js local -->
@section('js')
@endsection
<!-- end:: js local -->