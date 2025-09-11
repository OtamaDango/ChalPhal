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

                                    {{-- Delete Post (only owner) --}}
                                    @if(auth()->id() === $post->user_id)
                                        <form action="/delete_post/{{$post->post_id}}" method="post" class="d-inline float-end">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete Post</button>
                                        </form>
                                    @endif

                                    {{-- Comments Section --}}
                                    @foreach($post->comments as $comment)
                                        <div class="card mt-2">
                                            <div class="card-body p-2">
                                                <small class="text-muted">
                                                    Posted by <strong>{{ $comment->user->name }}</strong> 
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </small>
                                                <p class="mb-1">{{ $comment->comment_content }}</p>

                                                {{-- Delete Comment (only owner) --}}
                                                @if(auth()->id() === $comment->user_id)
                                                    <form action="/delete_comment/{{$comment->comment_id}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete Comment</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach

                                    {{-- Add Comment Form --}}
                                    <form action="/posts/{{$post->post_id}}/comments" method="POST" class="mt-2">
                                        @csrf
                                        <div class="mb-2">
                                            <input type="text" name="comment_content" class="form-control" placeholder="Add a comment..." required>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary">Comment</button>
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
