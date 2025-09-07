@extends('home')

@section('content')
    @auth
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            <p>{{ auth()->user()->name }}, You are logged in!</p>

                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    @guest
        <p class="text-center mt-5">You are not logged in. <a href="{{ url('/login') }}">Login here</a></p>
    @endguest
@endsection
