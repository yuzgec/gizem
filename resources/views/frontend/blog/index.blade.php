@extends('frontend.layout.app')
@section('content')
<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" 
style="background-image: url(img/page-header/page-header-about-us.jpg);">
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 align-self-center p-static order-2 text-center">
            <h1 class="text-9 font-weight-bold">  {{ __('site.blog')}}</h1>
            <span class="sub-title">{{ config('settings.siteTitle')}}</span>
        </div>
        <div class="col-md-12 align-self-center order-1">
            <ul class="breadcrumb breadcrumb-light d-block text-center">
                <li><a href="{{ route('home')}}">{{ __('site.anasayfa')}}</a></li>
                <li class="active">  {{ __('site.blog')}}</li>
            </ul>
        </div>
    </div>
</div>
</section>

<div class="container py-4">

    <div class="row">
        <div class="col">
            <div class="blog-posts">
                @foreach ($Blog as $item)
                    <div class="col-md-4">

                        <article class="post post-medium border-0 pb-0 mb-5">
                            <div class="post-image">
                                <a href="{{ route('blogdetail', $item->slug)}}">
                                    <img src="{{ (!$item->getFirstMediaUrl('page')) ? '/backend/resimyok.jpg': $item->getFirstMediaUrl('page','thumb')}}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                                </a>
                            </div>

                            <div class="post-content">
                                <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2">
                                    <a href="{{ route('blogdetail', $item->slug)}}">{{ $item->title}}</a>
                                </h2>
                            </div>
                        </article>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection