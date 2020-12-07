<?php

use Illuminate\Database\Seeder;
use Akaunting\Setting\Facade;
use Illuminate\Support\Facades\URL;

class SettingsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Application Variables
				Setting(['app_name'=> 'EasyChop.ng'])->save();
				Setting(['app_dark_logo'=> ''])->save();
				Setting(['app_light_logo'=> ''])->save();
				Setting(['app_theme' => 'dark'])->save();
				Setting(['app_navbar' => '#007BFF'])->save();
				Setting(['app_sidebar' => 'light'])->save();
				Setting(['app_currency' => 'USD'])->save();
        // Authentication Variables
				Setting(['captcha' => 0])->save();
				Setting(['2fa' => 0])->save();
				Setting(['email_verification' => 1])->save();
    }
}
