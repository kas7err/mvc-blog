@extends('layouts.app')

@section('content')

    <div class="col-md-6 mx-auto">
        <form action="/stl-admin/login" method="post" novalidate>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" >

                @if(isset($errors['email']))
                <div class="error-msg">
                    @foreach($errors['email'] as $err)
                    <p class="text-danger font-italic">{{$err}}</p>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" >
                @if(isset($errors['password']))
                <div class="error-msg">
                    @foreach($errors['password'] as $err)
                    <p class="text-danger font-italic">{{$err}}</p>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>

        </form>
    </div>
@endsection
