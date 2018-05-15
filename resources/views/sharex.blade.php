@extends('layouts.app')

@section('content')
    <h1>ShareX Config</h1>
    <p>Replace <b>YOURTOKENHERE</b> with your token generated at  <a href="{{ url('/settings') }}">Your settings</a>. Once you have done that, copy the entire text to your clipboard and import it to ShareX.</p>
    <textarea class="form-control">{!! json_encode($config, JSON_PRETTY_PRINT) !!} }</textarea>
@endsection