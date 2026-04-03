<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use  App\Models\Product ; 
use Image;
use File ; 
class ProductsController extends Controller
{
    public function index() {
        $products = Product::Paginate(6);
        return view('product.index',compact('products'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('product.create');
    }

    public function store(ProductRequest $request){

        $product = new Product(); 
        if ($request->hasFile('image')) {

            $rename = time() . '.' .$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/product/', $rename);
            //resize image
            Image::make((public_path('uploads/product/') . $rename))->resize(450, 450)
                        ->save((public_path('uploads/resize/') . $rename));

            $product->image = $rename; 

        }else{
            $product->image = "https://via.placeholder.com/450x450.png"; 
        }
            $product->name = $request->name ; 
            $product->detail = $request->detail ; 
            $product->price = $request->price ; 
            $product->stock = $request->stock ; 
            $product->save(); 
            return redirect('/products'); 
        
    }
    //เรียกหน้าจอฟอร์มแก้ไขพร้อมดึงข้อมูลตาม id ที่ส่งเข้ามา
    public function edit($id){
        $product = Product::findOrFail($id) ; 
        return view('product.edit',compact('product'));
    }

    public function update(Request $request,$id){

       // dd($request->all());
        $product = Product::findOrFail($id); 
        if ($request->hasFile('image')) {
              //delete file
            if ($product->image) {
                File::delete((public_path('uploads/product/') . $product->image));
                File::delete((public_path('uploads/resize/') . $product->image));
            }

            $rename = time() . '.' .$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('uploads/product/'), $rename);
            //resize image
            Image::make((public_path('uploads/product/') . $rename))->resize(450, 450)
                        ->save((public_path('uploads/resize/') . $rename));

            $product->image = $rename; 

        }
            $product->name = $request->name ; 
            $product->detail = $request->detail ; 
            $product->price = $request->price ; 
            $product->stock = $request->stock ; 
            $product->save(); 
            return redirect('/products'); 
    }

    public function destroy($id){

        $product = Product::findOrFail($id);

        //ลบภาพออกจาก Folder ด้วย
        if ($product->image != NULL) {
            File::delete(public_path('uploads/product/') . $product->image);
            File::delete(public_path('uploads/resize/') . $product->image);
        }

        $product->delete();

        return redirect('/products');
    }

    

}