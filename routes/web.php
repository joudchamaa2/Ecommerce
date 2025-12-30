<?php

use App\Http\Middleware\ChekIfAdmin;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

Route::get('/',[MainController::class,'index'])->name('home');
Route::get('/product/{product}/viewProduct',[MainController::class,'ViewProduct'])->name('viewProduct');
Route::get('/productsPage',[MainController::class,'productsPage'])->name('productsPage');
Route::get('/productsPage/{tag}',[MainController::class,'productsFilter'])->name('productsFilter');
Route::get('/productsPage/search',[MainController::class,'searchProduct'])->name('search');

Route::middleware('guest')->group(function(){
    Route::get('/register',[AuthController::class,'register'])->name('registerPage');
    Route::post('/register',[AuthController::class,'registerAction'])->name('registerAction');
    Route::get('/login',[AuthController::class,'login'])->name('loginPage');
    Route::post('/login',[AuthController::class,'loginAction'])->name('loginAction');
});
Route::middleware('auth')->group(function(){
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/ManageUser',[AdminController::class,'ManageUser'])->name('ManageUserPage');
    Route::post('/admin/ManageUser/{id}/roleToggle',[AdminController::class,'ManageUserAction'])->name('manageAction');
});
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin/home',[AdminController::class,'adminHome'])->name('adminPage')->middleware(ChekIfAdmin::class);
    Route::get('/admin/ManageUser',[AdminController::class,'ManageUser'])->name('ManageUserPage');
    Route::post('/admin/ManageUser/{id}/roleToggle',[AdminController::class,'ManageUserAction'])->name('manageAction');
    Route::post('/admin/ManageUser/{id}/delete',[AdminController::class,'delete'])->name('DeleteUser');
    Route::post('/admin/ManageUser/{users}/restore',[AdminController::class,'restore'])->name('restoreUser');
    Route::get('/admin/tags',[AdminController::class,'tags'])->name('tagsPage');
    Route::post('/admin/tags',[AdminController::class,'tagsAction'])->name('tagsAction');
    Route::get('/admin/editTags/{tag}/edit',[AdminController::class,'editTag'])->name('editTag');
    Route::post('/admin/editTags/{tag}/edit',[AdminController::class,'editagAction'])->name('editTagAction');
    Route::get('/admin/product',[AdminController::class,'product'])->name('productPage');
    Route::post('/admin/product',[AdminController::class,'productAction'])->name('productsAction');
    Route::post('/admin/product/{product}/delete',[AdminController::class,'deleteProduct'])->name('DeleteProduct');
    Route::post('/admin/product/{Rp}/Restore',[AdminController::class,'restoreProduct'])->name('RestoreProduct');
    Route::get('/admin/EditProduct/{edit}/edit',[AdminController::class,'edit'])->name('edit');
    Route::post('/admin/EditProduct/{edit}/edit',[AdminController::class,'editProduct'])->name('EditProduct');
    Route::get('/admin/carousel',[AdminController::class,'carousel'])->name('CarouselPage');
    Route::post('/admin/carousel',[AdminController::class,'carouselAction'])->name('CarouselAction');
    Route::post('/admin/product/{products}/add',[AdminController::class,'AddProductTag'])->name('addProductTag');
    Route::post('admin/product/{productss}/tag/{tagg}/remove',[AdminController::class,'removeProductTags'])->name('RemoveProductTags');
    Route::post('/admin/EditProduct/{product}/addImage',[AdminController::class,'AddImage'])->name('addImage');
    
});
