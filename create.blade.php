@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">Add customer</h1>
            <p class="page-intro">Enter the customer details. Required fields are checked before saving.</p>
        </div>
    </header>
    @include('customers._form', ['customer' => $customer])
@endsection
