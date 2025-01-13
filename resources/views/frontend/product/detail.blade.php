@extends('frontend.layout.app')
@section('content')

<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" 
    style="background-image: url(img/page-header/page-header-about-us.jpg);">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="text-9 font-weight-bold">{{ $Detay->title}}</h1>
                <span class="sub-title">{{ config('settings.siteTitle')}}</span>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb breadcrumb-light d-block text-center">
                    <li><a href="#">{{__('site.anasayfa')}}</a></li>
                    <li class="active">{{ $Detay->title}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container my-5 pt-4 pb-5">
    <div class="row">
        <div class="col-lg-12 mb-5 mb-lg-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" style="animation-delay: 500ms;">
            <p class="text-3-5">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin. </p>
            <p class="pb-2 mb-4">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
            <img src="/frontend/img/demos/auto-services/generic/generic-square-8.jpg" class="img-fluid custom-border-radius-1 float-start me-4 mb-4" alt="">
            <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. Quisque eu neque augue. Aliquam egestas nunc at efficitur faucibus.</p>
            <p>Praesent mauris eros, tincidunt id enim sodales, rhoncus malesuada ligula. Vivamus quis purus nec sapien pellentesque imperdiet. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. </p>
            <img src="/frontend/img/demos/auto-services/generic/generic-square-9.jpg" class="img-fluid custom-border-radius-1 float-end ms-4 mb-4 mb-sm-0" alt="">
            <p class="mt-5 mt-md-0 mt-xl-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. </p>
            <ul class="list list-icons list-icons-style-2 list-icons-lg mb-4 mb-xl-5">
                <li class="font-weight-semibold text-color-dark">
                    <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i> 
                    Pellentesque ultricies nibh
                </li>
                <li class="font-weight-semibold text-color-dark">
                    <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i> 
                    Ultricies nibh pellen
                </li>
                <li class="font-weight-semibold text-color-dark">
                    <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i> 
                    Ultricies nibh pellen
                </li>
                <li class="font-weight-semibold text-color-dark">
                    <i class="fas fa-check text-color-dark border-color-grey-1 top-7 text-3"></i> 
                    Pellentesque ultricies nibh
                </li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. Quisque eu neque augue. Aliquam egestas nunc at efficitur faucibus. Praesent mauris eros, tincidunt id enim sodales, rhoncus malesuada ligula. Vivamus quis purus nec sapien pellentesque imperdiet. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin bibendum ultricies nunc, eu interdum enim convallis pretium. Quisque eu neque augue. Aliquam egestas nunc at efficitur faucibus. Praesent mauris eros, tincidunt id enim sodales, rhoncus malesuada ligula. Vivamus quis purus nec sapien pellentesque imperdiet. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. Nullam porttitor augue mi, sit amet luctus est tincidunt sed. Donec tempus bibendum ex, nec vehicula elit. </p>
        </div>
        
    </div>
</div>

@endsection