<!-- begin:: base -->
@extends('pages/base')
<!-- end:: base -->

<!-- begin:: css local -->
@section('css')
@endsection
<!-- end:: css local -->

<!-- begin:: content -->
@section('content')
<section class="py-4">
    <div class="container px-4 px-lg-5">
        <!-- begin:: breadcrumb -->
        <div class="mb-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h4>{{ $title }}</h4>
                <div class="fs-6">
                    <nav aria-label="breadcrumb">
                        {{ Breadcrumbs::render(Route::currentRouteName(), $type, $product) }}
                    </nav>
                </div>
            </div>
        </div>
        <!-- end:: breadcrumb -->

        <!-- begin:: content -->
        <!-- end:: content -->
    </div>
</section>
@endsection

<!-- begin:: js local -->
@section('js')
@endsection
<!-- end:: js local -->