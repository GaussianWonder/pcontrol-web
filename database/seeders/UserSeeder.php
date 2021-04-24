<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([ // theoretically this is an invalid user, it does not use the google login, and it has a normal bcrypted password
            'name' => 'Admin',
            'email' => 'admin@pcontrol.com',
        ]);
    }
}
