<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div style="max-width: 400px; margin: 0 auto;">
    <div class="card">
        <h2 style="text-align: center; margin-bottom: 1.5rem;">Admin Login</h2>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn" style="width: 100%;">Login</button>
        </form>
    </div>
</div>
@endsection