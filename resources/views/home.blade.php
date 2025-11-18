@extends('layouts.app')

@section('content')

@section('content')
    @isset($posts)
        <div class="posts-wrapper">
            <div class="posts-scroll">
                @forelse($posts as $post)
                    <div class="card post-card mb-4" style="background:#2a2a2a; border:none;">
                        <div class="card-body">
                            {{-- Post Header --}}
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <small class="text-muted">
                                        Posted by <strong>{{ $post->user->name }}</strong> · {{ $post->created_at->diffForHumans() }}
                                    </small>
                                    <h6 class="fw-bold text-white mb-1">{{ $post->title }}</h6>
                                </div>

                                @if(auth()->id() === $post->user_id)
                                    <form action="{{ url('/delete_post/'.$post->post_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger text-white">Delete</button>
                                    </form>
                                @endif
                            </div>

                            {{-- Post Content --}}
                            <p class="mt-2 mb-3 text-white">{{ $post->content }}</p>

                            {{-- Toggle Comments --}}
                            <button class="btn btn-sm btn-outline-info mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#comments-{{ $post->post_id }}">
                                Comments ({{ $post->comments->count() }})
                            </button>

                            <div class="collapse" id="comments-{{ $post->post_id }}">
                                <div style="max-height:300px; overflow-y:auto;">
                                    @foreach($post->comments as $comment)
                                        <div class="p-2 my-2" style="background:#1a1a1a; border-radius:6px;">
                                            <small class="text-light d-block mb-1">
                                                <strong>{{ $comment->user->name }}</strong> · {{ $comment->created_at->diffForHumans() }}
                                            </small>
                                            <p class="mb-2">{{ $comment->comment_content }}</p>

                                            @if(auth()->id() === $comment->user_id)
                                                <form action="{{ url('/delete_comment/'.$comment->comment_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger text-white">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                @auth
                                {{-- Add Comment Form --}}
                                <form action="{{ url('/post/'.$post->post_id.'/comment') }}" method="POST" class="mt-2">
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
    @endisset
@endsection
