<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{{ config('core_game.application-name') }}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        @if(getenv('FACEBOOK_APP_ID') != "null")
        <meta property="fb:app_id"      content="{{ env('FACEBOOK_APP_ID') }}" />
        <meta property="og:url"         content="" />
        <meta property="og:type"        content="website" />
        <meta property="og:title"       content="{{{ config('core_game.application-name') }}}" />
        <meta property="og:description" content="" />
        <meta property="og:image"       content="" />
        @endif
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />

         <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />

        <!-- Style -->
        <link href="{{ asset('front/css/style'.(getenv('APP_ENV') == "production" ? ".min" : "").'.css', config('core_game.SSL_ENABLED')) }}" media="all" rel="stylesheet" type="text/css" />

        <!-- Mobile Style -->
        <link href="{{ asset('front/css/style-mobile'.(getenv('APP_ENV') == "production" ? ".min" : "").'.css', config('core_game.SSL_ENABLED')) }}" media="all" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('extend-css')

        @if(getenv('GOOGLE_CODE') != "null")
        <!-- Google Analytics -->
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', {{{getenv('GOOGLE_CODE')}}}, 'auto');
        ga('send', 'pageview');</script>
        <!-- End Google Analytics -->
        @endif
    </head>
    <body>
        @yield('body')

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>

        @yield('extend-scripts')

        @if(getenv('FACEBOOK_APP_ID') != "null")
        <script src="{{ asset('front/js/fb'.(getenv('APP_ENV') == "production" ? ".min" : "").'.js', config('core_game.SSL_ENABLED')) }}"></script>
        @endif

        <script src="{{ asset('front/js/main'.(getenv('APP_ENV') == "production" ? ".min" : "").'.js', config('core_game.SSL_ENABLED')) }}"></script>
    </body>
</html>