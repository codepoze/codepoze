<footer class="py-5 bg-dark my-foot">
    <div class="container px-4 px-lg-5">
        <ul class="list-inline nav justify-content-center border-bottom pb-3 mb-3 links">
            <li class="list-inline-item">
                <a class="fw-bold" href="{{ route('home') }}">{{ __('menu.home') }}</a>
            </li>
            <li class="footer-menu-divider list-inline-item">&sdot;</li>
            <li class="list-inline-item">
                <a class="fw-bold" href="{{ route('about') }}">{{ __('menu.about') }}</a>
            </li>
            <li class="footer-menu-divider list-inline-item">&sdot;</li>
            <li class="list-inline-item">
                <a class="fw-bold" href="{{ route('contact') }}">{{ __('menu.contact') }}</a>
            </li>
            <li class="footer-menu-divider list-inline-item">&sdot;</li>
            <li class="list-inline-item">
                <a class="fw-bold" href="{{ route('sop') }}">{{ __('menu.sop') }}</a>
            </li>
        </ul>

        @if (count($social_media) > 0)
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6 col-lg-6 d-flex justify-content-center py-2">
                <p class="copyright my-auto"></p>
            </div>
            <div class="col-12 col-sm-12 col-lg-6 col-lg-6 d-flex justify-content-center py-2">
                <ul class="nav d-flex justify-content-end list-unstyled links">
                    @foreach ($social_media as $row)
                    <li class="ms-3">
                        <a href="{{ $row->link }}">
                            <i class="fa {{ $row->icon }} display-6"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @else
        <div class="d-flex justify-content-center py-2">
            <p class="copyright my-auto"></p>
        </div>
        @endif
    </div>
</footer>