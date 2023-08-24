<footer class="py-4 bg-light">
    <div class="container px-4 px-lg-5">
        <ul class="list-inline nav justify-content-center border-bottom pb-3 mb-3">
            <li class="list-inline-item">
                <a class="fw-bold" href="{{ route('home') }}">Home</a>
            </li>
            <li class="footer-menu-divider list-inline-item">&sdot;</li>
            <li class="list-inline-item">
                <a class="fw-bold" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="footer-menu-divider list-inline-item">&sdot;</li>
            <li class="list-inline-item">
                <a class="fw-bold" href="{{ route('contact') }}">Contact Us</a>
            </li>
            <li class="footer-menu-divider list-inline-item">&sdot;</li>
            <li class="list-inline-item">
                <a class="fw-bold" href="{{ route('sop') }}">Service Policy</a>
            </li>
        </ul>

        @if (count($social_media) > 0)
        <div class="d-flex justify-content-between align-items-center">
            <p class="copyright text-muted my-auto"></p>
            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                @foreach ($social_media as $row)
                <li class="ms-3">
                    <a href="{{ $row->link }}">
                        <i class="fa {{ $row->icon }} display-6 text-muted"></i>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @else
        <div class="d-flex justify-content-center">
            <p class="copyright text-muted my-auto"></p>
        </div>
        @endif
    </div>
</footer>