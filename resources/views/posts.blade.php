@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="h3 mb-3 mt-4 font-weight-normal">All Blog Posts</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mb-3 pull-right">
                <a href="{{ route('post.create') }}" class="btn btn-primary pull-right">Create post</a>
            </div>
            <table class="table table-striped table-bordered xs-mt-20 display" id="postTable" width="100%">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="text-left">Title</th>
                        <th scope="col" class="text-center">Content</th>
                        <th scope="col" class="text-left">Owner</th>
                        <th scope="col" class="text-left">Created</th>
                        <th scope="col" class="text-center">Manage</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr class="text-left">
                        <td class="text-left">{{ $post->title }}</td>
                        <td class="text-left">
                            {!! Str::limit($post->description, 100, $end = '...') !!}
                        </td>
                        <td class="text-left">
                            {{ $post->user->name }}
                        </td>
                        <td class="text-left">
                            {{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('post.view', Hashids::encode($post->id)) }}" class="mr-2" title="View post">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                </svg>
                            </a>

                            @if(Auth::check() && Auth::id() == $post->user_id)
                                <a href="{{ route('post.edit', Hashids::encode($post->id)) }}" class="mr-2" title="Edit post">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>

                                <a href="javascript:void(0)" title="Delete post" data-url="{{ route('post.delete', Hashids::encode($post->id)) }}" class="delete-post">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg" color="red">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
