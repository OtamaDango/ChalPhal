@extends('home')
@section('content')
<h1>This is profile section!</h1>
<h2>Welcome! {{auth()->user()->name}}</h2>
@endsection