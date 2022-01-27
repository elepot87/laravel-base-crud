@extends('layouts.main')

@section('head-title', 'Comics | DC Comics' )

@section('main-content')
<div class="form">
    <div class="container my-100">
        <h1 class="title-page">Modifica un fumetto</h1>
        <form action="{{ route('comics.update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" id="title" placeholder="Titolo fumetto">
            <input type="text" name="description" id="description" placeholder="Descrizione">
            <input type="text" name="thumb" id="thumb" placeholder="Thumb per fumetto">
            <input type="text" name="series" id="series" placeholder="Serie fumetto">
            <input type="text" name="price" id="price" placeholder="Prezzo">
            <input type="date" name="sale_date" id="sale_date" placeholder="Data di uscita">
            <input type="text" name="type" id="type" placeholder="Tipologia">
            <input type="text" name="artists" id="artists" placeholder="Artists">
            <input type="text" name="writers" id="writers" placeholder="Writers">
            <input type="submit" value="Invia">
        </form>
    </div>
</div>

@endsection