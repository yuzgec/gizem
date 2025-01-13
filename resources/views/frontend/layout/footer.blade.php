
<footer id="footer">
    <div class="container">
        <div class="row py-5 my-4">
            <div class="col-md-3 mb-4 mb-lg-0">
                <a href="{{ route('home')}}" class="logo pe-0 pe-lg-3">
                    <img alt="{{ __('site.firmaadi')}}" src="/gizem-logob.png" class="opacity-7 bottom-4" height="60">
                </a>

                </p>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="text-3 mb-3">İLETİŞİM BİLGİLERİ</h5>

                        <ul class="list list-icons list-icons-lg">
                            <li class="mb-1"><i class="far fa-dot-circle text-color-white"></i><p class="m-0">{{ config('settings.adres1')}}</p></li>
                            <li class="mb-1"><i class="fas fa-phone text-color-white"></i><p class="m-0"><a href="tel:{{ config('settings.telefon1')}}">{{ config('settings.telefon1')}}</a></p></li>
                            <li class="mb-1"><i class="fas fa-phone text-color-white"></i><p class="m-0"><a href="tel:{{ config('settings.telefon2')}}">{{ config('settings.telefon2')}}</a></p></li>
                            <li class="mb-1"><i class="far fa-envelope text-color-white"></i><p class="m-0"><a href="mailto:{{ config('settings.email1')}}">{{ config('settings.email1')}}</a></p></li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h5 class="text-3 mb-3">KURUMSAL</h5>

                        <ul class="list list-icons list-icons-sm">
                           
                                <li><i class="fas fa-angle-right text-color-white"></i>
                                    <a href="#" class="link-hover-style-1 ms-1">    
                                       Hakkımızda
                                    </a>
                                </li>
                                <li><i class="fas fa-angle-right text-color-white"></i>
                                    <a href="#" class="link-hover-style-1 ms-1">    
                                       Belgelerimiz
                                    </a>
                                </li>
                                <li><i class="fas fa-angle-right text-color-white   "></i>
                                    <a href="#" class="link-hover-style-1 ms-1">    
                                       Referanslar
                                    </a>
                                </li>
                                <li><i class="fas fa-angle-right text-color-white"></i>
                                    <a href="#" class="link-hover-style-1 ms-1">    
                                       Video Galeri
                                    </a>
                                </li>
                                <li><i class="fas fa-angle-right text-color-white"></i>
                                    <a href="#" class="link-hover-style-1 ms-1">    
                                       Foto Galeri
                                    </a>
                                </li>
                                <li><i class="fas fa-angle-right text-color-white"></i>
                                    <a href="#" class="link-hover-style-1 ms-1">    
                                       Blog
                                    </a>
                                </li>
                                <li><i class="fas fa-angle-right text-color-white"></i>
                                    <a href="#" class="link-hover-style-1 ms-1">    
                                       İletişim
                                    </a>
                                </li>
                          
                        </ul>
                    </div>

                    <div class="col-md-5">
                        <h5 class="text-3 mb-3">HİZMETLERİMİZ</h5>

                        <ul class="list list-icons list-icons-sm">
                            @foreach ($ServiceCategory as $item)
                                <li><i class="fas fa-angle-right text-color-white"></i>
                                    <a href="{{ route('categorydetail', $item->slug)}}" class="link-hover-style-1 ms-1">    
                                        {{ $item->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright footer-copyright-style-2">
        <div class="container py-2">
            <div class="row py-4">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <p class="text-white text-4">© Copyright - {{config('settings.siteName').' '. date('Y')}}. All Rights Reserved.</p>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <p class="text-white text-4"><a href="https://godijital.net" target="_blank" title="İzmir Web Tasarım ( GO Dijital)"> İzmir Web Tasarım ( GO Dijital)</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>