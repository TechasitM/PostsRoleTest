<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Depart;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$post = Post::orderBy('id','desc')->get();
        //$posts = \DB::select('select * from posts order By id desc');

       $posts = Post::userid()->visitor()->paginate(5) ;

        return view('post.index',compact('posts'));
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

        return "บันทึกรายการเรียบร้อยแล้ว";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::find($id);
        return view('post.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = \DB::select('select * from posts where id = ?',[$id]);
        return view('post.edit',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->post_title ;
        $title = $request->post_detail ;

        \DB::update('update posts set post_title = ? , post_detail = ? where id = ?',[$title],[$detail],[$id]);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = \DB::delete('DELETE FROM posts WHERE id = ?', [$id]);

        return redirect('/posts');
    }
}
