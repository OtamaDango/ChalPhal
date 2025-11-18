@extends('home')

@section('content')
@auth
<div class="container py-3 text-white">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-8 col-sm-11">

            <h4 class="mb-3 text-white">Welcome to ChalPhal, {{ auth()->user()->name }}!</h4>

            <div class="posts-wrapper">
                @forelse($posts as $post)
                    <div class="card post-card mb-4" style="background:#2a2a2a; border:none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h6 class="fw-bold text-white mb-1">{{ $post->title }}</h6>
                                    <small class="text-light fw-semibold">
                                        Posted {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </div>

                                @if(auth()->id() === $post->user_id)
                                    <form action="/delete_post/{{ $post->post_id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger text-white">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>

                            <p class="mt-2 mb-3 text-white" style="font-size:1rem; line-height:1.5;">
                                {{ $post->content }}
                            </p>

                            {{-- Toggle Comments Button --}}
                            <button class="btn btn-sm btn-outline-info mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#comments-{{ $post->post_id }}" aria-expanded="false" aria-controls="comments-{{ $post->post_id }}">
                                Comments ({{ $post->comments->count() }})
                            </button>

                            {{-- Collapsible Comments --}}
                            <div class="collapse" id="comments-{{ $post->post_id }}">
                                <div style="max-height:300px; overflow-y:auto;">
                                    @foreach($post->comments as $comment)
                                        <div class="p-2 my-2" style="background:#1a1a1a; border-radius:6px; border:none;">
                                            <small class="text-light d-block mb-1">
                                                <strong>{{ $comment->user->name }}</strong> · {{ $comment->created_at->diffForHumans() }}
                                            </small>
                                            <p class="mb-2">{{ $comment->comment_content }}</p>

                                            @if(auth()->id() === $comment->user_id)
                                                <form action="/delete_comment/{{ $comment->comment_id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger text-white">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                {{-- Add Comment Form --}}
                                @auth
                                    <form action="/post/{{ $post->post_id }}/comment" method="POST" class="mt-2">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="comment_content" class="form-control" style="background:#262626; border:1px solid #444; color:white;" placeholder="Write a comment..." required>
                                            <button type="submit" class="btn btn-primary btn-sm">Comment</button>
                                        </div>
                                    </form>
                                @endauth
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="text-center text-light">No posts yet.</p>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endauth

@guest
<p class="text-center mt-5 text-white">
    You are not logged in. <a href="{{ url('/login') }}" class="text-info">Login here</a>
</p>
@endguest
@endsection
