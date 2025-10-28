<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function index(){

        $category = DB::table('categories')->get();
        return view('category.index',compact('category'));

    }
    public function edit($id){

        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.edit',compact('category'));

    }

    public function update(Request $request , $id){
     
    $data = [
        'category_name' => $request->category_name 
    ] ;
    DB::table('categories')->where('id',$id)->update($data);

    return redirect('/category') ;

    }

    public function create(){

        return view('category.create');

    }

    public function store(Request $request){

    $data = [
        'category_name' => $request->category_name 
    ] ;
    DB::table('categories')->insert($data);

    return redirect()->back();
    }

    public function destroy($id){

        DB::table('categories')->where('id',$id)->delete();
        return redirect('/category') ;
    }
}
