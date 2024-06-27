<?php

use App\Models\Post;

?>
@extends('layouts.app')

@section('content')

<div class="container col-md-9 font-weight-bold my-5">

    <div class="list-group">
        @foreach(Post::cachedAlphabetTitles() as $letter => $post)

        <div class="list-group-item list-group-item-{{count($post) > 0 ? 'primary' : 'warning' }}">
            <span class="letter">{{$letter}} : </span>
            <span class="titles">
            @foreach($post as $p)
                <a href="/articles?title={{$p['title']}}">{{$p['title']}}</a>
                @if(!$loop->last) | @endif
            @endforeach
            </span>
        </div>

        @endforeach
    </div>

</div>

@endsection
