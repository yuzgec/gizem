@extends('frontend.layout.app')
@section('content')

<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" 
style="background-image: url(img/page-header/page-header-about-us.jpg);">
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="text-9 font-weight-bold">{{ __('site.referanslar')}}</h1>
            <span class="sub-title">{{ config('settings.siteTitle')}}</span>
        </div>
        <div class="col-md-12 align-self-center order-1">
            <ul class="breadcrumb breadcrumb-light d-block text-center">
                <li><a href="{{ route('home')}}">{{ __('site.anasayfa')}}</a></li>
                <li class="active">{{ __('site.referanslar')}}</li>
            </ul>
        </div>
    </div>
</div>
</section>

<div class="container">
    <div class="row">
      
            @foreach ($Reference->getMedia('gallery') as $item)
                <div class="col-md-4 mb-3">
                    <span class="img-thumbnail d-block">
                        <img class="img-fluid" src="{{ $item->getUrl() }}" alt="İomer Atık Yönetimi">
                    </span>
                </div>
            @endforeach

            <div class="mb-4 mt-4">    
                {!! $Reference->desc !!}
            </div>   

    </div>

</div>
@endsection