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
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                    </header>
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset_upload('picture/'.$product->gambar)  }}" alt="{{ $product->judul }}" /></figure>
                    <section class="mb-5">
                        <p class="fs-5 mb-4">Science is an enterprise that should be cherished as an activity of the free human mind. Because it transforms who we are, how we live, and it gives us an understanding of our place in the universe.</p>
                        <p class="fs-5 mb-4">The universe is large and old, and the ingredients for life as we know it are everywhere, so there's no reason to think that Earth would be unique in that regard. Whether of not the life became intelligent is a different question, and we'll see if we find that.</p>
                        <p class="fs-5 mb-4">If you get asteroids about a kilometer in size, those are large enough and carry enough energy into our system to disrupt transportation, communication, the food chains, and that can be a really bad day on Earth.</p>
                        <h2 class="fw-bolder mb-4 mt-5">I have odd cosmic thoughts every day</h2>
                        <p class="fs-5 mb-4">For me, the most fascinating interface is Twitter. I have odd cosmic thoughts every day and I realized I could hold them to myself or share them with people who might be interested.</p>
                        <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p>
                    </section>
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