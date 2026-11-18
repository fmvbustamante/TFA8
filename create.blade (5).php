@extends('layouts.app')

@section('title', 'Add User')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">Add user</h1>
            <p class="page-intro">Create a POS staff account. The username must be unique.</p>
        </div>
    </header>
    @include('users._form', ['user' => $user, 'isEdit' => false])
@endsection
