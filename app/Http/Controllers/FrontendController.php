<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function index(){

        $posts = Post::paginate(20);
        return view('welcome', compact('posts'));
    }
    public function aboute(){
        return view('aboute');
    }
    
    public function getDataApi(){
        $client = new \GuzzleHttp\Client(['verify' => false]);

        $request = $client->get('https://jsonplaceholder.typicode.com/posts');
        $response = $request->getBody();

        $jsonData = json_decode($response, true);

        return view('dataApi', compact('jsonData'));
    }
}
