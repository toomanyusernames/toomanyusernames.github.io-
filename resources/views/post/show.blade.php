@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ $post->title }}
                    <div class="float-right">
                        <a href="{{ url('/post') }}">Return Back</a>
                    </div>
                    </h6>
                </div>
                <div class="card-body">
                    {{ $post->body }}
                    @if ($post->image != null)
                        <img src="/images/{{ $post->image }}" alt="Image" width="100%" height="500">
                    @endif
                    <br>
                    <div class="badge">
                        {{ $post->category->name }}
                    </div>
                    <div class="card-footer" data-postid="{{ $post->id }}">
                        @php
                            $i = Auth::user()->likes()->count();
                            $c = 1;
                        @endphp
                        @if (Auth::check())
                        @php
                        $i = Auth::user()->likes()->count();
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
                            @if($i == 0)
                            <a href="" class="btn btn-link like">Like</a>
                            <a href="" class="btn btn-link like">Dislike</a>
                            @endif
                        @else
                            <a href="{{ url('.login') }}" class="btn btn-link ">Like</a>
                            <a href="{{ url('.login') }}" class="btn btn-link ">Dislike</a>
                        @endif


                        <a href="#" class="btn btn-link">Comment</a>
                    </div>
                </div>

                    @foreach ($post->comments as $comment)
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-sm-9">
                                    {{ $comment->comment }}
                                </div>
                                <div class="col-sm-3 text-right"></div>
                                <small>Commented by {{ $comment->user->username }}</small>
                                </div>
                            </div>
                    @endforeach
                @if (Auth::check())
                    <div class="card panel-default" style="border-radius: 0;">
                    <div class="card-body ">
                        <form action="{{ url('/comment') }}" method="POST" style="display: flex;">
                            {{ csrf_field() }}
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="text" name="comment" placeholder="Enter your comment" class="form-control"
                            style="border-radius: 0;">
                        <input type="submit" value="Comment" class="btn btn-primary" style="border-radius: 0;">
                        </form>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <a href="" class="close" data-dismiss="alert">&times;</a>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <a href="" class="close" data-dismiss="alert">&times;</a>
                                {{ Session::get('success') }}
                            </div>
                        @endif
                    </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
