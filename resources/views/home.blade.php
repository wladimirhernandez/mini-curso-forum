@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Welcome') }} {{ Auth::user()->name }}!


                    </div>
                    <a class="btn btn-success block mt-4" href="{{ route('blogs.index') }}">
                        Go to Blogs!
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
