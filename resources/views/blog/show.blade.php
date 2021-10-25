@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalle del Blog <b>{{ $blog->name }}</b></div>

                    <a href="{{ route('blogs.index') }}" class="btn btn-info text-white">Volver al listado de Blogs</a>
                    <a href="{{ route('posts.create', ['blogId' => $blog->id]) }}"
                        class="btn btn-success btn-block mt-3">Añadir un nuevo Post</a>
                    <table class="table">
                        @if ($blog->posts->count())
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Post</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        @endif
                        <tbody>
                            @forelse($blog->posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td width="50%">{{ $post->title }}</td>
                                    <td><a href="{{ route('posts.show', ['blogId' => $blog->id, 'id' => $post->id]) }}"
                                            class="btn btn-dark">Ir al post</a></td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('posts.destroy', ['blogId' => $post->blog_id, 'id' => $post->id]) }}">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar Blog</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <p class="alert alert-warning text-center">No hay posts</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
