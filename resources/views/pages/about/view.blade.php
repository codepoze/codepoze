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
                <h3>{{ $title }}</h3>
                <div class="fs-6">
                    <nav aria-label="breadcrumb">
                        {{ Breadcrumbs::render(Route::currentRouteName()) }}
                    </nav>
                </div>
            </div>
        </div>
        <!-- end:: breadcrumb -->

        <!-- begin:: content -->
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-12">
                <p>
                    {{ __('about.text_1') }}
                </p>

                <h5>{{ __('about.text_2') }}</h5>
                <p>
                    {{ __('about.text_3') }}
                </p>

                <h5>{{ __('about.text_4') }}</h5>
                <ul>
                    <li>
                        {{ __('about.text_5') }}
                    </li>
                    <li>
                        {{ __('about.text_6') }}
                    </li>
                    <li>
                        {{ __('about.text_7') }}
                    </li>
                </ul>
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