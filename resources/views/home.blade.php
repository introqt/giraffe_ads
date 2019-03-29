@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
            <div class="row">
                <div class="col-md-4">
                    <a href="/ads/create">
                        <button class="btn btn-success">Create ad</button>
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
                                <a href="/ads/{{$ad->id}}">{{ $ad->title }}</a>
                            </div>

                            <div class="card-body">
                                <p>{{ $ad->description }}</p>
                                <br>
                                <p>Posted by {{ $ad->user->name }} {{ $ad->created_at }}</p>
                            </div>
                            @if(Auth::user()->checkNeedShowButtonByUserId($ad->user_id))
                                <div class="card-footer">
                                    <a class="link-button" href="/ads/{{$ad->id}}/edit">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>

                                    <form method="POST" action="/ads/{{$ad->id}}" style="display: inline;">
                                        @method('DELETE')
                                        @csrf

                                        <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this ad?');">
                                            Delete
                                        </button>
                                    </form>
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
