@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            @foreach ($users as $user)
                <div class="col-sm-10 text-right" style="padding: 10px; box-shadow: 0 0 10px 1px gray; margin:5px;" >
                    <div class="flex">
                    <img src="{{ $user->profile_picture }}" alt="Profile Picture" width="50" height="50">
                    <div class="text-bottom pl-3 pt-3" ><h5>{{ $user->username }}</h5></div>
                </div>
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-link">View User</a>
                </div>
            @endforeach
            {{ $users->links() }}
        </div>
    </div>
@endsection
