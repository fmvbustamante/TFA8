@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">Customer accounts</h1>
            <p class="page-intro">Customer records retrieved through the Customer Eloquent model.</p>
        </div>
        <a class="button button-primary" href="{{ route('customers.create') }}">+ Add customer</a>
    </header>

    @if (session('status'))
        <div class="flash-success" role="status">{{ session('status') }}</div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr><th scope="col">#</th><th scope="col">Full name</th><th scope="col">Email address</th><th scope="col">Phone</th><th scope="col">Actions</th></tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td class="cell-muted">{{ $customer->id }}</td>
                        <td class="cell-primary">{{ $customer->full_name }}</td>
                        <td><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                        <td class="cell-muted">{{ $customer->phone ?: '—' }}</td>
                        <td><a class="table-action" href="{{ route('customers.edit', $customer) }}">Edit</a></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="cell-muted">No customers found. Add a customer to get started.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
