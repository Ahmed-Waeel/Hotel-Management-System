<?php

namespace Database\Seeders;

use App\Http\Middleware\Dashboard\RoutePermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach ($this->getPermissions() as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());
        Role::create(['name' => 'employee'])->givePermissionTo();
    }

    /**
     * Get the permissions.
     */
    private function getPermissions()
    {
        $routes = collect(Route::getRoutes()->getRoutes());

        $routes = $routes->filter(function ($route) {
            if (! $route->getName()) {
                return false;
            }

            if (! in_array('GET', $route->methods()) && ! in_array('DELETE', $route->methods())) {
                return false;
            }

            return collect(Route::gatherRouteMiddleware($route))->contains(RoutePermission::class);
        });

        return $routes->map(fn ($route) => $route->getName())->values()->toArray();
    }
}
