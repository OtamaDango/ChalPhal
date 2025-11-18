@extends('home')

@section('content')
    @auth
        <div class="card mb-4" style="background:#1e1e1e; border:none; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.3);">
            <div class="card-body">
                <h5 class="card-title text-white">Create a Post</h5>
                <form action="/create_post" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="post_title" 
                               class="form-control" 
                               placeholder="Enter post title" 
                               style="background:#262626; border:1px solid #444; color:white;" 
                               required>
                    </div>
                    <div class="mb-3">
                        <textarea name="post_content" 
                                  class="form-control" 
                                  rows="3" 
                                  placeholder="Write something..." 
                                  style="background:#262626; border:1px solid #444; color:white;" 
                                  required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Post</button>
                </form>
            </div>
        </div>
    @endauth
@endsection
