<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(
                      'user_login' => 'admin',
                      'user_pass' => Hash::make('123456'),
                      'user_nicename' => 'Joy Chao',
                      'user_email' => 'admin@writor.me',
                      'user_url' => 'http://www.joychao.cc',
                      'user_activation_key' => '',
                      'user_status' => 0,
                      'display_name' => 'Joy chao',
                    ));
    }

}