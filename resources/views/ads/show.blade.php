@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ $ad->title }}</div>
                <div class="card-body">{{ $ad->description }}</div>
                <div class="card-footer">Author: {{ $ad->user->username }}. Created at {{ $ad->created_at }}. Last updated
                    at {{ $ad->updated_at }}.</div>
                @include('layouts.buttons')
            </div>
        </div>
    </div>
@endsection
