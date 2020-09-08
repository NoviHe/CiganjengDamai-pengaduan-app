<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'nama_petugas' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt(123456789),
                'level' => 'admin',
                'telp' => '082240578840',
                'remember_token' => Str::random(10)
            ],
            [
                'nama_petugas' => 'Operator',
                'username' => 'operator',
                'password' => bcrypt(123456789),
                'telp' => '085144174986',
                'level' => 'petugas',
                'remember_token' => Str::random(10)
            ]
        ];
        DB::table('petugas')->insert($admin);
    }
}
