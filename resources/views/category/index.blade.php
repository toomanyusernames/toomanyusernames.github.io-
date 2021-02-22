@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="col-sm-6">
            @foreach ($categories as $category)
                <div class="card" style="padding: 1px; box-shadow: 0 0 10px 1px gray; margin:5px;">
                    <div class="card-body">
                        {{ $category->name }}

                    </div>
                    <div class="card-footer">
                       <small>Created by  {{ $category->user->username }}</small>
                    </div>
                </div>
            @endforeach
{{$categories->links() }}
        </div>
        <div class="col-sm-6">
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" >
                  <label for="name control-label" >Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter your category name" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Help text</small>
                  @if ($errors->has('name'))
                      <small class="text-danger">{{ $errors->first('name') }}</small>
                  @endif
                </div>
                <input type="submit" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
@endsection
