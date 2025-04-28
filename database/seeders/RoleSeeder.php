<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Administrateur du système'
            ],
            [
                'name' => 'teacher',
                'description' => 'Enseignant'
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
