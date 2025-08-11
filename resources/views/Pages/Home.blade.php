@extends('layouts.app')

@section('title', 'home')

@section('sidebar')
    @include('Components.Sidebar')
@endsection
   
@section('content')
    <h1> hy home page here</h1>
    <p>Welcome to the homepage of my Laravel app.</p>
@endsection