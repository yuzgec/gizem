@extends('frontend.layout.app')
@section('content')

<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" 
    style="background-image: url({{ (!$Detay->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg': $Detay->getFirstMediaUrl('page','img')}});">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="text-9 font-weight-bold">{{ $Detay->title}}</h1>
                <span class="sub-title">{{ config('settings.siteTitle')}}</span>
            </div>
            <div class="col-md-12 align-self-center order-1">
                <ul class="breadcrumb breadcrumb-light d-block text-center">
                    <li><a href="{{ route('home')}}">{{ __('site.anasayfa')}}</a></li>
                    <li><a href="{{ route('categorydetail', $Detay->getCategory->slug)}}">{{ $Detay->getCategory->title}}</a></li>
                    <li class="active">{{ $Detay->title}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container my-2  pb-5">
    <div class="row">
        <div class="col-lg-8 order-lg-2 mb-5 mb-lg-0 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" style="animation-delay: 500ms;">
            <div class="card box-shadow-1 custom-border-radius-1 mb-5">
                <div class="card-body z-index-1 ">
                    {{-- <img src="{{ $Detay->getFirstMediaUrl('page','img') }}" alt="{{ config('settings.siteTitle')}} - {{ $Detay->title}}" class="img-fluid mb-4"> --}}
                    <div class="mb-4">    
                        {!! $Detay->desc !!}
                    </div>
                    
                    <hr>
                 
                    <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}, 'mainClass': 'mfp-with-zoom', 'zoom': {'enabled': true, 'duration': 300}}">
                        <div class="row">
                            @foreach ($Detay->getMedia('gallery') as $item)
                            <div class="col-md-4 col-6 mb-3">
                                <a class="d-inline-block img-thumbnail img-thumbnail-no-borders img-thumbnail-hover-icon mb-1 me-1" href="{{ $item->getUrl() }}">
                                    <img class="img-fluid" src="{{ $item->getUrl() }}" alt="{{ $Detay->title.' -'.config('settings.siteTitle')}}">
                                </a>
                            </div>
                            @endforeach
                        
                        </div>
                    </div>

                </div>
            </div>
       </div>
        <div class="col-lg-4 order-lg-1 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" style="animation-delay: 250ms;">
            <div class="card box-shadow-1 custom-border-radius-1 mb-5">
                <div class="card-body z-index-1 py-4 my-3">
                    @foreach ($ServiceCategory->where('id', $Detay->category) as $item)
                    <h4 class="text-color-dark font-weight-bold text-4 mb-4">{{ $item->title}}</h4>
                    <ul class="custom-nav-list-effect-1 list list-unstyled mb-0">
                        @foreach ($Service->where('category', $item->id) as $item)
                        <li class="">
                            <a href="{{ route('servicedetail', $item->slug)}}" class="text-decoration-none text-black text-3-5" title="{{ $item->title}}">
                                <i class="fa fa-chevron-right" style="color:gray;font-size:14px"></i> {{ $item->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endforeach
                </div>
            </div>
           
        </div>
    </div>
</div>


@endsection