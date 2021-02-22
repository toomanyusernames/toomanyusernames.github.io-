@extends('layouts.app')

@section('content')
    <div class="container flex">
        <div class="col-sm-6">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <a href="" class="close" data-dismis="alert">&times; </a>
                    {{ Session::get('success') }}
                </div>

            @endif


            <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="card">
                    <div class="card-body">
                        <div class="form-group" {{ $errors->has('title') ? 'has-error' : '' }}>
                            <input type="text" name="title" class="form-control" placeholder="Enter your post title">
                            @if ($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            @endif

                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control" name="image">

                        </div>
                        <div class="form-group" {{ $errors->has('body') ? 'has-error' : '' }}>
                            <textarea name="body" id="" cols="80" rows="8" class="form-control"
                                placeholder="enter you post"></textarea>

                            @if ($errors->has('body'))
                                <small class="text-danger">{{ $errors->first('body') }}</small>
                            @endif
                        </div>
                        <div class="form-group">

                            <select class="form-control" name="category" id="">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Post" name="Post" class="btn btn-primary btn-block">
                    </div>
                </div>

            </form>

            @foreach ($posts as $post)
                <hr>
                <div class="card  card-default">
                    <div class="card-header">
                        <h3 class="card-title">
                            Created by {{ $post->username }}, {{ $post->title }}
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
                        Category: <div class="badge">{{ $category->name }}</div>

                    </div>
                    <div class="card-footer text-muted" data-postid="{{ $post->id }}">
                        @php
                            $i = Auth::user()
                                ->likes()
                                ->count();
                            $c = 1;
                        @endphp
                        @foreach (Auth::user()->likes as $like)
                            @if ($like->post_id == $post->id)
                                @if ($like->like)
                                    <a href="" class="btn btn-link like active-like">Like</a>
                                    <a href="" class="btn btn-link like">Dislike</a>
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
                        @if ($i == 0)
                            <a href="" class="btn btn-link like">Like</a>
                            <a href="" class="btn btn-link like">Dislike</a>
                        @endif
                        <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-link">Comment</a>
                    </div>

                </div>


            @endforeach
        </div>
        <div class="col-sm-3 ">
            @foreach ($categories as $category)
                <a href="{{ route('category.showAll', [$category->name]) }}" class="badge">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
@endsection
