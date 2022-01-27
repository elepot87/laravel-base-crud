@extends('layouts.main')

@section('head-title', 'Comics | DC Comics' )

@section('main-content')

<div class="form">
    <div class="container my-100">
        <h1 class="title-page">Modifica il fumetto:
            <span class="title-comic">{{ $comic->title }}</span>
        </h1>
        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="text" name="title" id="title" value="{{$comic->title}}">
            <input type="text" name="description" id="description" value="{{$comic->description}}">
            <input type="text" name="thumb" id="thumb" value="{{$comic->thumb}}">
            <input type="text" name="series" id="series" value="{{$comic->series}}">
            <input type="text" name="price" id="price" value="{{$comic->price}}">
            <input type="date" name="sale_date" id="sale_date" value="{{$comic->sale_date}}">
            <input type="text" name="type" id="type" value="{{$comic->type}}">
            <input type="text" name="artists" id="artists" value="{{$comic->artists}}">
            <input type="text" name="writers" id="writers" value="{{$comic->writers}}">
            <input type="submit" value="Update" id="submit">
        </form>
        <a href="{{ route('comics.index') }}" class="view-gallery">View Gallery</a>
    </div>
</div>

@endsection