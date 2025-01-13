@extends('frontend.layout.app') @section('content')
@include('frontend.layout.slider')

<div class="container" style="margin-top:75px">
    <div class="row">


        <div class="heading heading-border heading-middle-border heading-middle-border-center">
            <h2 class="font-weight-normal"> HİZMETLERİMİZ</strong></h2>
        </div>

        @foreach ($ServiceCategory as $item)
        <div class="col-md-4 mb-3">
            <a href="{{ route('categorydetail', $item->slug)}}" aria-label="">
                <span
                    class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
                    <span class="thumb-info-wrapper">
                        <img src="{{ $item->getFirstMediaUrl('page','thumb') }}"
                            class="img-fluid" alt="{{ $item->title}} - {{ config('settings.siteTitle')}}">
                        <span class="thumb-info-title">
                            <span class="thumb-info-slide-info-hover-1">
                                <span class="thumb-info-inner text-1 text-uppercase">{{ $item->title}}</span>
                            </span>
                            <span class="thumb-info-slide-info-hover-2">
                                <span class="thumb-info-type">Devamını Oku</span>
                            </span>
                        </span>
                    </span>
                </span>
            </a>
        </div>
        @endforeach

        <section class="call-to-action with-borders with-button-arrow mb-3 mt-3">
            <div class="col-sm-9 col-lg-9">
                <div class="call-to-action-content">
                    <h3>Kadıköy Matbaası - 
                        <strong class="font-weight-extra-bold">Fikirleriniz kağıtla hayat bulsun!</strong>
                    </h3>
                    <p class="mb-0">Müşteri fikirlerinin kaliteli baskıyla somutlaşacağını ve gerçeğe dönüşeceğini vurgular.</p>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="call-to-action-btn">
                    <a
                        href="{{ route('contactus')}}"
                        target="_blank"
                        class="btn btn-modern text-2 btn-secondary">İletişime Geç</a>
                    <span
                        class="arrow hlb d-none d-md-block appear-animation animated rotateInUpLeft appear-animation-visible"
                        data-appear-animation="rotateInUpLeft"
                        style="left: 100%; top: -32px; animation-delay: 100ms;"></span>
                </div>
            </div>
        </section>
        
        <section class="section bg-primary">
            <div class="container-fluid">
                <div class="row counters counters-text-light">
                    <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="counter">
                            <strong data-to="15" data-append="+">19</strong>
                            <label>Yıllık Tecrübe</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="counter">
                            <strong data-to="35" data-append="+">6</strong>
                            <label>Uzman Kadro</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4 mb-sm-0">
                        <div class="counter">
                            <strong data-to="100" data-append="+">500</strong>
                            <label>Tamamlanan Proje</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="counter">
                            <strong data-to="500" data-append="+">1000</strong>
                            <label>Mutlu Müşteri</label>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
</div>

