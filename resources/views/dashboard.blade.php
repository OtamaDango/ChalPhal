@extends('home')

@section('content')
    @auth
        <div class="container mt-3">
            <div class="row">
                <!-- Posts Section (LEFT) -->
                <div class="col-md-6 border-end">
                    <h4 class="mb-3">{{ auth()->user()->name }}'s Posts</h4>
                    <div class="p-3 bg-light rounded" style="height: 70vh; overflow-y: auto;">
                        @forelse($posts as $post)
                            <div class="card mb-2 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $post->title }}</h6>
                                    <p class="card-text">{{ $post->content }}</p>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                    <form action="/delete_post/{{$post->post_id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger float-end">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p>No posts yet.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Chat Section (RIGHT) -->
                <div class="col-md-6">
                    <h4 class="mb-3">Chat</h4>
                    <div class="p-3 bg-light rounded" style="height: 70vh; overflow-y: auto;">
                        <p>Chat messages will appear here...</p>
                    </div>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type a message...">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth

    @guest
        <p class="text-center mt-5">
            You are not logged in. <a href="{{ url('/login') }}">Login here</a>
        </p>
    @endguest
@endsection
