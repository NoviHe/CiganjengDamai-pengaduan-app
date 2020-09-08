<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i < 50; $i++) {

            DB::table('masyarakats')->insert([
                'nik' => rand(1, 1000000000000000),
                'nama' => $faker->name,
                'username' => $faker->userName,
                'password' => bcrypt(123456789),
                'telp' => $faker->phoneNumber,
                'remember_token' => Str::random(10)
            ]);
        }
    }
}
