@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3 pull-right">
                <a href="{{ route('posts') }}" class="btn btn-primary pull-right">Back to posts</a>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="mt-4">{{ $post->title }}</h1>

                    <p class="lead">
                        by <a href="#">{{ $post->user->name }}</a>
                    </p>

                    <hr>

                    <p>{{ \Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</p>

                    <hr>

                    <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="Placeholder Image">

                    <hr>

                    <p>
                        {!! $post->description !!}
                    </p>
                    <hr>

                    <!-- Comments Form -->
                    @if(Auth::check())
                        <div class="card my-4">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <form method="POST" action="{{ route('post.store') }}">
                                    @csrf
                                    <input type="hidden" name="postId" value="{{ Hashids::encode($post->id) }}">
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control no-resize" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Reply</button>
                                </form>
                            </div>
                        </div>
                    @endif

                    <!-- Post Comments -->
                    <h5 class="card-header">Post Replies:</h5>
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">User Comment</h5>
                            User comment reply goes here, functionality to be implemented soon!

                            User comment reply goes here, functionality to be implemented soon!

                            User comment reply goes here, functionality to be implemented soon!
                        </div>
                    </div>

                </div>

                <div class="col-md-4 mt-lg-4">
                    <div class="card my-4">
                        <h5 class="card-header">Other posts:</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled mb-0">
                                        @foreach($posts as $post)
                                            <li>
                                                <a href="{{ route('post.view', Hashids::encode($post->id)) }}">{{ $post->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
