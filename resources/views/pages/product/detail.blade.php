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
                <h3>{{ $title }}</h4>
                    <div class="fs-6">
                        <nav aria-label="breadcrumb">
                            {{ Breadcrumbs::render(Route::currentRouteName(), $type, $product) }}
                        </nav>
                    </div>
            </div>
        </div>
        <!-- end:: breadcrumb -->

        <!-- begin:: content -->
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-12 col-lg-8 col-xl-8">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1">{{ $product->judul }}</h1>
                        <div class="text-muted fst-italic mb-2">Posted on {{ tgl_indo($product->created_at) }} by Admin</div>
                        @foreach ($product->toProductStack as $row)
                        <span class="badge bg-secondary mx-1">{{ $row->toStack->nama }}</span>
                        @endforeach
                    </header>
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset_upload('picture/'.$product->gambar)  }}" alt="{{ $product->judul }}" /></figure>
                    <section class="mb-5">
                        {!! $product->deskripsi !!}
                    </section>
                    @if (count($product->toProductPicture) > 0)
                    <div class="row my-4">
                        @foreach ($product->toProductPicture as $row)
                        <div class="col-md-12 col-lg-6 col-xl-6 my-2">
                            <a href="{{ asset_upload('picture/'.$row->picture) }}">
                                <img class="img-fluid" src="{{ asset_upload('picture/'.$row->picture) }}" alt="{{ $row->judul }}" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="d-flex justify-content-center align-items-start">
                        @if ($product->link_demo !== null)
                        <a class="btn btn-primary mx-2" href="{{ $product->link_demo }}">Link Demo</a>
                        @endif
                        @if ($product->link_github !== null)
                        <a class="btn btn-primary mx-2" href="{{ $product->link_github }}">Link Github</a>
                        @endif
                    </div>
                </article>
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
        <!-- end:: content -->
    </div>
</section>
@endsection

<!-- begin:: js local -->
@section('js')
@endsection
<!-- end:: js local -->