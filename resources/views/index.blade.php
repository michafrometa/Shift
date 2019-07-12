<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="version" content="1.1.1">

    <title>Sistema de Gestion</title>

    <!-- Main styles for this application -->
    <link href="{{('css/app.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <script>

        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};

    </script>
</head>

<div id="app">
    <app></app>
</div>
<script src="{{('js/app.js')}}"></script>
</body>

</html>
