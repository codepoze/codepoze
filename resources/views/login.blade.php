<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <title>Selamat Datang | {{ $title }}</title>

    <!-- begin:: icon -->
    <link rel="apple-touch-icon" href="{{ asset_admin('images/icon/apple-touch-icon.png') }}" sizes="180x180" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon-32x32.png') }}" type="image/x-icon" sizes="32x32" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon-16x16.png') }}" type="image/x-icon" sizes="16x16" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon.ico') }}" type="image/x-icon" />
    <!-- end:: icon -->

    <!-- begin:: css global -->
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('css/icons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('css/app.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset_admin('css/custom.min.css') }}">
    <!-- end:: css global -->
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <!-- begin:: form login -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5>Login!</h5>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('auth.check') }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control" name="password" id="Password" placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: form login -->
        <!-- begin:: footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">
                                <em>&copy; 2017 - <script type="text/javascript">
                                        var thunskrg = new Date().getFullYear();
                                        document.write("- " + thunskrg);
                                    </script>. Developed with <span style="color: #e25555;">&#9829;</span> by <a href="https://alanlengkoan.com">alanlengkoan</a></em>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end:: footer -->
    </div>

    <!-- begin:: jd global -->
    <script src="{{ asset_admin('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset_admin('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset_admin('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset_admin('libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset_admin('libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset_admin('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset_admin('js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset_admin('libs/particles.js/particles.js') }}"></script>
    <script src="{{ asset_admin('js/pages/particles.app.js') }}"></script>
    <!-- end:: jd global -->

</body>

</html>