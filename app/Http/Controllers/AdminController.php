<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\products_images;
use App\Models\tags;
use App\Models\User;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Attributes\Tag;

class AdminController extends Controller
{
    function adminHome(){
        return view('admin.home');
    }
    function ManageUser(){
        $user = User::where('id','!=',Auth::id())->get();
        $deleteUsers = User::onlyTrashed()->get();
        return view('admin.ManageUser',compact('user','deleteUsers'));
    }
    function ManageUserAction(User $id){
        if($id->role === 'admin'){
            $id->role = 'user';
        }
        else{
            $id->role = 'admin';
        }
        $id->save();
        return redirect()->back()->with('success','role updated successfuly');
    }
    function delete(User $id){
        $id->delete();
        return back()->with('success','User deleted successfuly');
    }
    function restore($users){
        $user = User::onlyTrashed()->findOrFail($users);
        $user->restore();
        return back()->with('sucess','User restored successfuly');
    }
    function tags(){
        $tag =tags::all();
        return view('admin.tags',compact('tag'));

    }

    function tagsAction(Request $request){
        $fields = $request->validate([
            'name'=>['required','string','min:4'],
        ]);
        tags::create($fields);
        return back()->with('success','Tag created successfuly');
    }
    function editTag(tags $tag){
        return view('admin.editTags',compact('tag'));
    }
    function editagAction(Request $request ,tags $tag){
        $fields = $request->validate([
            'name'=>['required','string'],
        ]);
        $tag->update($fields);
        return redirect()->route('tagsPage')->with('success','tag edited successfuly');
    }
    function product(){
        $deletedProduct = products::onlyTrashed()->get();
        $product = products::all();
        return view('admin.product',compact('product','deletedProduct'));
    }
    function productAction(Request $request){
        $fields = $request->validate([
            'name'=>['required','string','min:5'],
            'info'=>['required','string','max:300'],
            'description'=>['required','string'],
            'price'=>['required','integer'],
            'quantity'=>['required','integer'],
            'image'=>['required','image','max:2048','mimes:jpeg,png,jpg,gif,svg,webp'],
        ]);

        
        $imageName = time().'.'.$fields['image']->extension();
        $fields['image']->move(public_path('assets/images'), $imageName);
        $fields['image'] = $imageName;

        
        try {
                products::create($fields);
                return back()->with('success', 'Product created successfully');
            } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
}

    }
    function deleteProduct(products $product){
        $product->delete();
        return back()->with('success','product deleted successfuly');
    }
    function restoreProduct($Rp){
        $products = products::onlyTrashed()->findOrFail($Rp);
        $products->restore();
        return back()->with('success','Product restored successfuly');
        
    }
    function edit(products $edit){
        $producttags = $edit->tags()->pluck('tags_id');
        $tag = tags::whereNotIn("id",$producttags)->get();
        return view('admin.EditProduct',compact('edit','tag'));
    }
    function editProduct(Request $request , products $edit){
        $fields = $request->validate([
            'name'=>['required','string','min:5'],
            'info'=>['required','string'],
            'description'=>['required','string'],
            'price'=>['required','integer'],
            'quantity'=>['required','integer'],
            'image'=>['nullable','image','max:2048','mimes:jpeg,png,jpg,gif,svg,webp'],
        ]);
        
        if(isset($request->image)){
        $imageName = time().'.'.$fields['image']->extension();
        $fields['image']->move(public_path('assets/images'), $imageName);
        $fields['image'] = $imageName;
        }else{
            $fields['image'] = $edit->image;
        }
        

        $edit->update($fields);
        return redirect()->route('productPage')->with('success','product edited successfully');
    }
    function AddImage(Request $request , products $product){
        $fields = $request->validate([
            'image'=>['required','image','max:2048','mimes:jpeg,png,jpg,gif,svg,webp']
        ]);
        $imageName = time().'.'.$fields['image']->extension();
        $fields['image']->move(public_path('assets/images'),$imageName);
        $fields['image'] = $imageName;
        $fields['products_id'] = $product->id;
        products_images::create($fields);
        return back()->with('success',"Image added successfully to product");
    }
    function carousel(Carousel $carousel)
    {
    return view('admin.carousel',compact('carousel'));
    }
    function carouselAction(Request $request){
        $fields = $request->validate([
            'name'=>['required','string','min:5'],
            'description'=>['required','string'],
            'image'=>['required','image','max:2048','mimes:jpeg,pnj,webp,svg,gif'],
        ]);
        $imageName = time().'.'.$fields['image']->extension();
        $fields['image']->move(public_path('assets/images'),$imageName);
        $fields['image'] = $imageName;
        Carousel::create($fields);
        return back()->with('success','Carousell added successfuly');
    }
    function AddProductTag(Request $request , products $products){
        $fields = $request->validate([
            'tag_id' => ['required','exists:tags,id'],
        ]);
        if($products->tags->contains($fields['tag_id'])){
            return back()->with('error','Product already has this tag');
        }
        $products->tags()->attach($fields['tag_id']);
        return back()->with('success','Tag added successfully');
    }

    function removeProductTags(products $productss , tags $tagg){
        if(!$productss->tags->contains($tagg->id)){
            return back()->with('error','Tag removed not associated with this product');
        }
        $productss->tags()->detach($tagg->id);
        return back()->with('success','Tag removed from product successfully');
    }
    
}
