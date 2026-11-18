@extends('layouts.app')

@section('title', 'About')

@section('content')
    <header class="page-head">
        <div>
            <h1 class="page-title">About SimplePOS</h1>
            <p class="page-intro">This activity upgrades the TFA5 Laravel POS directory from static arrays to a database-backed application using migrations, seeders, and Eloquent.</p>
        </div>
    </header>

    <section class="content-panel">
        <h2>How a page request works</h2>
        <p>When someone opens an account page, Laravel matches the URL to a route. The route calls a controller method, the controller asks an Eloquent model for records, and the Blade view renders those records.</p>
        <div class="step-list">
            <div class="step"><span class="step-number">1</span><p><strong>Route:</strong> <code>routes/web.php</code> maps URLs such as <code>/customers</code> to controller actions.</p></div>
            <div class="step"><span class="step-number">2</span><p><strong>Model:</strong> <code>Customer</code> and <code>User</code> represent their database tables and retrieve records through Eloquent.</p></div>
            <div class="step"><span class="step-number">3</span><p><strong>View:</strong> Blade templates use <code>@foreach</code> to display each record passed by a controller.</p></div>
        </div>
    </section>

    <section class="content-panel">
        <h2>Project scope</h2>
        <p>The Home, About, Customers, and Users pages remain connected through the navigation bar. Migrations create the TFA2-compatible customers and users tables, and seeders add five sample records to each. The account pages now read from those tables through Eloquent.</p>
    </section>
@endsection
