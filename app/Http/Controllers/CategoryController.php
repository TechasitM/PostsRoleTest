<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){

        //$category = DB::table('categories')->get();
        
        $category = Category::all();
        //$category = Category::orderBy('id','asc')->limit(2)->get();
        //$category = Category::take(4)->get();
        return view('category.index',compact('category'));

    }
    public function edit($id){

        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.edit',compact('category'));

    }

    public function update(Request $request , $id){
     
    //$data = [
    //    'category_name' => $request->category_name 
    //] ;
    //DB::table('categories')->where('id',$id)->update($data);

    $category = Category::find($id);
    $category ->category_name = $request->category_name;
    $category ->save();

    return redirect('/category') ;

    }

    public function create(){

        return view('category.create');

    }

    public function store(Request $request){

    //$data = [
    //   'category_name' => $request->category_name 
    //] ;
    //DB::table('categories')->insert($data);
    
    $category = new Category();
    $category ->category_name = $request->category_name;
    $category ->save();
    
    return redirect()->back();
    }

    public function destroy($id){

        //DB::table('categories')->where('id',$id)->delete();

        $category = Category::find($id)->delete();
        return redirect('/category') ;
    }
}
