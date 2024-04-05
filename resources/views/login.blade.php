<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title>{{ $tittle }}</title>
</head>

<body>
        @if (session()->has('loginEror'))
        <div class="alert alert-warning alert-dismissible fade show alert-close" role="alert">
            {{ session('loginEror') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    <form action="/login" class="login-card justify-content-center row" method="POST">
        @csrf
        <h1 class="tittle">COMPANY NAME</h1>
        <h2 class="login-text">{{ $tittle }}</h2>
        <div class="rectangle row align-self-end my-5">
            <h6>Username</h6>
            <div class="rectangle- align-self-start form-floating ps-1">
                <input type="username" class="form-control" id="username" placeholder="Username" name="username"
                    autofocus required>
                <label class="ps-4" for="username">Username</label>
            </div>
            <h6 class="mt-2">Password</h6>
            <div class="rectangle- align-self-center form-floating ps-1">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                    required>
                <label class="ps-4" for="password">Password</label>
            </div>
            <button class="btn rectangle- align-self-end mt-3" type="submit" name="login">Sign in</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
