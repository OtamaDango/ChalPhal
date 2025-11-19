<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ChalPhal - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #1e1e1e;
            color: #e5e5e5;
            font-family: "Inter", sans-serif;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .navbar-nav .nav-link:hover {
            background-color: #3b3b3b;
            border-radius: 6px;
            color: #fff !important;
            transition: 0.2s;
        }

        .posts-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-top: 10px;
        }

        .posts-scroll {
            flex: 1;
            overflow-y: auto;
            padding-right: 5px;
            padding-bottom: 10px;
        }

        .post-card,
        .comment-card,
        .card,
        .card-body {
            background: transparent ;
            border: none !important;
            box-shadow: none !important;
        }

        .card-text,
        .post-card *,
        .comment-card *,
        .card *,
        .card-body * {
            color: #e5e5e5 !important;
        }

        input.form-control {
            background-color: #2f2f2f !important;
            border: 1px solid #555 !important;
            color: #fff !important;
        }

        input.form-control::placeholder {
            color: #cccccc !important;
        }

        .btn-primary {
            background-color: #4a7bff !important;
            border-color: #4a7bff !important;
        }

        .btn-primary:hover {
            background-color: #3c66d9 !important;
        }

        .btn-outline-info {
            color: #4a7bff;
            border-color: #4a7bff;
        }

        .btn-outline-info:hover {
            background-color: #4a7bff;
            color: #fff;
        }

        footer {
            background-color: #111 !important;
            padding: 12px 0;
            text-align: center;
        }

        @media (max-width: 767px) {
            .posts-scroll {
                padding-bottom: 80px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand px-2" href="{{ url('/') }}">ChalPhal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>

                @auth
                    <li class="nav-item"><a class="nav-link px-3" href="{{ url('/dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ url('/create_post') }}">Create-Post</a></li>
                @endauth

                <li class="nav-item"><a class="nav-link px-3" href="{{ url('/about') }}">About</a></li>

                @guest
                    <li class="nav-item"><a class="nav-link px-3" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="{{ url('/register') }}">Register</a></li>
                @endguest

                @auth
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger px-3 ms-3">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container py-3 content-area">

        @if(session('status'))
            <div class="alert alert-success text-center mb-3">
                {{ session('status') }}
            </div>
        @endif

        {{-- This is where page-specific content goes --}}
        @yield('content')

    </div>
</main>

<footer>
    © {{ date('Y') }} ChalPhal. All rights reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
