<nav class="navbar navbar-expand-lg navbar-dark fixed-top p-3 bg-dark my-nav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">CodePoze</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">{{ __('menu.about') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">{{ __('menu.contact') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sop') }}">{{ __('menu.sop') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('menu.product') }}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('products') }}">Semua</a>
                        </li>
                        @foreach ($products as $product)
                        <li>
                            <a class="dropdown-item" href="{{ route('products.type', $product->singkatan) }}">{{ $product->nama }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset_pages('images/country/id.png') }}" class="pb-1" alt="ID">&nbsp;<span>ID</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>