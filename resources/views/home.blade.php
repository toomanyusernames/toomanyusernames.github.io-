@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ml-5">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="card card-default">
                <div class="card-header flex ">
                    <h4 class="card-title mt-2">
                        <img src="{{ Auth::user()->profile_picture }}" alt="">
                    </h4>
                    <div class="mt-6 ml-10"><h4> {{ Auth::user()->username }}</h4></div>
                    <div class="float-right">
                            <small><a href="{{ route('friend.show', Auth::user()->id) }}">View Friends</a></small>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item active"><a href="#posts" aria-controls="posts" role="tab" data-toggle="tab" class="nav-link" aria-selected="false">Your Posts</a></li>
                        <li role="presentation" class="nav-item "><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab" class="nav-link" aria-selected="false">Comments</a></li>
                        <li role="presentation" class="nav-item "><a href="#categories" aria-controls="categories" role="tab" data-toggle="tab" class="nav-link" aria-selected="false">Categories</a></li>
                        <li role="presentation" class="nav-item "><a href="#likes" aria-controls="likes" role="tab" data-toggle="tab" class="nav-link" aria-selected="false">You Liked</a></li>
                      </ul>
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active fade in" id="posts">
                            {{ Auth::user()->posts()->count() }} Posts created
                            @foreach (Auth::user()->posts as $post)
                                <div class="card card-default">
                                  <div class="card-header">
                                    <h3 class="card-title">
                                        {{ $post->title }}
                                        <div class="float-right">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    <span class="caret"></span>
                                                </a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ route('post.show', [$post->id]) }}">Show Post</a></li>
                                                    <li><a href="{{ route('post.edit', [$post->id]) }}">Edit Post</a></li>
                                                    <li>
                                                        <a href="#" onclick="document.getElementById('delete').submit()">Delete Post</a>
                                                        {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['post.delete', $post->id]]) !!}
                                                        {!! Form::close() !!}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </h3>
                                  </div>
                                  <div class="card-body">
                                    {{ $post->body }}
                                    <br />
                                    Category: <div class="badge">{{ $post->category->name }}</div>
                                  </div>
                                </div>
                            @endforeach
                        </div>
<div role="tabpanel" class="tab-panel fade" id="comments">
    {{ Auth::user()->comments()->count() }} Comments created
    @foreach (Auth::user()->comments as $comment)
        <div class="card">

            <div class="card-body">
                <div class="col-sm-9">
                    {{ $comment->comment }}
                </div>
                <div class="col-sm-3">
                    <small><a href="{{ route('post.show', [$comment->post->id]) }}">View post</a></small>
                </div>
            </div>
        </div>
    @endforeach
</div>
                        <div role="tabpanel" class="tab-pane fade" id="categories">
                            {{ Auth::user()->categories()->count() }} Categoreies created
                            @foreach (Auth::user()->categories as $category)
                                <div class="card card-default">
                                  <div class="card-body ">
                                    {{ $category->name }}
                                  </div>
                                </div>
                            @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="likes">
                            @foreach (Auth::user()->likes as $like)
                                @if ($like->like)
                                    <div class="card card-default">
                                      <div class="card-header">
                                        <h3 class="card-title">
                                            Created by {{ $like->post->user->username }}, {{ $like->post->title }}
                                            <div class="float-right">
                                                <div class="dropdown flex">
                                                    <a href="#" class="flex dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                        <span class="caret flex"></span>
                                                    </a>

                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="{{ route('post.show', [$like->post->id]) }}">Show Post</a></li>
                                                        <li><a href="{{ route('post.edit', [$like->post->id]) }}">Edit Post</a></li>
                                                        <li>
                                                            <a href="#" onclick="document.getElementById('delete').submit()">Delete Post</a>
                                                            {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['post.delete', $like->post->id]]) !!}
                                                            {!! Form::close() !!}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </h3>
                                      </div>
                                      <div class="card-body">
                                        {{ $like->post->body }}
                                        @if ($like->post->image != null)
                                            <img src="/images/{{ $like->post->image }}" alt="Image" width="100%" height="600">
                                        @endif
                                        <br />
                                        Category: <div class="badge">{{ $like->post->category->name }}</div>
                                      </div>
                                      <div class="card-footer" data-postid="{{ $like->post->id }}">
                                        <a href="#" class="btn btn-link like active-like">Like <span class="badge">{{ $like->post->likes()->where('like', '=', true)->count() }}</span></a>
                                        <a href="#" class="btn btn-link like">Dislike <span class="badge">{{ $like->post->likes()->where('like', '=', false)->count() }}</a>
                                         <a href="{{ route('post.show', [$like->post->id]) }}" class="btn btn-link">Comment</a>
                                      </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


