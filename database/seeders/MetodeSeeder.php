<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $metodes = [
            ['nama_metode' => 'Transfer'],
            ['nama_metode' => 'Auto Debit'],
            ['nama_metode' => 'Cash'],
            ['nama_metode' => 'Lain Lain'],
        ];
    
        foreach ($metodes as $metode) {
            Metode::create($metode);
        }
    }
}
