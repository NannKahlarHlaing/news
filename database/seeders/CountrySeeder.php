<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '2',
            'country' => 'Singapore',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Barazil',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Japan',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Thailand',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Barazil',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '11',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '10',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Myanmar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '6',
            'country' => 'Gibraltar',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'Dominica',
        ]);
        DB::table('countries')->insert([
            'post_id' => '5',
            'country' => 'Réunion',
        ]);
        DB::table('countries')->insert([
            'post_id' => '14',
            'country' => 'Venezuela',
        ]);
        DB::table('countries')->insert([
            'post_id' => '3',
            'country' => 'China',
        ]);

    }
}
