@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalle del Post <b>{{ $post->title }}</b></div>

                    <a href="{{ route("blogs.show", ["id" => $post->blog_id]) }}"
                        class="btn btn-info text-white">Volver al listado de Posts</a>
                    <a href="{{ route('posts.create', ['blogId' => $post->blog_id]) }}"
                        class="btn btn-success btn-block mt-3">Añadir un nuevo Post</a>
                    <div class="container py-3">
                        <p>
                            {{ $post->content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
