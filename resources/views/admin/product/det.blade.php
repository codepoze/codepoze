<x-admin-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    @endpush
    <!-- end:: css local -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Judul</label>
                        <div class="col-md-9 my-auto">
                            <input type="text" class="form-control-plaintext" value="{{ $product->judul }}" readonly />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Type</label>
                        <div class="col-md-9 my-auto">
                            <input type="text" class="form-control-plaintext" value="{{ $product->toType->nama }}" readonly />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Based</label>
                        <div class="col-md-9 my-auto">
                            <input type="text" class="form-control-plaintext" value="{{ $product->toBased->nama }}" readonly />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Price</label>
                        <div class="col-md-9 my-auto">
                            <input type="text" class="form-control-plaintext" value="{{ ucfirst($product->toPrice->jenis) }} | {{ rupiah($product->toPrice->nilai_normal) }}" readonly />
                        </div>
                    </div>
                    @if ($product->toPrice->diskon === 'y')
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Price Diskon</label>
                        <div class="col-md-9 my-auto">
                            <input type="text" class="form-control-plaintext" value="{{ rupiah($product->toPrice->nilai_diskon) }}" readonly />
                        </div>
                    </div>
                    @endif
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-md-9 my-auto">
                            {!! $product->deskripsi !!}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Stacks</label>
                        <div class="col-md-9 my-auto">
                            <div class="row">
                                @foreach($product->toProductStack as $row)
                                <div class="col-lg-2 align-items-center text-center">
                                    <i class="devicon-{{ $row->toStack->icon }} colored" style="font-size: 35px;"></i>
                                    <br>
                                    {{ $row->toStack->nama }}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Link Demo</label>
                        <div class="col-md-9 my-auto">
                            <input type="text" class="form-control-plaintext" value="{{ $product->link_demo ?? '-' }}" readonly />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Link Github</label>
                        <div class="col-md-9 my-auto">
                            <input type="text" class="form-control-plaintext" value="{{ $product->link_github ?? '-' }}" readonly />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-md-9 my-auto">
                            <div class="row">
                                <div class="col-lg-3 pt-3 pb-3">
                                    <img src="{{ asset_upload('picture/'.$product->gambar) }}" alt="{{ $product->judul }}" class="img-fluid" width="300" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Gambar</label>
                        <div class="col-md-9 my-auto">
                            <div class="row">
                                @foreach($product->toProductPicture as $row)
                                <div class="col-lg-3 pt-3 pb-3">
                                    <img src="{{ asset_upload('picture/'.$row->picture) }}" alt="{{ $row->judul }}" class="img-fluid" width="300" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="hstack gap-2 justify-content-end">
                        <a href="{{ route('product.index') }}" id="back" class="btn btn-primary btn-sm">
                            <i class="fa fa-arrow-left"></i>&nbsp;Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-admin-layout>