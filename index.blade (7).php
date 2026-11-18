@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">User accounts</h1>
            <p class="page-intro">Staff records retrieved through the User Eloquent model. Edit an account to add or change its avatar.</p>
        </div>
        <a class="button button-primary" href="{{ route('users.create') }}">+ Add user</a>
    </header>

    @if (session('status'))
        <div class="flash-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr><th scope="col">Avatar</th><th scope="col">Username</th><th scope="col">Full name</th><th scope="col">Created</th><th scope="col">Actions</th></tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td><img class="avatar-thumb" src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/avatar-placeholder.svg') }}" alt="Avatar for {{ $user->full_name }}"></td>
                        <td class="cell-primary">{{ $user->username }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td class="cell-muted">{{ $user->created_at }}</td>
                        <td><a class="table-action" href="{{ route('users.edit', $user) }}">Edit</a></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="cell-muted">No users found. Add a user to get started.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
