<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link href="{{ asset('material-kit/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('material-kit/assets/css/demo.css') }}" rel="stylesheet">
        <link href="{{ asset('material-kit/assets/css/material-kit.css') }}" rel="stylesheet">
        <link href="{{ asset('material-kit/assets/assets-for-demo/vertical-nav.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app"></div>
        <script>
            var API_URL = "{{ url( '/api' )}}";
            var APP_URL = "{{ url('/') }}";
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('material-kit/assets/js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('material-kit/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('material-kit/assets/js/material.min.js') }}"></script>
        <script src="{{ asset('material-kit/assets/js/material-kit.js') }}" type="text/javascript"></script>
        <script src="{{ asset('material-kit/assets/js/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
    </body>
</html>
