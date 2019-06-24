<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'admin', 'desc' => ''],
            ['name' => 'operator', 'desc' => ''],
        ];
        DB::table('roles')->insert($data);

        $user = [
            [
                'role_id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
            ],

        ];
        DB::table('users')->insert($user);

    }
}
