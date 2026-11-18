@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <span class="eyebrow">IT0049 · Laravel and Eloquent</span>
        <h1>A simple POS starting point, now backed by a database.</h1>
        <p>Explore a four-page Laravel application where migrations define the schema, seeders provide sample records, and Eloquent retrieves customer and staff accounts.</p>
        <a class="button button-light" href="{{ route('customers.index') }}">View customer accounts <span aria-hidden="true">&nbsp;→</span></a>
        <a class="button button-outline" href="{{ route('about') }}">About this project</a>
    </section>

    <div class="section-heading">
        <div>
            <h2>Explore the application</h2>
            <p>Each page has a clear role in the Laravel MVC flow.</p>
        </div>
    </div>
    <section class="card-grid" aria-label="Application pages">
        <a class="card" href="{{ route('about') }}">
            <span class="card-icon">01</span>
            <h3>About</h3>
            <p>See how routes, controllers, Eloquent models, and Blade templates work together.</p>
        </a>
        <a class="card" href="{{ route('customers.index') }}">
            <span class="card-icon">02</span>
            <h3>Customer accounts</h3>
            <p>Browse customer records retrieved from SQLite through the Customer model.</p>
        </a>
        <a class="card" href="{{ route('users.index') }}">
            <span class="card-icon">03</span>
            <h3>User accounts</h3>
            <p>Browse POS staff accounts retrieved from SQLite through the User model.</p>
        </a>
    </section>
@endsection
