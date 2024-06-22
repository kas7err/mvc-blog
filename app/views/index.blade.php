@extends('layouts.app')

@section('content')

<div class="container col-md-9 font-weight-bold my-5">

    <div class="list-posts row d-flex">
        @foreach($posts as $p)
        <div class="card mx-2 my-2" style="width: 15rem;">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6c757d"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg>

          <div class="card-body  d-flex flex-column">
            <h4 class="card-title text-bold">{{$p->title}}</h4>
            <a href="/articles?title={{$p->title}}" class="btn btn-primary mt-auto">View</a>
          </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
