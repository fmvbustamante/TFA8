<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::query()->orderBy('full_name')->get();

        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create', ['customer' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        Customer::query()->create([
            ...$validated,
            'phone' => $validated['phone'] ?? null,
            'created_at' => now(),
        ]);

        return redirect()->route('customers.index')->with('status', 'Customer account created.');
    }

    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $customer->update([
            ...$validated,
            'phone' => $validated['phone'] ?? null,
        ]);

        return redirect()->route('customers.index')->with('status', 'Customer account updated.');
    }
    public function destroy(\App\Models\Customer $record): \Illuminate\Http\RedirectResponse
    {
        $record->delete();
        return redirect()->route('customers.index')->with('status', 'Record deleted.');
    }
}
