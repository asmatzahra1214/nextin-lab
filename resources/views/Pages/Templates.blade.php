@extends('layouts.app')

@section('title', 'template')

@section('sidebar')
    @include('Components.Sidebar')
@endsection

@section('content')
    <h1>Hy, template page here</h1>
    <p>Welcome to the templatepage of my Laravel app.</p>
@endsection