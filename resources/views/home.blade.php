@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('ads.create') }}">
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

                            @include('layouts.buttons')
                        </div>
                    </div>
                @endforeach
            @else
                <h1>No ads here yet!</h1>
            @endif
        </div>

        @if ($ads->isNotEmpty())
            <br>
            <div class="row justify-content-center">{{ $ads->render() }}</div>
        @endif
    </div>
@endsection
