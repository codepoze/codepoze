<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    <style>
        .modal a.close {
            right: 0;
            outline: 0;
        }

        #gallery-lightbox img:hover {
            opacity: 0.9;
            transition: 0.5s ease-out;
        }
    </style>
    @endpush
    <!-- end:: css local -->

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
                        <div class="row my-4" id="gallery-lightbox" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            @foreach ($product->toProductPicture as $key => $row)
                            <div class="col-md-12 col-lg-6 col-xl-6 my-2">
                                <a href="{{ asset_upload('picture/'.$row->picture) }}">
                                    <img class="img-fluid" src="{{ asset_upload('picture/'.$row->picture) }}" alt="{{ $key }}" data-bs-target="#carouselExample" data-bs-slide-to="{{ $key }}" />
                                </a>
                            </div>
                            @endforeach
                        </div>

                        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-modal="true">
                            <a href="#" class="close m-0 p-3 text-white position-absolute right-0" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content bg-transparent">
                                    <div class="modal-body p-0">
                                        <div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="false">
                                            <div class="carousel-inner">
                                                @foreach ($product->toProductPicture as $key => $row)
                                                @if ($key === 0)
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{ asset_upload('picture/'.$row->picture) }}" alt="{{ $key }}">
                                                </div>
                                                @else
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{ asset_upload('picture/'.$row->picture) }}" alt="{{ $key }}">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-pages-layout>