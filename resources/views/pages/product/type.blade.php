<!-- begin:: base -->
@extends('pages/base')
<!-- end:: base -->

<!-- begin:: css local -->
@section('css')
@endsection
<!-- end:: css local -->

<!-- begin:: content -->
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5">
        <!-- begin:: breadcrumb -->
        <div class="mb-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h4>{{ $title }}</h4>
                <div class="fs-6">
                    <nav aria-label="breadcrumb">
                        {{ Breadcrumbs::render(Route::currentRouteName(), $type) }}
                    </nav>
                </div>
            </div>
        </div>
        <!-- end:: breadcrumb -->

        <!-- begin:: content -->
        <div class="gx-4 gx-lg-5">
            <div class="row">
                @foreach ($product as $row)
                <div class="col-lg-4 mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="{{ $row->judul }}" />
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