<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(
                      'user_login' => 'admin',
                      'user_pass' => Hash::make('admin'),
                      'user_nicename' => 'admin',
                      'user_email' => 'admin@admin.com',
                      'user_url' => 'http://www.joychao.cc',
                      'user_activation_key' => '',
                      'user_status' => 0,
                      'display_name' => 'Joy chao',
                    ));
    }

}