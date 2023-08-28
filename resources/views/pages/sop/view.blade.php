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
            <div class="col-lg-12">
                <h4>Selamat Datang di CodePoze</h4>
                <p>
                    Sebelum memanfaatkan layanan dari CodePoze, harap teliti dalam membaca kebijakan layanan kami. Dengan memilih untuk menggunakan layanan kami, ini menandakan bahwa Anda telah memahami dan menyetujui kebijakan kami seperti yang dijelaskan di bawah ini.
                </p>

                <ol type="1">
                    <li>
                        <h5>Kebijakan Unduh Aplikasi Gratis</h5>
                        <ul>
                            <li>
                                Perangkat lunak/aplikasi dapat diunduh secara gratis melalui tautan yang telah disediakan.
                            </li>
                            <li>
                                Kami tidak lagi bertanggung jawab atas perangkat lunak/aplikasi yang telah diunduh dan diperoleh.
                            </li>
                            <li>
                                Tidak ada jaminan atau layanan dukungan yang diberikan untuk perangkat lunak/aplikasi yang diunduh secara gratis.
                            </li>
                            <li>
                                Pembaruan perangkat lunak/aplikasi akan dilakukan, namun perubahan tidak akan diumumkan secara individu.
                            </li>
                            <li>
                                Layanan dukungan, perbaikan, dan penambahan fitur berdasarkan permintaan pada aplikasi yang diunduh dan diperoleh secara gratis akan dikenakan biaya tambahan.
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h5>Kebijakan Pembelian Aplikasi</h5>
                        <ul>
                            <li>
                                Setelah dibeli, perangkat lunak/aplikasi tidak dapat dikembalikan.
                            </li>
                            <li>
                                Tidak ada jaminan atau layanan dukungan yang diberikan untuk perangkat lunak/aplikasi yang telah dibeli.
                            </li>
                            <li>
                                Pembelian perangkat lunak/aplikasi dengan penjualan masal menerapkan sistem jual putus.
                            </li>
                            <li>
                                Pembaruan perangkat lunak/aplikasi akan tetap dilakukan namun perubahan tidak akan diumumkan secara individu.
                            </li>
                            <li>
                                Layanan dukungan, perbaikan, dan penambahan fitur berdasarkan permintaan untuk aplikasi yang telah atau belum dibeli akan dikenakan biaya tambahan.
                            </li>
                        </ul>
                    </li>
                    <li>
                        <h5>Kebijakan Layanan Pengerjaan Aplikasi</h5>
                        <ul>
                            <li>
                                Untuk memulai proyek, Anda diharuskan membayar uang muka sebesar 50% dari total harga via transfer ke akun bank kami.
                            </li>
                            <li>
                                Pelunasan dilakukan setelah aplikasi rampung.
                            </li>
                            <li>
                                Kami mulai mengerjakan aplikasi setelah menerima pembayaran awal sesuai dengan presentase yang telah ditetapkan.
                            </li>
                            <li>
                                Dana yang sudah Anda transfer tidak dapat kami kembalikan jika Anda membatalkan proyek atas inisiatif Anda sendiri.
                            </li>
                            <li>
                                Estimasi waktu pengerjaan aplikasi berkisar antara 30 hari (untuk sistem standar) hingga 90 hari kerja (untuk sistem lebih kompleks), namun durasi ini dapat berubah tergantung pada kesulitan, perjanjian awal, dan ketersediaan data yang diperlukan.
                            </li>
                            <li>
                                Garansi dukungan teknis diberikan mulai dari 7 hari hingga periode sesuai kesepakatan, berlaku sejak aplikasi diserahkan.
                            </li>
                            <li>
                                Jika kami gagal menyelesaikan proyek sesuai jadwal yang disepakati, kami akan mengembalikan 100% dari dana yang Anda bayar dan menyampaikan apa yang telah kami kerjakan.
                            </li>
                            <li>
                                Layanan dukungan tersedia melalui WA dan email pada jam operasional kami (09.00 – 04.00 WIB).
                            </li>
                            <li>
                                Setiap ketidaksesuaian dalam interpretasi atau pelaksanaan kesepakatan akan dicari solusinya melalui diskusi hingga mencapai kesepakatan.
                            </li>
                            <li>
                                Klausula yang belum dicantumkan dalam kebijakan ini, jika diperlukan, akan ditambahkan nantinya berdasarkan kesepakatan bersama antara kami dan Anda.
                            </li>
                        </ul>
                    </li>
                </ol>

                <p>
                    Apabila pengguna melakukan pelanggaran terhadap kebijakan layanan, maka kami, selaku pemilik situs, memiliki hak untuk mengambil Langkah-langkah yang sesuai berdasarkan hukum yang ada di Negara Kesatuan Republik Indonesia.
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