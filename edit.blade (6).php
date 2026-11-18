@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">Edit user</h1>
            <p class="page-intro">Update {{ $user->full_name }}'s details or upload a new profile picture.</p>
        </div>
    </header>
    @include('users._form', ['user' => $user, 'isEdit' => true])
@endsection
