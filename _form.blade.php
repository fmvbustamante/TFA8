<section class="form-panel">
    <form method="POST" action="{{ $customer ? route('customers.update', $customer) : route('customers.store') }}" class="record-form">
        @csrf
        @if ($customer)
            @method('PUT')
        @endif

        <div class="form-field">
            <label for="full_name">Full name <span class="required-mark">*</span></label>
            <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $customer?->full_name ?? '') }}" maxlength="100" required autocomplete="name">
            @error('full_name') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-field">
            <label for="email">Email address <span class="required-mark">*</span></label>
            <input id="email" name="email" type="email" value="{{ old('email', $customer?->email ?? '') }}" maxlength="100" required autocomplete="email">
            @error('email') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-field">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" type="tel" value="{{ old('phone', $customer?->phone ?? '') }}" maxlength="20" autocomplete="tel">
            @error('phone') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">{{ $customer ? 'Save changes' : 'Create customer' }}</button>
            <a class="button button-secondary" href="{{ route('customers.index') }}">Cancel</a>
        </div>
    </form>
</section>
