<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <!-- begin:: font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- end:: font -->

    <!-- begin:: icon -->
    <link rel="apple-touch-icon" href="{{ asset_admin('images/icon/apple-touch-icon.png') }}" sizes="180x180" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon-32x32.png') }}" type="image/x-icon" sizes="32x32" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon-16x16.png') }}" type="image/x-icon" sizes="16x16" />
    <link rel="icon" href="{{ asset_admin('images/icon/favicon.ico') }}" type="image/x-icon" />
    <!-- end:: icon -->

    <!-- begin:: css global -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset_admin('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_admin('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset_pages('css/styles.css') }}" rel="stylesheet" type="text/css" />
    <!-- end:: css global -->

    <script type="text/javascript" src="{{ asset_admin('libs/jquery/jquery.min.js') }}"></script>

    <!-- begin:: google analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SYHV0TEJRX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SYHV0TEJRX');
    </script>
    <!-- end:: google analytics -->

    <!-- begin:: css local -->
    @stack('css')
    <!-- end:: css local -->
</head>

<body>
    <!-- begin:: navbar -->
    <x-pages-navbar />
    <!-- end:: navbar -->

    <!-- begin:: body -->
    {{ $slot }}
    <!-- end:: body -->

    <!-- begin:: footer -->
    <x-pages-footer />
    <!-- end:: footer -->

    <!-- begin:: js global -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset_admin('libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset_admin('my_assets/parsley/2.9.2/parsley.js') }}"></script>
    <script type="text/javascript" src="{{ asset_admin('my_assets/my_fun.js?t=12345') }}"></script>
    <script type="text/javascript" src="{{ asset_pages('js/scripts.js') }}"></script>
    <script type="text/javascript" src="https://popupsmart.com/freechat.js"></script>
    <script>
        window.start.init({
            title: "Hi there ✌️",
            message: "How may we help you? Just send us a message now to get assistance.",
            color: "#1C86FA",
            position: "right",
            placeholder: "Enter your message",
            withText: "Write with",
            viaWhatsapp: "Or write us directly via Whatsapp",
            gty: "Go to your",
            awu: "and write us",
            connect: "Connect now",
            button: "Write us",
            device: "everywhere",
            logo: "https://d2r80wdbkwti6l.cloudfront.net/1w6S12SqPOx2Groy9I6iu6ks4Nlc8gqS.jpg",
            person: "https://d2r80wdbkwti6l.cloudfront.net/MXOcnqypfGUMK1CPKO7dWcUhHjCWobQj.jpg",
            services: [{
                "name": "whatsapp",
                "content": "+6285242907595"
            }]
        })
    </script>
    <!-- end:: js global -->

    <!-- begin:: js local -->
    @stack('js')
    <!-- end:: js local -->
</body>

</html>