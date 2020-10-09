<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Агрегатор новин України - @yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="Агрегатор новин України">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{--    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_xs.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5e63d8c061.js" crossorigin="anonymous"></script>

</head>
<body style="background: white">

{{--@include('module.servises_top')--}}
@include('module.logo')
@include('module.menu')
@yield('body')
{{--@yield('body')--}}
{{--{#{% include 'modul/courses.html.twig' %}#}--}}
{{--{% include 'modul/menu.html.twig' %}--}}
{{--{% include 'modul/mobile_header.html.twig' %}--}}

{{--<div class="container-fluid">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-xl-9 col-lg-9 col-md-9 col-sm-12"></div>--}}
{{--            <div class="d-none col-xl-3 d-xl-block col-lg-3 d-lg-block col-md-3 d-md-block right_block-block">--}}
{{--                {% include 'modul/right_block.html.twig' %}--}}
{{--                {% block right_block %}{% endblock %}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@include('module.footer')
@include('module.copyright')

</body>
</html>
