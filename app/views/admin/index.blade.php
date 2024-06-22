@extends('layouts.app')

@section('content')

<h2>Dashboard</h2>
<br>
<a href="/stl-admin/article/create" class="btn btn-success px-4">New Post</a>
<div class="container">
    @if(count($posts) > 0)
    <table class="table vertical-align my-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
            <tr>
                <th class="align-middle" scope="row">{{$p->id}}</th>
                <td class="align-middle"><a href="/articles?title={{$p->title}}">{{$p->title}}</a></td>
                <td class="align-middle">{{$p->created_at}}</td>
                <td class="align-middle">{{$p->updated_at}}</td>
                <td><a href="/stl-admin/article/update?id={{$p->id}}" class="btn p-0 px-4 py-1 btn-primary">Edit</a></td>
                <td>
                    <form action="/stl-admin/article/delete?id={{$p->id}}" method="POST">
                        <button class="btn p-0 px-4 py-1 btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
