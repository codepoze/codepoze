<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <h1 class="logo-text">
                CodePoze
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
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
                            <a class="dropdown-item" href="{{ route('products') }}">{{ __('menu.all') }}</a>
                        </li>
                        @foreach ($type as $row)
                        <li>
                            <a class="dropdown-item" href="{{ route('products', $row->singkatan) }}">{{ $row->nama }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ (session()->has('locale') ? (session()->get('locale') !== 'id' ? route('lang', 'id') : route('lang', 'en')) : route('lang', 'en') ) }}" class="nav-link">
                        <img class="pb-1" src="{{ (session()->has('locale') ? (session()->get('locale') !== 'id' ? asset_pages('images/country/id.png') : asset_pages('images/country/en.png')) : asset_pages('images/country/en.png') ) }}" alt="{{ (session()->has('locale') ? (session()->get('locale') !== 'id' ? 'ID' : 'EN') : 'EN' ) }}">&nbsp;<span>{{ (session()->has('locale') ? (session()->get('locale') !== 'id' ? 'ID' : 'EN') : 'EN' ) }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>