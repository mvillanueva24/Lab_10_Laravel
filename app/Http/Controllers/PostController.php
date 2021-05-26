<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Carbon\Carbon;
use App\Models\Post;
use Jenssegers\Mongodb\Eloquent\Model;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function show($id)
    {
        $resultado = Post::find($id);
        return view('postUnico', ['post' => $resultado ]);
    }

    public function create(Request  $request)
    {
        $request->validate([
            'title' => 'required:max:120',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content' => 'required:max:2200',
        ]);
        
        $image = $request->file('image');
        $imageName = time().$image->getClientOriginalName();
        $title = $request->get('title');
        $content = $request->get('content');

        $post = new Post();
        $post->title = $title;
        $post->image = 'img/' . $imageName;
        $post->content = $content;
        $post->save();

        $request->image->move(public_path('img'), $imageName);

        return redirect()->route('post', ['id' => $post->id]);
    }
    
    /*
    //Realizado con la extensión Carbon
    public function today()
    {
        $posts = Post::where('created_at', '>=',Carbon::today())->get();
        return view('today', compact('posts'));
    }*/
    protected $create = ['created_at'];
    public function today()
    {
        $posts = Post::where(
            'created_at', '>=',
            today()
        )->get();
        return view('today', compact('posts'));
    }
}
