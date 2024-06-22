@extends('layouts.app')

@section('content')

<div class="container col-md-9 font-weight-bold my-5">
    <p> Направете административен панел при който достъпът до него да бъде ограничен и да изисква автентикация на администратора (потребител и парола). </p>
    <p> Възможност за добавяне/редактиране/изтриване на статия с текстов редактор по избор (tinymce, ckeditor и т.н.). </p>
    <p> Страница в която се визуализира списък с всички статии, като трябва да бъдат отделени по азбучен ред. На първи ред заглавия започващи с А, на втори ред с Б и т.н. </p>
    <p> Заължително условие: Да се приложи MVC архитектура, като не се използва готов framework. </p>

    <br>

    <div class="list-posts d-flex">
        @foreach($posts as $p)
        <div class="card mx-1" style="width: 18rem;">
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
