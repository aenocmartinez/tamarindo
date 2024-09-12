<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('collections')->insert([
            [
                'name' => 'Arte',
                'description' => 'Descripción colección de arte',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
            [
                'name' => 'Historia',
                'description' => 'Descripción colección de historia.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),                
            ],
        ]);
    }
}
