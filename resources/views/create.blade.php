@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="h3 mb-3 mt-4 font-weight-normal">Create new post</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3 pull-right">
                <a href="{{ route('posts') }}" class="btn btn-primary pull-right">Back to posts</a>
            </div>

                <form method="POST" action="{{ route('post.store') }}">
                    @include('layouts.form')
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

        </div>
    </div>
</div>
@endsection
