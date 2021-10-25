@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Blogs</div>

                    <div class="card-body">
                        <a href="{{ route("blogs.create") }}" class="btn btn-success btn-block">Añadir un nuevo blog</a>
                        <table class="table">
                            @if($blogs->count())
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Blog</th>
                                        <th>Posts</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            @endif
                            <tbody>
                            @forelse($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td width="40%">{{ $blog->name }}</td>
                                    <td>{{ $blog->posts_count }}</td>
                                    <td><a href="{{ route("blogs.show", ["id" => $blog->id]) }}" class="btn btn-dark">Ir al blog</a></td>
                                    <td>
                                        <form method="POST" action="{{ route("blogs.destroy", ["id" => $blog->id]) }}">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar Blog</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
                                        <p class="alert alert-warning text-center">No hay blogs</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        @if($blogs->count())
                            {{ $blogs->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
