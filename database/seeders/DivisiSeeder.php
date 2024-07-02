<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $divisis = [
            ['nama_divisi' => 'Marketing & Sales'],
            ['nama_divisi' => 'HC & GA'],
            ['nama_divisi' => 'Operational & Procurement'],
            ['nama_divisi' => 'Finance Accounting & Tax'],
        ];
    
        foreach ($divisis as $divisi) {
            Divisi::create($divisi);
        }
    }
}
