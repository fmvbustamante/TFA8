<section class="form-panel">
    <form method="POST" action="{{ $isEdit ? route('users.update', $user) : route('users.store') }}" class="record-form" @if ($isEdit) enctype="multipart/form-data" @endif>
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="form-field">
            <label for="username">Username <span class="required-mark">*</span></label>
            <input id="username" name="username" type="text" value="{{ old('username', $user?->username ?? '') }}" maxlength="50" required autocomplete="username">
            @error('username') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        <div class="form-field">
            <label for="full_name">Full name <span class="required-mark">*</span></label>
            <input id="full_name" name="full_name" type="text" value="{{ old('full_name', $user?->full_name ?? '') }}" maxlength="100" required autocomplete="name">
            @error('full_name') <span class="field-error">{{ $message }}</span> @enderror
        </div>

        @if ($isEdit)
            <div class="form-field">
                <label for="avatar">Profile picture</label>
                <div class="avatar-upload-row">
                    <img class="avatar-preview" src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/avatar-placeholder.svg') }}" alt="Current avatar for {{ $user->full_name }}">
                    <div>
                        <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png,image/webp">
                        <p class="field-help">Choose JPG, PNG, or WebP. Maximum file size: 2 MB. The saved copy is cropped to a 256 × 256 WebP thumbnail.</p>
                        @error('avatar') <span class="field-error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        @endif

        <div class="form-actions">
            <button class="button button-primary" type="submit">{{ $isEdit ? 'Save changes' : 'Create user' }}</button>
            <a class="button button-secondary" href="{{ route('users.index') }}">Cancel</a>
        </div>
    </form>
</section>
