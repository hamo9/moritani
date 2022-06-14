<!DOCTYPE html>
@if (App::getLocale() == 'fr')

    <html lang="en" prefix="og: https://ogp.me/ns#">
@else
    <html lang="ar" dir="rtl" prefix="og: https://ogp.me/ns#">
@endif


<head>
    <base href="/public">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    @yield('meta')

    <title>
        تيرس اينفو
        |
        @yield('title')
    </title>
    <!-- Favicon-->
    <link href="{{ asset('assets/frontEnd/img/logo.png') }}" rel="icon">
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="assets/frontEnd/css/myStyle.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    @if (App::getLocale() == 'fr')
        <link href="assets/frontEnd/css/styles.css" rel="stylesheet" />
        @else
        <link href="assets/frontEnd/css/bootstrap_rtl.css" rel="stylesheet" />
        <link href="assets/frontEnd/css/styles.css" rel="stylesheet" />
        <link href="assets/frontEnd/css/rtl.css" rel="stylesheet" />

    @endif


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,700;1,400&family=Cairo:wght@500&display=swap" rel="stylesheet">
<style>
    body{
      font-family: 'Amiri', serif !important;
      font-weight: 400
    }

    h1,h2,h3,h4 , h5, h6, .myTitle{
    font-family: 'Cairo', sans-serif !important;
    font-weight: 500 !important;
    }
</style>




</head>

 @yield('content')

