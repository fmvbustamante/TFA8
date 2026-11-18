@extends('layouts.app') @section('title','Register') @section('content')
<h1 class="page-title">Create account</h1><section class="form-panel"><form method="POST" action="{{ route('register.store') }}" class="record-form">@csrf
@foreach(['full_name'=>'Full name','username'=>'Username','email'=>'Email'] as $field=>$label)<label>{{ $label }}<input name="{{ $field }}" value="{{ old($field) }}" @if($field==='email') type="email" @else type="text" @endif required></label>@error($field)<p class="field-error">{{ $message }}</p>@enderror @endforeach
<label>Password<input name="password" type="password" required></label>@error('password')<p class="field-error">{{ $message }}</p>@enderror
<label>Confirm password<input name="password_confirmation" type="password" required></label><button class="button button-primary">Register</button><a href="{{ route('login') }}">Log in</a></form></section>@endsection
