<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <title>MVC</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php use Core\Application; ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">STL MVC BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @if (Application::isGuest()): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="/stl-admin/login">Login</a>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="/stl-admin/article/create">
                                New Article
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/stl-admin">
                                Dashboard
                            </a>
                        </li>

                        <li class="nav-item active">
                            <form action="/stl-admin/logout" method="POST">
                            <button class="btn text-white">
                               {{ Application::$app->user->name }} (Logout)
                            </button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">

        <div class="session__message">

        @if(Application::$app->session->getFlash('info'))
            <div class="alert alert-info text-center">
                <p class="m-0"> {{Application::$app->session->getFlash('info')}} </p>
            </div>
        @endif

        </div>

        @yield('content')
    </div>

    <div class="footer bg-dark text-white mt-auto">
        <div class="container text-center py-3">
            <p class="m-0 pt-1">STL MVC BLOG</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            setTimeout(() => {
                $(".session__message").hide();
            }, 3000)

        });
    </script>
    @yield('tiny')
</body>

</html>
