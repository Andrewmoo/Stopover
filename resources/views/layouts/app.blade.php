<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Stopover') }}</title>

    {{-- Scripts --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="/jquery-ui-1.12.1.custom/external/jquery/jquery.js" defer></script> --}}
    {{-- <script src="/jquery-ui-1.12.1.custom/jquery-ui.js" defer></script> --}}

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet"> --}}
</head>
<body class="primaryColor">
  @include('inc.navbar')
  <div class="container J-margin">
      @include('inc.messages')
      @yield('content')
  </div>
</body>
</html>
