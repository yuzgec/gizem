<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get(__('site.iletisim_link'), [HomeController::class, 'contactus'])->name('contactus');
    Route::get(__('site.referans_link'), [HomeController::class, 'reference'])->name('reference');
    Route::get(__('site.galeri_link'), [HomeController::class, 'gallery'])->name('gallery');
    Route::get(__('site.blog_link'), [HomeController::class, 'blog'])->name('blog');
    Route::get(__('site.document'), [HomeController::class, 'document'])->name('document');

    Route::get(__('site.kurumsal_link').'/{url}', [HomeController::class, 'corporatedetail'])->name('corporatedetail');
    Route::get(__('site.hizmet_link').'/{url}', [HomeController::class, 'servicedetail'])->name('servicedetail');
    Route::get(__('site.kategori_link').'/{url}', [HomeController::class, 'categorydetail'])->name('categorydetail');
    Route::get(__('site.urun_link').'/{url}', [HomeController::class, 'productdetail'])->name('productdetail');
    Route::get(__('site.proje_link').'/{url}', [HomeController::class, 'projectdetail'])->name('projectdetail');
    Route::get(__('site.projeler_link'), [HomeController::class, 'project'])->name('project');
    Route::get('blog/{url}', [HomeController::class, 'blogdetail'])->name('blogdetail');

    Route::get('video', [HomeController::class, 'video'])->name('video');
    Route::get('foto', [HomeController::class, 'foto'])->name('foto');

});

Route::group(["prefix"=>"go", 'middleware' => ['auth','web', 'admin']],function() {
    Route::get('/', 'DashboardController@index')->name('go');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::auto('/page', PageController::class);
    Route::auto('/pagecategory', PageCategoryController::class);
    Route::auto('/product', ProductController::class);
    Route::auto('/productcategory', ProductCategoryController::class);
    Route::auto('/blog', BlogController::class);
    Route::auto('/blogcategory', BlogCategoryController::class);
    Route::auto('/service', ServiceController::class);
    Route::auto('/servicecategory', ServiceCategoryController::class);
    Route::auto('/slider', SliderController::class);
    Route::auto('/settings', SettingController::class);
    Route::auto('/reference', ReferenceController::class);
});

require __DIR__.'/auth.php';
