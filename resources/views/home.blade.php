@extends('layouts.app')

@section('content')
    <div class="container">
        @if($user_id)
            <div class="row">
                <div class="col-md-4">
                    <a href="/create">
                        <button class="btn btn-primary">Create ad</button>
                    </a>
                </div>
            </div>
            <br>
        @endif

        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ($ads->isNotEmpty())
                @foreach($ads as $ad)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="/{{$ad->id}}">{{ $ad->title }}</a>
                            </div>

                            <div class="card-body">
                                <p>{{ $ad->description }}</p>
                                <br>
                                <p>Posted by {{ $ad->user->name }} {{ $ad->created_at }}</p>
                            </div>
                            @if($user_id == $ad->user_id)
                                <div class="card-footer">
                                    <a class="link-button" href="/edit/{{$ad->id}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>

                                    <a href="/delete/{{$ad->id}}" class="link-button">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <h1>No ads here yet!</h1>
            @endif
        </div>
    </div>
@endsection
