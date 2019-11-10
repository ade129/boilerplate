<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          [
            'name' => 'Admin',
            'email' => 'root@root.com',
            'role' => '2',
            'role_type' => 'GA',
            'password' => bcrypt('rootroot'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'name' => 'Leader',
            'email' => 'leader@gmail.com',
            'role' => '1',
            'role_type' => 'LD',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'name' => 'Relation Officer',
            'email' => 'RO@gmail.com',
            'role' => '2',
            'role_type' => 'RO',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ]
      ]);
  }
}
