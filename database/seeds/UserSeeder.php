<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'fullname'=>'EasychopNG Admin',
        	'email' => 'admin@easychop.ng',
        	'username' => 'admin',
        	'password' => bcrypt('Password1'),
			'avatar' => URL::to('/')."/uploads/avatar/avatar.png",
            'email_verified_at' => time(),
        ]);
        $admin->assignRole('admin');

    }
}
