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
                            {{ Breadcrumbs::render(Route::currentRouteName()) }}
                        </nav>
                    </div>
            </div>
        </div>
        <!-- end:: breadcrumb -->

        <!-- begin:: content -->
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-12 " style="text-align: justify;">
                <h4>{{ __('sop.text_1') }}</h4>
                <p>
                    {{ __('sop.text_2') }}
                </p>

                <ol type="1">
                    <li>
                        <h5>{{ __('sop.text_3') }}</h5>
                        <ul>
                            <li>
                                {{ __('sop.text_4') }}
                            </li>
                            <li>
                                {{ __('sop.text_5') }}
                            </li>
                            <li>
                                {{ __('sop.text_6') }}
                            </li>
                            <li>
                                {{ __('sop.text_7') }}
                            </li>
                            <li>
                                {{ __('sop.text_8') }}
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h5>{{ __('sop.text_9') }}</h5>
                        <ul>
                            <li>
                                {{ __('sop.text_10') }}
                            </li>
                            <li>
                                {{ __('sop.text_11') }}
                            </li>
                            <li>
                                {{ __('sop.text_12') }}
                            </li>
                            <li>
                                {{ __('sop.text_13') }}
                            </li>
                            <li>
                                {{ __('sop.text_14') }}
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h5>{{ __('sop.text_15') }}</h5>
                        <ul>
                            <li>
                                {{ __('sop.text_16') }}
                            </li>
                            <li>
                                {{ __('sop.text_17') }}
                            </li>
                            <li>
                                {{ __('sop.text_18') }}
                            </li>
                            <li>
                                {{ __('sop.text_19') }}
                            </li>
                            <li>
                                {{ __('sop.text_20') }}
                            </li>
                            <li>
                                {{ __('sop.text_21') }}
                            </li>
                            <li>
                                {{ __('sop.text_22') }}
                            </li>
                            <li>
                                {{ __('sop.text_23') }}
                            </li>
                            <li>
                                {{ __('sop.text_24') }}
                            </li>
                            <li>
                                {{ __('sop.text_25') }}
                            </li>
                        </ul>
                    </li>
                </ol>

                <p>
                    {{ __('sop.text_26') }}
                </p>
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