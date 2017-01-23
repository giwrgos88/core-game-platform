<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Laravel Game Platform Admin Package">
        <meta name="author" content="George Panayi">
        <meta name="keyword" content="Laravel Game Platform Admin Package, Package, Admin, Laravel">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>@yield('title') | {{{ config('core_game.application-name') }}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />

        <link href="//cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" media="all" rel="stylesheet" type="text/css" />

        <!-- Main styles for this application -->
        <link href="{{ asset('backend/css/style'.(getenv('APP_ENV') == "production" ? ".min" : "").'.css', config('core_game.SSL_ENABLED')) }}" media="all" rel="stylesheet" type="text/css" />

        @yield('extend-css')
    </head>
    <body class="navbar-fixed sidebar-nav fixed-nav">
        @include('core::backend.partials.navbar')
        @include('core::backend.partials.sidebar')
        <!-- Main content -->
        <main class="main">
            @yield('body')
        </main>

        <footer class="footer">
            <span class="float-xs-right">© 2017 - Developed by <a href="https://gpanayi.com">George Panayi</a></span>
        </footer>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="{{ asset('backend/js/app'.(getenv('APP_ENV') == "production" ? ".min" : "").'.js', config('core_game.SSL_ENABLED')) }}"></script>
        @yield('extend-scripts')
    </body>
</html>