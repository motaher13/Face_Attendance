<?php


use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('a'),

        ]);

        User::create([
            'username' => 'user',
            'email' => 'ta@gmail.com',
            'password' => bcrypt('a'),

        ]);
    }
}