<div class="container py-5 my-5">
    <div class="row justify-content-center pb-3 mb-4">
        <div class="col-lg-9 col-xl-8 text-center">
            <div class="overflow-hidden">
                <h2 class="font-weight-bold text-color-dark line-height-2 mb-0 " data-="maskUp" data--delay="250">SIKÇA SORULAN SORULAR</h2>
            </div>
            <div class="d-inline-block custom-divider divider divider-danger divider-small my-3">
                <hr class="my-0 " data-="customLineProgressAnim" data--delay="650">
            </div>
            <p class="font-weight-light text-3-5 mb-0 " data-="fadeInUpShorter" data--delay="500">
                Hizmetlerimiz, firmamız hakkında sıkça sorulan sorular
            </p>
        </div>
    </div>
    <div class="row row-gutter-sm">
        <div class="col mb-4 mb-lg-0">
            <div class="accordion accordion-modern-status accordion-modern-status-primary" id="accordion100">
                <div class="card card-default">
                    <div class="card-header" id="collapse100HeadingOne">
                        <h4 class="card-title m-0">
                            <a class="accordion-toggle text-white font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse100One" aria-expanded="false" aria-controls="collapse100One">
                                1 - Hangi baskı hizmetlerini sunuyorsunuz?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse100One" class="collapse" aria-labelledby="collapse100HeadingOne" data-bs-parent="#accordion100" style="">
                        <div class="card-body">
                            <p class="mb-0">
                                Gizem Matbaa olarak, dijital baskı, ofset baskı, promosyon baskıları, katalog ve broşür tasarımları, davetiye, antetli kağıt, zarf ve tabela imalatı gibi geniş bir hizmet yelpazesi sunuyoruz. Ayrıca özel kesim ve UV lak gibi özel baskı çözümleri de sağlıyoruz.
                            </p>
                         </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" id="collapse100HeadingTwo">
                        <h4 class="card-title m-0">
                            <a class="accordion-toggle text-white font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse100Two" aria-expanded="false" aria-controls="collapse100Two">
                                2 - Baskı teslimat süresi ne kadar?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse100Two" class="collapse" aria-labelledby="collapse100HeadingTwo" data-bs-parent="#accordion100" style="">
                        <div class="card-body">
                            <p class="mb-0">Teslimat süresi, siparişin boyutuna ve türüne bağlıdır. Örneğin:

                                Dijital baskılar: 1-2 iş günü.
                                Ofset baskılar: 3-7 iş günü.
                                Tabela ve özel baskı çözümleri: 7-10 iş günü.
                                Acil ihtiyaçlar için de hızlı üretim seçenekleri sunuyoruz.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" id="collapse100HeadingThree">
                        <h4 class="card-title m-0">
                            <a class="accordion-toggle text-white font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse100Three" aria-expanded="false" aria-controls="collapse100Three">
                                3 - Küçük adetli sipariş alıyor musunuz?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse100Three" class="collapse" aria-labelledby="collapse100HeadingThree" data-bs-parent="#accordion100">
                        <div class="card-body">
                            <p class="mb-0">Evet, özellikle dijital baskılar için küçük adetli siparişleri de kabul ediyoruz. 
                                Örneğin, davetiye, magnet veya kartvizit gibi az miktarda baskı ihtiyaçlarınızı ekonomik ve hızlı bir şekilde karşılıyoruz.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" id="collapse100HeadingFour">
                        <h4 class="card-title m-0">
                            <a class="accordion-toggle text-white font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse100Four" aria-expanded="false" aria-controls="collapse100Four">
                                4 - Baskı öncesi tasarım hizmeti sunuyor musunuz?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse100Four" class="collapse" aria-labelledby="collapse100HeadingFour" data-bs-parent="#accordion100">
                        <div class="card-body">
                            <p class="mb-0">Evet, profesyonel tasarım ekibimiz baskı öncesi ihtiyaçlarınıza uygun özgün tasarımlar hazırlayabilir. 
                                Logo tasarımı, kurumsal kimlik çalışmaları, broşür ve katalog tasarımları gibi hizmetlerimizle işinizi destekliyoruz.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card card-default">
                    <div class="card-header" id="collapse100HeadingFive">
                        <h4 class="card-title m-0">
                            <a class="accordion-toggle text-white font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#collapse100Five" aria-expanded="false" aria-controls="collapse100Five">
                                5 - Tabela ve büyük format baskılarında hangi malzemeleri kullanıyorsunuz?
                            </a>
                        </h4>
                    </div>
                    <div id="collapse100Five" class="collapse" aria-labelledby="collapse1HeadingFive" data-bs-parent="#accordion100">
                        <div class="card-body">
                            <p class="mb-0">Tabela ve büyük format baskılarımızda vinil, mesh, pleksi, kompozit, alüminyum gibi dayanıklı ve uzun ömürlü malzemeler kullanıyoruz. 
                                Ayrıca UV dayanımlı mürekkepler ile açık hava koşullarına uygun baskılar üretiyoruz.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4 col-lg-3 text-center text-md-left">
            <div class="" data-="fadeInUpShorter" data--delay="1000">
                <h3 class="font-weight-bold text-color-dark text-transform-none text-5-5 mb-3">Misyonumz</h3>
                <p class="pb-1 mb-2"></p>
                <a href="{{ route('corporatedetail', 'hakkimizda')}}" class="btn btn-danger  font-weight-bold btn-px-5 py-3 mb-2">HAKKIMIZDA</a>

                <hr class="my-4">
            </div>
            <div class="" data-="fadeInUpShorter" data--delay="1100">
                <h3 class="font-weight-bold text-color-dark text-transform-none text-5-5 pt-2 mb-3">Başka Sorunuz</h3>
                <p class="pb-1 mb-2">Farklı bir sorunuz varsa lütfen bizimle iletişime geçiniz.</p>
                <a href="{{ route('contactus')}}" class="btn btn-danger custom-btn-border-radius font-weight-bold btn-px-5 py-3">İLETİŞİME GEÇ</a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('customCSS')
   
@endsection

@section('customJS')
   
@endsection