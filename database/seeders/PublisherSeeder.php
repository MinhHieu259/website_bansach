<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
           ['name' => 'Nguyen Minh Hieu'],
           ['name' => 'Hieu Minh Nguyen'],
        ]);
    }
}
