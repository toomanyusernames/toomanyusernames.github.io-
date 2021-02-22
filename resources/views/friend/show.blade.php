@extends('layouts.app')

@section('content')
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-12">
            @foreach ($user->friends as $user_1)
                <div class="col-sm-10 text-right" style="padding: 10px; box-shadow: 0 0 10px 1px gray; margin:5px;" >
                    <div class="flex">
                    <img src="{{ $user_1->user2->profile_picture }}" alt="Profile Picture" width="50" height="50">
                    <div class="text-bottom pl-3 pt-3" >
                        <h5>{{ $user_1->user2->username }}</h5>
                    </div>
                </div>
                    <a href="{{ route('user.show', $user_1->id) }}" class="btn btn-link">View User</a>
                </div>
            @endforeach
@if ($user->friends()->count() == 0)
    <h3 class="text-center">This user does not have any friends</h3>
@endif
        </div>
    </div>
@endsection
