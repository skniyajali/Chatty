<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
        <title>Chatty - Realtime Chat Application</title>

        <!-- Template core CSS -->
        
        <link href="{{ asset('css/template.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/template.dark.min.css') }}" rel="stylesheet" media="(prefers-color-scheme: dark)">
        
        
        
    </head>
    <!-- Head -->

    <body>

        <div class="layout">

            <div class="container d-flex flex-column">
                Dashboard
            </div>

        </div><!-- .layout -->

        <!-- Scripts -->
        <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/plugins/plugins.bundle.js') }}"></script>
        <script src="{{ asset('js/template.js') }}"></script>
        <!-- Scripts -->

    </body>
</html>