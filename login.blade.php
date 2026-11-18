@extends('layouts.app') @section('title','Log in') @section('content')
<h1 class="page-title">Log in</h1><section class="form-panel"><form method="POST" action="{{ route('login.store') }}" class="record-form">@csrf
<label>Email <input name="email" type="email" value="{{ old('email') }}" required autofocus></label>@error('email')<p class="field-error">{{ $message }}</p>@enderror
<label>Password <input name="password" type="password" required></label>@error('password')<p class="field-error">{{ $message }}</p>@enderror
<label><input type="checkbox" name="remember"> Remember me</label><button class="button button-primary">Log in</button><a href="{{ route('register') }}">Create an account</a></form></section>@endsection
