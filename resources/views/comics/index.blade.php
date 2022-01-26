@extends('layouts.main')

@section('head-title', 'Comics | DC Comics' )

@section('main-content')
<div class="products">
    <div class="container flex">
        <ul class="container-comics flex no-list-style">
            <li>
                <div class="card">
                    <a href="#">
                        <div class="container-img">

                        </div>
                        <div class="title-comics">

                        </div>
                    </a>
                </div>
            </li>

        </ul>
        <button class="loader">Load more</button>
    </div>
</div>

@endsection