<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
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
    @endpush
    <!-- end:: css local -->

    <section class="py-5">
        <div class="container">
            <!-- begin:: breadcrumb -->
            <div class="mb-3">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h3>{{ $title }}</h4>
                        <div class="fs-6">
                            <nav aria-label="breadcrumb">
                                @if ($type)
                                {{ Breadcrumbs::render(Route::currentRouteName(), $type) }}
                                @else
                                {{ Breadcrumbs::render(Route::currentRouteName()) }}
                                @endif
                            </nav>
                        </div>
                </div>
            </div>
            <!-- end:: breadcrumb -->

            <!-- begin:: content -->
            <div class="gx-4 gx-lg-5">
                <div class="row justify-content-center">
                    <div class="row">
                        <div class="col-md-12 col-lg-8 col-xl-8">
                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <form action="{{ route('products', $type->singkatan ?? null) }}" method="get">
                                        <div class="input-group">
                                            <input class="form-control rounded-start-pill" type="text" name="q" id="q" placeholder="{{ __('product.input_1') }}">
                                            <button class="btn btn-primary" id="button-search" type="submit">{{ __('product.button') }}</button>
                                        </div>
                                    </form>
                                </div>

                                @if (count($product) > 0)
                                @foreach ($product as $row)
                                <div class="col-md-12 col-lg-4 col-xl-4 mb-4">
                                    <div class="card">
                                        @if ($row->toPrice->diskon === 'y')
                                        <span class="discount-badge">Diskon</span>
                                        @endif
                                        <img class="card-img-top" src="{{ asset_upload('picture/'.$row->gambar)  }}" alt="{{ $row->judul }}" />
                                        <div class="card-body">
                                            <div class="text-center">
                                                <a href="{{ route('products.detail', ['slug' => $row->toType->singkatan, 'id' => $row->id_product]) }}">
                                                    <h5 class="fw-bolder">{{ $row->judul }}</h5>
                                                </a>
                                                @if ($row->toPrice->diskon === 'y')
                                                <s class="text-muted me-2 small align-middle">{{ rupiah($row->toPrice->nilai_normal) }}</s><br /><span class="align-middle">{{ rupiah($row->toPrice->nilai_diskon) }}</span>
                                                @else
                                                <span class="align-middle">{{ rupiah($row->toPrice->nilai_normal) }}</span>
                                                @endif
                                            </div>
                                            <div class="row g-2 mt-3">
                                                <div class="col-6 text-muted text-start fs-6">
                                                    {{ tgl_inggris($row->created_at) }}
                                                </div>
                                                <div class="col-6 text-end fs-6">
                                                    <a href="{{ route('products', $row->toType->singkatan) }}">{{ strtoupper($row->toType->singkatan) }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{ $product->onEachSide(0)->links('partials.custom') }}
                                @else
                                @if (Request::get('q'))
                                <div class="col-lg-12">
                                    <div class="alert alert-warning">
                                        <strong>{{ __('product.info') }}</strong>
                                        <hr class="message-inner-separator">
                                        <p>{{ __('product.text_1') }} <strong>{{ Request::get('q') }}</strong> {{ __('product.text_2') }}</p>
                                    </div>
                                </div>
                                @else
                                <div class="col-lg-12">
                                    <div class="alert alert-info">
                                        <strong>{{ __('product.info') }}</strong>
                                        <hr class="message-inner-separator">
                                        <p>{{ __('product.text_3') }}</p>
                                    </div>
                                </div>
                                @endif
                                @endif
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
                                                <a href="{{ route('products', $product->singkatan) }}">{{ $product->nama }}</a>
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
            </div>
        </div>
    </section>

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-pages-layout>