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
     
    </div>
</div>

@endsection