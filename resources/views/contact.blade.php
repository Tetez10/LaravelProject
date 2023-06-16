@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact</h1>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <form method="POST" action="{{ route('contact.send') }}">
            @csrf
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection
