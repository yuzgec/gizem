<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Pivot;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ServiceCategory;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{
    public function index(){
        SEOMeta::setCanonical(url()->full());
        $Hakkimizda = Page::where('id', '=',1)->first();
        return view('frontend.index', compact('Hakkimizda'));
    }

    public function categorydetail($url)
    {
        $Detay = ServiceCategory::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();

        $Product = Service::where('category',$Detay->id)->get();

        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.service.category', compact('Detay', 'Product'));
    }

    public function corporatedetail($url)
    {
        $Detay = Page::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();
        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.corporate.detail', compact('Detay'));
    }

    public function servicedetail($url)
    {
        $Detay = Service::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();
        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.service.detail', compact('Detay'));
    }


    public function project(){

        $Project = Service::where('category', 3 )->get();

        return view('frontend.project.index',compact('Project'));
    }

    public function productdetail($url)
    {
        $Detay = Product::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();


        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.product.index', compact('Detay'));
    }

    public function partdetail($url)
    {
        $Detay = Product::whereHas('translations', function ($query) use ($url) {
            $query->where('slug', $url);
        })->first();

        views($Detay)->cooldown(60)->record();
        SEOMeta::setTitle($Detay->title);
        SEOMeta::setCanonical(url()->full());
        return view('frontend.product.index', compact('Detay'));
    }

    public function gallery(){

        return view('frontend.gallery.index');
    }

    public function contactus(){

        SEOMeta::setTitle('İletişim');
        SEOMeta::setCanonical(url()->full());
        return view('frontend.corporate.contactus');

    }

    public function reference(){

        $Reference = Service::where('id', 13 )->first();
        return view('frontend.corporate.reference', compact('Reference'));
    }

    public function blog(){
        $Blog = Blog::all();
        return view('frontend.blog.index',compact('Blog'));
    }

    public function video(){
        return view('frontend.gallery.video');
    }

    public function foto(){
        return view('frontend.gallery.foto');
    }

    public function blogdetail($slug){

        $Detay = Blog::whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->first();

        return view('frontend.blog.detail',compact('Detay'));
    }
    
    public function document(){

        $Reference = Page::where('id', 6 )->first();
        return view('frontend.corporate.document', compact('Reference'));
    }

}
