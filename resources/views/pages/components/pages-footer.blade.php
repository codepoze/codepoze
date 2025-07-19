<footer id="footer">
    <div class="container py-4">
        <div class="row gy-4">

            <div class="col-lg-5 col-md-12 footer-info">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-3 text-white text-decoration-none">
                    <h1 class="logo-text">
                        CodePoze
                    </h1>
                </a>
                <p>{{ __('home.subtitle') }}</p>
                <div class="social-links d-flex mt-4">
                    @foreach ($social_media as $row)
                    <a href="{{ $row->link }}" target="_blank">
                        <i class="bi {{ $row->icon }}"></i>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3 col-6 footer-links">
                <h4>{{ __('menu.useful_links') }}</h4>
                <ul>
                    <li>
                        <i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}">{{ __('menu.home') }}</a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">{{ __('menu.about') }}</a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i> <a href="{{ route('contact') }}">{{ __('menu.contact') }}</a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i> <a href="{{ route('sop') }}">{{ __('menu.sop') }}</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-contact">
                <h4>{{ __('menu.contact') }}</h4>
                <p>
                    <strong>Phone:</strong> +62 852 4290 7595<br>
                    <strong>Email:</strong> codepoze@gmail.com<br>
                </p>
            </div>

        </div>
    </div>

    <div class="container mt-4">
        <div class="copyright">
        </div>
    </div>
</footer>