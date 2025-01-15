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
    <style>
        .fixed-bottom-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            padding: 12px 0;
            box-shadow: 0 -4px 20px rgba(0,0,0,0.08);
            z-index: 1000;
        }
        
        .fixed-bottom-bar .contact-item {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #444;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 8px;
            border-radius: 8px;
        }
        
        /* WhatsApp için yeşil tema */
        .fixed-bottom-bar .whatsapp-item {
            background: #e8f5e9;
            color: #1db440;
        }
        .fixed-bottom-bar .whatsapp-item:hover {
            background: #1db440;
            color: #fff;
        }
        
        /* Instagram için gradient tema */
        .fixed-bottom-bar .instagram-item {
            background: linear-gradient(45deg, #f9e4f0, #ffe8cc);
            color: #e1306c;
        }
        .fixed-bottom-bar .instagram-item:hover {
            background: linear-gradient(45deg, #f56040, #e1306c);
            color: #fff;
        }
        
        /* Telefon için mavi tema */
        .fixed-bottom-bar .phone-item {
            background: #e3f2fd;
            color: #1976d2;
        }
        .fixed-bottom-bar .phone-item:hover {
            background: #1976d2;
            color: #fff;
        }
        
        .fixed-bottom-bar .contact-item i {
            font-size: 20px;
            margin-right: 8px;
        }
        
        .fixed-bottom-bar .contact-item span {
            font-size: 14px;
        }
        
        body {
            padding-bottom: 80px;
        }
        
        @media (max-width: 768px) {
            .fixed-bottom-bar .location-text {
                display: none;
            }
            .fixed-bottom-bar .contact-item {
                padding: 6px;
            }
            .fixed-bottom-bar .contact-item i {
                font-size: 18px;
                margin-right: 4px;
            }
            .fixed-bottom-bar .contact-item span {
                font-size: 12px;
            }
        }
    </style>
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

    <!-- Sabit Alt Bar -->
    <div class="fixed-bottom-bar">
        <div class="container">
            <div class="row align-items-center g-2">
                <div class="col-4 text-center">
                    <a title="WhatsApp" href="https://wa.me/{{config('settings.whatsapp')}}" class="contact-item whatsapp-item">
                        <i class="fab fa-whatsapp"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>
                <div class="col-4 text-center">
                    <a title="İnstagram" href="https://www.instagram.com/{{config('settings.instagram')}}" class="contact-item instagram-item" target="_blank">
                        <i class="fab fa-instagram"></i>
                        <span>{{config('settings.instagram')}}</span>
                    </a>
                </div>
                <div class="col-4 text-center">
                    <a title="Telefon" href="tel:{{config('settings.telefon1')}}" class="contact-item phone-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>{{config('settings.telefon1')}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layout.footer')
    @include('frontend.layout.js')
    @yield('customJS')




</body>
</html>
