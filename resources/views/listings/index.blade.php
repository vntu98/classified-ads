@extends('layouts.app')

@section('content')
    <h4>{{ $category->parent->name }} &nbsp; > &nbsp; {{ $category->name }}</h4>
    <hr>

    @if ($listings->count())
        @foreach ($listings as $listing)
            @include('listings.partials._listing', compact('listing'))
        @endforeach

        {{ $listings->links() }}
    @else
        <p>No listings found</p>
    @endif
@endsection
