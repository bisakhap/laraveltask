@extends('welcome')

@section('content')
    <div>
        <h2>Login</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required/>
                @error('email')
                <span class='invalid-feedback'>
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <span class='invalid-feedback'>
                    {{$message}}
                </span>
                @enderror
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection