@extends('layouts.app')

@section('content')
    <h2>Images - {{ $images->total() }}</h2>
    @if ($images->count() > 0)
        @foreach($images->getCollection()->chunk(5) as $chunk)
            <div class="row pt-1">
            @foreach($chunk as $image)
                <div class="col-md-2">
                    <img class="img-thumbnail" style="width:150px; height:150px;" src="{{ url('/'.$image->hash) }}" alt="image uploaded" />
                </div>
            @endforeach
            </div>
        @endforeach
    @else
        You have no images.
    @endif

    {{ $images->links() }}
@endsection