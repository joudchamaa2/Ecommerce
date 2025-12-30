<?php

namespace App\Http\Controllers;

use App\Models\tags;
use App\Models\Carousel;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\products_images;

class MainController extends Controller
{
    function index(Carousel $carousel){
        $carousel= Carousel::all();
        $product = products::paginate(3);
        return view('main.home',compact('product','carousel'));
    }
    function ViewProduct(products $product)
{
    $tagId = $product->tags()->pluck('tags_id');
    $similarProduct = products::WhereHas('tags',function($query) use ($tagId){
        $query->WhereIn('tags_id',$tagId);
    })->where('id','!=',$product->id)->limit(6)->get();
    return view('main.product', compact('product','similarProduct'));
}
function productsPage(){
    $products = products::all();
    $tags = tags::all();
    return view('main.productsPage',compact('products','tags'));
}
function productsFilter(tags $tag){
    $products = $tag->products;
    $tags = tags::all();
    $selectedTag = $tag->name;
    return view('main.productsPage',compact('products','tags','selectedTag'));
}
function searchProduct(Request $request){
    $fields = $request->validate([
        'keyword'=>['required','string','min:1'],
    ]);
    $products = products::where('name' , 'LIKE','%'.$fields['keyword'].'%')->paginate(3);
    $tags = tags::all();
    $keyword = $fields['keyword'];
    return view('main.productsPage',compact('products','tags','keyword'));

}
}