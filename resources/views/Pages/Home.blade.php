@extends('layouts.app')

@section('title', 'Home')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
    <h1>Hy, home page here</h1>
    <p>Welcome to the homepage of my Laravel app.</p>
@endsection
