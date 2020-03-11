@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome back, <strong>{{ Auth::user()->username }}</strong>. Your last visit was
                        <time class="timeago" datetime="{{Auth::user()->signed_in_at}}">{{ Auth::user()->signed_in_at }}</time>.</p>
                    <p>You have posted <strong>{{ $imageCount }}</strong> images.</p>
                    <p>You have uploaded
                        <strong><a href="{{ url('images') }}">{{ $newImageCount }}</a></strong>
                        images since your last visit.</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
