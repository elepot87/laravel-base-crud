@extends('layouts.main')

@section('head-title', 'Comics | DC Comics' )

@section('main-content')
<div class="products">
    @if(session('delete'))
    <div class="alert">
        <strong>{{session('delete')}}</strong> eliminato con successo.
    </div>
    @endif
    <div class="container flex">
        <ul class="container-comics flex no-list-style">
            @foreach ($comics as $comic)
            <li>
                <div class="card">
                    <a href="{{ route ('comics.show', $comic->slug) }}">
                        <div class="container-img">
                            <img src="{{ $comic->thumb }}" alt="{{ $comic->thumb }}" />
                        </div>
                        <div class="title-comics">
                            {{ $comic->series }}
                        </div>
                    </a>
                </div>
                <div class="container-cta">
                    <a class="btn edit" href="{{ route ('comics.edit', $comic->id)}}">
                        Edit
                    </a>
                    <form action="{{ route('comics.destroy', $comic->id) }}" method="post" class="form-delete">
                        <input type="submit" class="btn delete" value='Delete' id="delete">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection