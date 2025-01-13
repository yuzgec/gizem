@extends('frontend.layout.app')
@section('content')

<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" 
style="background-image: url(img/page-header/page-header-about-us.jpg);">
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="text-9 font-weight-bold">{{ __('site.belge')}}</h1>
            <span class="sub-title">{{ config('settings.siteTitle')}}</span>
        </div>
        <div class="col-md-12 align-self-center order-1">
            <ul class="breadcrumb breadcrumb-light d-block text-center">
                <li><a href="{{ route('home')}}">{{ __('site.anasayfa')}}</a></li>
                <li class="active">{{ __('site.belge')}}</li>
            </ul>
        </div>
    </div>
</div>
</section>

<div class="container">
    <div class="row">

        <div class="lightbox mb-4" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
            <div class="masonry row g-0" data-plugin-masonry="" data-plugin-options="{'itemSelector': '.masonry-item'}">
                @foreach ($Reference->getMedia('gallery') as $item)
                    <a class="masonry-item  no-default-style col-sm-3" href="{{ $item->getUrl('watermark') }}" title="İomer Atık Yönetimi">
                        <img class="img-fluid" src="{{ $item->getUrl('thumb') }}"  alt="İomer Atık Yönetimi">
                    </a>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection