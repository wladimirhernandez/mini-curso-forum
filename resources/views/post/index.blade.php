@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        <table class="table">
                            @if ($posts->count())
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
                                @forelse($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td width="40%">{{ $post->title }}</td>
                                        <td>{{ $post->posts_count }}</td>
                                        <td><a href="{{ route('posts.show', ['blogId' => $post->blog_id, 'id' => $post->id]) }}"
                                                class="   btn btn-dark">Ir al Post</a></td>
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
                        @if($posts->count())
                        {{ $posts->links() }}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
