<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();

        // truncate related tables
        \App\User::truncate();
    	foreach (config('permission.table_names') as $table) {
    		\DB::table($table)->truncate();
    	}

        Schema::enableForeignKeyConstraints();

        // Creating roles
        $roles = [
        	'developer',
        	'administrator',
        	'user',
        ];

        // Create default user for the application and their ACL
        foreach ($roles as $role) {
        	$user = \App\User::create([
        		'name' => title_case($role),
        		'email' => $role . '@app.com',
        		'password' => bcrypt('password'),
        	]);
        	Role::create(['name' => $role]);
        	$user->assignRole($role);
        }
		
		// Creating permissions
		$modules = [
			'post' => [
				'developer',
	        	'administrator',
	        	'user',
			], 
			'user' => [
				'developer',
	        	'administrator',
			], 
		];

		$actions = [
			'create', 'read', 'update', 'delete',
		];

		foreach ($modules as $module => $roles) {
			foreach ($actions as $action) {
				$permission = $action . '_' . $module;
				Permission::create(['name' => $permission]);
				foreach ($roles as $role) {
					// Attach permissions to roles 
					Role::where('name', $role)->first()->givePermissionTo($permission);
				}
			}
		}
    }
}
