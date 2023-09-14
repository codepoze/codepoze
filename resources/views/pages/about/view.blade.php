<x-pages-layout title="{{ $title }}">
    <!-- begin:: css local -->
    @push('css')
    @endpush
    <!-- end:: css local -->

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
                <div class="col-lg-4 my-2">
                    <img class="img-fluid rounded" src="{{ asset_pages('images/codepoze.png') }}" alt="CodePoze">
                </div>
                <div class="col-lg-8" style="text-align: justify;">
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

    <!-- begin:: js local -->
    @push('js')
    @endpush
    <!-- end:: js local -->
</x-pages-layout>