@extends('layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h1 class="text-center m-3">Admin Dashboard</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/dashboard">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Admins</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Orders</a>
        </li>
    </ul>
    @yield('dashboard_content')
</div>
@endsection
