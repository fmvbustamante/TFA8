@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">Edit customer</h1>
            <p class="page-intro">Update the details for {{ $customer->full_name }}.</p>
        </div>
    </header>
    @include('customers._form', ['customer' => $customer])
@endsection
