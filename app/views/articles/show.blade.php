@extends('layouts.app')

@section('content')
<h1>{{$article->title}}</h1>
<div class="content"> {!! $article->description !!} </div>
@endsection
