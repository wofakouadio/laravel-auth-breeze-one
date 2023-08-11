<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Administrator', 'slug' => 'Super Admin'],
            ['name' => 'Administrator', 'slug' => 'Admin'],
            ['name' => 'Sales', 'slug' => 'Sales'],
            ['name' => 'Vendor', 'slug' => 'Vendor'],
            ['name' => 'Customer', 'slug' => 'Customer'],
        ];
        foreach ($roles as $role){
            Role::create($role);
        }
    }
}
