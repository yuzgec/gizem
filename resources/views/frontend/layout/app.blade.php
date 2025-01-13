<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    @include('frontend.layout.css')
    @yield('customCSS')
</head>

<body>
    {{-- <div class="progress progress-reading p-fixed top-0 w-100 left-0">
        <div class="progress-bar border-radius-0 bg-danger" role="progressbar" style="width: 0%"></div>
    </div> --}}

    <div class="body">
    
        @include('frontend.layout.header')
        
        <div role="main" class="main">

            @yield('content')

        </div>

    </div>

@include('frontend.layout.footer')
@include('frontend.layout.js')
@yield('customJS')




</body>
</html>
