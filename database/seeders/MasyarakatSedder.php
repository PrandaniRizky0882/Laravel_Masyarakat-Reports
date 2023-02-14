<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasyarakatSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Masyarakat::create([
            'nik'  => '1234567821',
            'nama'  => 'Masyarakat Pertama',
            'telp'  => '098786761',
            'user_id'  => 1,
        ]);
    }
}
