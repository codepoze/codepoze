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
                    CodePoze adalah sebuah situs media online yang telah beroperasi sejak tahun 2019 dan secara resmi didirikan pada tanggal 23 September 2022. Fokus kami adalah menyediakan source code program aplikasi baik yang gratis maupun berbayar. Selain itu, kami juga menawarkan layanan source code program aplikasi, serta jasa pembuatan dan pengembangan aplikasi yang bertujuan untuk memenuhi kebutuhan Anda di bidang teknologi dan informasi.
                </p>

                <h5>Visi</h5>
                <p>
                    Menjadi platform digital terdepan dalam penyediaan source code dan solusi aplikasi di bidang teknologi dan informasi.
                </p>

                <h5>Misi</h5>
                <ul>
                    <li>
                        Menyediakan source code berkualitas bagi komunitas pengembang.
                    </li>
                    <li>
                        Menawarkan jasa pembuatan dan pengembangan aplikasi yang inovatif dan sesuai kebutuhan pelanggan.
                    </li>
                    <li>
                        Mempromosikan pengetahuan dan inovasi di bidang teknologi dan informasi melalui layanan kami.
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