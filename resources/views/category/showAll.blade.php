@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            @foreach ($posts as $post)
            <hr>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Created by {{ $post->user->username }}{{ $post->title }}
                            <div class="float-right">
                                <div class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class='dropdown-item' href="{{ route('post.show', [$post->id]) }}">Show
                                            Post</a>
                                        <a class='dropdown-item' href="{{ route('post.edit', [$post->id]) }}">Edit
                                            Post</a>

                                        {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['post.delete',
                                        $post->id]]) !!}
                                        <a class='dropdown-item' href="#"
                                            onclick="document.getElementById('delete').submit()">Delete Post</a>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        @if ($post->image != null)
                            <img src="/images/{{ $post->image }}" alt="image" width="100%" height="500">
                        @endif
                        {{ $post->body }}
                        <br>
                       Category: <div class="badge">{{ $post->category->name }}</div>

                    </div>
                    <div class="card-footer" data-postid="{{ $post->id }}>
                        @php
                        $i = Auth::user()->likes()->count();
                        $c = 1;
                    @endphp
                    @foreach (Auth::user()->likes as $like)
                        @if ($like->post_id == $post->id)
                            @if ($like->like)
                                <a href="" class="btn btn-link like active-like">Like</a>
                            @else
                                <a href="" class="btn btn-link like">Like</a>
                                <a href="" class="btn btn-link like active-like">Dislike</a>
                            @endif
                            @break
                        @elseif ($i == $c)
                            <a href="" class="btn btn-link like">Like</a>
                            <a href="" class="btn btn-link like">Dislike</a>
                        @endif
                        @php
                            $c++;
                        @endphp
                    @endforeach
                    @if($i == 0)
                            <a href="" class="btn btn-link like">Like</a>
                            <a href="" class="btn btn-link like">Dislike</a>
                            @endif
                        <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-link">Comment</a>
                    </div>

                </div>

            @endforeach
        </div>
    </div>
@endsection
