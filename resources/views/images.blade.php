@extends('layouts.app')

@section('content')
    <h2>Images - {{ $images->count() }}</h2>
    @if ($images->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <td></td>
                    <td>Image</td>
                    <td>Created</td>
                    <td></td>
                </tr>
            </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td><img class="img-thumbnail" width="40" height="40" src="{{ url('/'.$image->hash) }}" /></td>
                    <td>
                        <a href="{{ url('/'.$image->hash) }}">
                            {{ url('/'.$image->hash) }}
                        </a>
                    </td>
                    <td>
                        <time class="timeago" datetime="{{ $image->created_at }}">{{ $image->created_at  }}</time>
                    </td>
                    <td>
                        <a href="{{ route('images.delete', ['image' => $image->hash]) }}"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    @else
        You have no images.
    @endif

    {{ $images->links() }}
@endsection