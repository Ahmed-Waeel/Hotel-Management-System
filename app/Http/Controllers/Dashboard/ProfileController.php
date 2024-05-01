<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('dashboard.profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'profile_picture' => ['nullable', 'image', 'max:1024'],
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(Admin::class)->ignore($this->user()->id)],
            'password' => ['nullable', 'confirmed', 'min:8', Password::defaults()],
        ]);

        $user = $request->user();
        $user->fill($request->only('name', 'email'));

        if ($request->filled('password')) {
            $user->password = $request->get('password');
        }

        if ($request->hasFile('profile_picture')) {
            $user->profile_picture = upload_file($request->file('profile_picture'), 'dashboard/profile_pictures');
        }

        $user->save();

        return $this->updated(__('Profile'), 'dashboard.profile.edit');
    }
}
