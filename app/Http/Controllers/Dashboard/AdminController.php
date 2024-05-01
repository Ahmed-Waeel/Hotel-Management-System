<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name');

        return view('dashboard.admins.create', [
            'roles' => $roles,
        ]);return view('dashboard.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => ['required', 'min:8', 'confirmed', Password::defaults()],
            'role' => 'required|exists:roles,name',
        ]);

        $admin = Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $request->password,
        ]);

        $admin->assignRole($validated['role']);

        return $this->created(__('Admin'), 'dashboard.admins.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $roles = Role::pluck('name', 'name');

        return view('dashboard.admins.edit', [
            'admin' => $admin,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'role' => 'required|exists:roles,name',
        ]);

        $admin->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        // Clear cache to refresh permissions
        cache()->flush();

        $admin->syncRoles($validated['role']);

        return $this->updated(__('Admin'), 'dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return $this->deleted(__('Admin'), 'dashboard.admins.index');
    }
}
