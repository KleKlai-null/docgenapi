<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'  => 'mi_clerk'
            ],
            [
                'name'  => 'mro_clerk'
            ],
            [
                'name'  => 'dm_clerk'
            ],
            [
                'name'  => 'fg_clerk'
            ],
            [
                'name'  => 'fa_clerk'
            ],
            [
                'name'  => 'ma_clerk'
            ],
            [
                'name'  => 'mr_clerk'
            ],
            [
                'name'  => 'sc_clerk'
            ],
            [
                'name'  => 'administrator'
            ],
        ];

        foreach ($roles as $role)
        {
            Role::create($role);
        }
    }
}
