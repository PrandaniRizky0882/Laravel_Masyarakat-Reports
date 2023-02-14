<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'  => 'masyarakat',
            'password'  => bcrypt('dadada'),
        ]);

        User::create([
            'username' => 'petugas',
            'password' => bcrypt('dadada')
        ]);
    }
}
