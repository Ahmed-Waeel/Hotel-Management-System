<?php

namespace App\Http\Controllers\Website;

use App\Http\Requests\Website\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\CanUploadFile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use CanUploadFile;

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('website.profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        return $this->updated(__('Profile'), 'website.profile.edit');
    }
}
