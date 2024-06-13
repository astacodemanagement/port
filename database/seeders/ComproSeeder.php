<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComproSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('compro')->insert([
                [
                    'domain' => '127.0.0.1',
                    'view_path' => 'front.compro-1',
                    'created_at' => now(),
                    'updated_at' =>now()
                ],
                [
                    'domain' => '127.0.0.1',
                    'view_path' => 'front.compro-2',
                    'created_at' => now(),
                    'updated_at' =>now()
                ]
            ]
        );
    }
}
