<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index($blog_id)
    {
        $posts = Post::where('blog_id', '=', $blog_id)->paginate(2);
        return view("post.index", compact("posts"));
    }

    public function create($id)
    {
        $blog_id = $id;
        return view("post.create", compact("blog_id"));
    }

    public function store($blog_id)
    {

        $this->validate(request(), [
            "title" => "required|min:2|unique:posts"
        ]);

        Post::create(([
            'blog_id' => $blog_id,
            'title'  => request()->input("title"),
            'content'  => request()->input("content"),
        ]));

        return redirect(route("posts.index", $blog_id));
    }

    public function show($blog_id, $post_id)
    {
        $blog_items = Post::where('blog_id', '=', $blog_id)->get();

        $post = Post::findOrFail($post_id);

        return view("post.show", compact("post"));
    }

    public function destroy($blog_id, $id)
    {
        if (request()->isMethod("DELETE")) {
            try {
                $post = Post::findOrFail($id);
                $post->delete();
                return redirect(route("blogs.show", $blog_id));
            } catch (\Exception $exception) {
                dd($exception);
            }
        }
    }
}
