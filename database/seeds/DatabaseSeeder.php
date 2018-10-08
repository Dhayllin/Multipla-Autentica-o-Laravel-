<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => bcrypt(123456), // secret
            'remember_token' => str_random(10)
        ]);


    }
}
