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
            'email' => 'admin@infancyit.com',
            'password' => bcrypt('a'),
            'flag' => 0
        ]);

        User::create([
            'username' => 'user',
            'email' => 'user@infancyit.com',
            'password' => bcrypt('a'),
            'flag' => 0
        ]);
    }
}
