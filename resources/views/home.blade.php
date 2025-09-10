<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChalPhal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand:hover {
            color:#85868a !important;
            transition:color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            background-color:#455b6f;
            color:#000 !important;
            border-radius:5px;
            transition:background-color 0.3s ease;
        }
        .navbar-nav .nav-link {
            transition:background-color 0.3s ease;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand px-2" href="/">ChalPhal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active px-3" href="/">Home</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link active px-3" href="/dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active px-3" href="/profile">Profile</a></li>
                    @endauth
                    <li class="nav-item"><a class="nav-link active px-3" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link active px-3" href="/contact">Contact</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link active px-3" href="/login">Login</a></li>
                        <li class="nav-item"><a class="nav-link active px-3" href="/register">Register</a></li>
                    @endguest
                    @auth
                        <li class="nav-item mx-auto" >
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger px-3" style="color:white;">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @if(request()->is('/'))
    {{-- Status message --}}
    @if(session('status'))
        <div class="alert alert-success text-center m-3">{{ session('status') }}</div>
    @endif

    <main class="container my-4">
        <h2 class="text-center mb-4">Welcome to ChalPhal</h2>

        {{-- Post creation form (only for logged-in users) --}}
        @auth
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Create a Post</h5>
                    <form action="/create_post" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="post_title" class="form-control" placeholder="Enter post title" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="post_content" class="form-control" rows="3" placeholder="Write something..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Post</button>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center">
                <a href="/login" class="btn btn-primary btn-sm">Login</a> or 
                <a href="/register" class="btn btn-success btn-sm">Register</a> 
                to create a post.
            </div>
        @endauth

        {{-- Show posts only if $posts exists --}}
        @isset($posts)
            <h4 class="mb-3">All Posts</h4>
            <div class="p-3 bg-light rounded" style="height: 70vh; overflow-y: auto;">
                @forelse($posts as $post)
                    <div class="card mb-2 shadow-sm">
                        <div class="card-body">
                            <h6 class="card-title fw-bold">{{ $post->title }}</h6>
                            <p class="card-text">{{ $post->content }}</p>
                            <small class="text-muted">
                                Posted by <strong>{{ $post->user->name }}</strong> 
                                {{ $post->created_at->diffForHumans() }}
                            </small>
                            @if(auth()->check())
                                <form action="/comment" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="comment_content" class="form-control" placeholder="Add a comment..." required>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary float-start">Comment</button>
                                </form>
                            @endif
                            {{-- Delete button only for owner --}}
                            <form action="/delete_post/{{$post->post_id}}" method="post" class="d-inline">
                            @if(auth()->check() && auth()->id() === $post->user_id)
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger float-end">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>No posts yet.</p>
                @endforelse
            </div>
        @endisset
    </main>
    @endif
    <main class="py-4">
        @yield('content')
    </main>
    {{-- Footer --}}
    <footer>
        <div class="bg-dark text-white text-center py-3">
            &copy; 2024 ChalPhal. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
