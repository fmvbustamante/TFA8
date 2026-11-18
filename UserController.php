<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->orderBy('username')->get();

        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create', ['user' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:50', Rule::unique('users', 'username')],
            'full_name' => ['required', 'string', 'max:100'],
        ]);

        User::query()->create([
            ...$validated,
            'created_at' => now(),
            'avatar' => null,
        ]);

        return redirect()->route('users.index')->with('status', 'User account created.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => ['required', 'string', 'max:100'],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = [
            'username' => $validated['username'],
            'full_name' => $validated['full_name'],
        ];
        $oldAvatarPath = $user->avatar;
        $newAvatarPath = null;

        if ($request->hasFile('avatar')) {
            $image = Image::fromUpload($request->file('avatar'))
                ->orient()
                ->cover(256, 256)
                ->toWebp()
                ->quality(85);

            $newAvatarPath = 'avatars/'.Str::uuid().'.webp';
            $stored = Storage::disk('public')->put($newAvatarPath, $image->toBytes());

            if (! $stored) {
                return back()
                    ->withErrors(['avatar' => 'The avatar could not be stored. Please try again.'])
                    ->withInput();
            }

            $data['avatar'] = $newAvatarPath;
        }

        $user->update($data);

        if ($newAvatarPath && $oldAvatarPath) {
            Storage::disk('public')->delete($oldAvatarPath);
        }

        return redirect()->route('users.index')->with('status', 'User account updated.');
    }
    public function destroy(\App\Models\User $record): \Illuminate\Http\RedirectResponse
    {
        $record->delete();
        return redirect()->route('users.index')->with('status', 'Record deleted.');
    }
}
