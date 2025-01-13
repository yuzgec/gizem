@extends('frontend.layout.app')
@section('content')

<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" 
    style="background-image: url({{ $Detay->getFirstMediaUrl('page','img') }});">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="text-9 font-weight-bold">{{ $Detay->title}}</h1>
                <span class="sub-title">{{ config('settings.siteTitle')}}</span>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb breadcrumb-light d-block text-center">
                    <li><a href="{{route('home')}}">{{__('site.anasayfa')}}</a></li>
                    <li class="active">{{ $Detay->title}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container my-5 pt-4 pb-5">
    <div class="row">
        @foreach ($Service->where('category', $Detay->id) as $item)
            <div class="col-lg-4 mb-3">
                <a href="{{ route('servicedetail', $item->slug)}}">
                    <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                        <span class="thumb-info-wrapper">
                            <img src="{{ $item->getFirstMediaUrl('page','thumb') }}" class="img-fluid" alt="{{ $item->title}} - {{ config('settings.siteTitle')}}">
                            <span class="thumb-info-title">
                                <span class="thumb-info-inner line-height-1">{{ $item->title}}</span>
                                <span class="thumb-info-type opacity-8">{{ config('settings.siteTitle')}}</span>
                            </span>
                        </span>
                    </span>
                </a>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col">
                {!! $Detay->desc !!}
        </div>
    </div>

</div>

@endsection
