<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Depart;
use Session;

class PostsController extends Controller
{
    /**
    * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::find($id);
        return view('post.show',compact('posts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('trashed')) {
            $posts = Post::onlyTrashed()->paginate(10);
        } else {
            $posts = Post::paginate(10);
        }

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->post_title ;
        $detail = $request->post_detail;

        \DB::insert('insert into posts (post_title,post_detail) values (?,?)',[$title,$detail]);
        Session::flash('success','อัพเดทข้อมูลเรียบร้อยแล้ว') ;

        return redirect()->route('posts.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = \DB::select('select * from posts where id = ?',[$id]);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request ,$id)
    {
        $title = $request->input('post_title') ;
        $detail = $request->input('post_detail'); 

        \DB::update('update posts set post_title = ? , post_detail = ? where id = ?',[$title,$detail,$id] );

        Session::flash('success','อัพเดทข้อมูลเรียบร้อยแล้ว') ;
        return redirect('/posts'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        Session::flash('success','ลบข้อมูลเรียบร้อยแล้ว');
        return redirect('/posts');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->latest()->get();
        return redirect('/posts');
    }

    public function restore($id)
    {
        Post::where('id', $id)->restore();
        return redirect('/posts');
    }

    public function restoreAll()
    {
        Post::onlyTrashed()->restore();
        return redirect('/posts');
    }
}
