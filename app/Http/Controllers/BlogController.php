<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::withCount("posts")->paginate(2);
        return view("blog.index", compact("blogs"));
    }

    public function create()
    {
        return view("blog.create");
    }

    public function store()
    {
        $this->validate(request(), [
            "name" => "required|min:2|unique:blogs"
        ]);

        Blog::create(request()->only("name"));
        return redirect(route("blogs.index"));
    }

    public function show(int $id)
    {
        $blog = Blog::with("posts")->findOrFail($id);

        return view("blog.show", compact("blog"));
    }

    public function destroy(int $id)
    {
        if (request()->isMethod("DELETE")) {
            try {
                $blog = Blog::findOrFail($id);
                $blog->posts()->delete();
                $blog->delete();
                return redirect(route("blogs.index"));
            } catch (\Exception $exception) {
                dd($exception);
            }
        }
    }
}
