@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ($ads)
                @foreach($ads as $ad)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <a href="/{{$ad->id}}">{{ $ad->title }}</a>
                            </div>

                            <div class="card-body">
                                <p>{{ $ad->description }}</p>
                                <br>
                                <p>{{ $ad->user->name }} at {{ $ad->created_at }}</p>
                            </div>
                            @if($user_id == $ad->user_id)
                                <div class="card-footer">
                                    <button class="btn btn-primary">
                                        <a class="link-button" href="/edit/{{$ad->id}}">Edit</a>
                                    </button>
                                    <button class="btn btn-danger">
                                        <a href="/delete/{{$ad->id}}" class="link-button">Delete</a>
                                    </button>
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
