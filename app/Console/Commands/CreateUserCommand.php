<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $organizationId = $this->ask('Enter organization id');
        $name = $this->ask('Enter user name');
        $email = $this->ask('Enter email address');
        $password = $this->secret('Enter password');
        $phoneNumber = $this->ask('Enter phone number');
        $role = $this->choice(
            'Select role',
            ['admin', 'manager', 'staff'],
            0
        );
        $isActive = $this->confirm(
            'Is user active?',
            true
        );

        $user = User::create([
            'organization_id' => $organizationId,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'phone_number' => $phoneNumber,
            'role' => $role,
            'is_active' => $isActive,
        ]);

        $this->info('User created successfully.');

        $this->table(
            ['ID', 'Name', 'Email', 'Role'],
            [[
                $user->id,
                $user->name,
                $user->email,
                $user->role
            ]]
        );
    }
}
