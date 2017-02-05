<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();

        for($i=0; $i < 20; $i++) {
          DB::table('users')->insert([
            'name' => 'Nom' . $i,
            'email' => 'email' . $i . '@gmail.com',
            'password' => bcrypt('password' . $i),
          ]);
        }
    }
}