@extends('home')

    @section('content')
    @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="containter mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action='/login' method="post">
                    @csrf
                   <div class="mb-3">
                    <input type="email" name="login_email" placeholder="Enter your Email" class="form-control" required>
                   </div>
                   <div class="mb-3">
                    <input type="password" name="login_password" placeholder="Password" class="form-control" required>
                   </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    </div>
    @endsection