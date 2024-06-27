@extends('layouts.app')

@section('content')

<div class="container col-md-9 font-weight-bold my-5">

    <div class="list-group">
        @foreach($alphabet as $letter)

        @php
            $postWithLetter = $posts
                ->filter(fn ($p) => str_starts_with(mb_strtolower($p->title), mb_strtolower($letter)))
        @endphp

        <div class="list-group-item list-group-item-{{count($postWithLetter) > 0 ? 'primary' : 'warning' }}">
            <span class="letter">{{$letter}} : </span>
            <span class="titles">
            @foreach($postWithLetter as $pl)
                <a href="/articles?title={{$pl->title}}">{{$pl->title}}</a> |
                @if($loop->last)
                    <a href="/articles?title={{$pl->title}}">{{$pl->title}}</a>
                @endif
            @endforeach
            </span>
        </div>
        @endforeach
    </div>

</div>

@endsection
