<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Créer le rôle admin s'il n'existe pas
        Role::firstOrCreate(['name' => 'admin']);

        // Créer l'utilisateur admin
        $admin = User::create([
            'name' => 'Administrateur',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123456')
        ]);

        // Attacher le rôle admin
        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->attach($adminRole);

        $this->info('Admin user created successfully!');
        $this->info('Email: admin@example.com');
        $this->info('Password: admin123456');
    }
}
