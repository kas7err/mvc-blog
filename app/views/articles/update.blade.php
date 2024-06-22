@extends('layouts.app')

@section('content')
<div class="dashboard">

<h1 class="my-4"> DASHBOARD </h1>
<form method="post" action="/stl-admin/article/update">

    <input type="hidden" name="id" value="{{$post->id}}">
    <div class="form-group">
        <label for="title">Title</label><br>
        <input type="text" name="title" id="" value="{{$post->title}}">

        @if(isset($errors['title']))
        <div class="error-msg pt-2">
            @foreach($errors['title'] as $err)
            <p class="text-danger font-italic">{{$err}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="tinyeditor" name="description">{{$post->description}}</textarea>

        @if(isset($errors['description']))
        <div class="error-msg pt-2">
            @foreach($errors['description'] as $err)
            <p class="text-danger font-italic">{{$err}}</p>
            @endforeach
        </div>
        @endif
    </div>

    <button>Submit</button>

</form>

</div>
@endsection

@section('tiny')
<script src="https://cdn.tiny.cloud/1/{{$_ENV['TINY_MCE_KEY']}}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#tinyeditor',
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>
@endsection
