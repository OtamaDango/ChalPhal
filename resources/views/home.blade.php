<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChalPhal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('resources/css/custom.css') }}">
</head>
<style>
    .navbar-brand:hover{
        color:#85868a !important;
        transition:color 0.3s ease;
    }
    .navbar-nav .nav-link:hover{
        background-color:#455b6f;
        color:#000 !important;
        border-radius:5px;
        transition:background-color 0.3s ease;
    }
    .navbar-nav .nav-link{
        transition:background-color 0.3s ease;
    }
    body {
            min-height: 100vh; /* full screen height */
            display: flex;
            flex-direction: column;
        }
    main {
        flex: 1; /* take up remaining space */
    }
    </style>
<body>
    <div class="wrapper">
        <header>
            <nav class = "navbar navbar-expand-lg bg-dark navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand px-2" href="/">ChalPhal</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto" >
                            <li class="nav-item"><a class="nav-link active px-3" href="/">Home</a></li>
                            @auth
                            <li class="nav-item"><a class="nav-link active px-3" href="/dashboard">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link active px-3" href="/profile">Profile</a></li>
                            @endauth
                            <li class="nav-item"><a class="nav-link active px-3" href="/about">About</a></li>
                            <li class="nav-item"><a class= "nav-link active px-3" href="/contact">Contact</a></li>
                            @guest
                            <li class="nav-item"><a class="nav-link active px-3" href="/login">Login</a></li>
                            <li class="nav-item"><a class = "nav-link active px-3" href="/register">Register</a></li>
                            @endguest
                            @auth
                            <li class="nav-item">
                                <form action="/logout" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger px-3" style="display:inline; color:white;">Logout</button>
                                </form>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
        </header>
        </nav>
    </div>
    @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if(request()->is('/'))
    <p>this is home page</p>
    <form action="/create_post" method="post">
        @csrf
        <input type="text" name="post_title" placeholder="Enter post title">
        <input type="text" name="post_content" placeholder="Enter post content">    
        <button type="submit">Submit</button>
    </form>
    @endif
    <main class="py-4">
        @yield('content')
    </main>
    <footer>
        <div class="bg-dark text-white text-center py-3">
            &copy; 2024 ChalPhal. All rights reserved.
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</html>