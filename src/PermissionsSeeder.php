<?php

namespace Creode\PermissionsSeeder;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

abstract class PermissionsSeeder extends Seeder
{
    /**
     * Determines if we should give super admin permissions to this group.
     *
     * @var bool
     */
    protected $giveSuperAdminPermissions = true;

    /**
     * Determines if we should create a role for this group.
     *
     * @var bool
     */
    protected $shouldCreateRole = true;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionKeys = $this->getPermissions();

        $assetPermissions = [];
        foreach ($permissionKeys as $permission) {
            $permissionName = $permission.$this->getPermissionGroup();
            $assetPermissions[] = Permission::create([
                'group' => $this->getPermissionGroup(),
                'name' => $permissionName,
            ]);
        }

        // Give super admin permissions.
        if ($this->giveSuperAdminPermissions) {
            $adminRole = Role::firstOrCreate(['name' => 'super-admin']);
            $adminRole->givePermissionTo($assetPermissions);
        }

        // Create an Asset-Manager Role and assign some Permissions.
        $assetRole = Role::create(['name' => $this->getRoleName()]);
        $assetRole->givePermissionTo($assetPermissions);
    }

    /**
     * Gets the permission keys to create.
     */
    protected function getPermissions(): array
    {
        return [
            'viewAny',
            'view',
            'update',
            'create',
            'delete',
            'destroy',
        ];
    }

    /**
     * Gets the permission group to use.
     *
     * @return void
     */
    abstract protected function getPermissionGroup(): string;

    /**
     * Gets the role name to use.
     */
    protected function getRoleName(): string
    {
        return strtolower($this->getPermissionGroup().'-manager');
    }
}
