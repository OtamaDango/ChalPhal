@extends('home')

    @section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action='/register' method="post">
                    @csrf
                   <div class="mb-3">
                    <input type="text" name="name" placeholder="Enter your Name" class="form-control" required>
                   </div>
                   <div class="mb-3">
                    <input type="email" name="email" placeholder="Enter your Email" class="form-control" required>
                   </div>
                   <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                   </div>
                   <div class="mb-3">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
                   </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
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
    </div>
       
    @endsection