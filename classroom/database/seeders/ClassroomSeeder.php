<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('classrooms')->insert([
        //     'name' => 'gsg-laravel',
        //     'code' => '324143255',
        //     'status' => 'active',
        // ]);

        // DB::table('classrooms')->insert([
        //     'name' => 'gsg-php',
        //     'code' => '4rftgdsa',
        //     'status' => 'active',
        // ]);

        // DB::table('classrooms')->insert([
        //     'name' => 'gsg-training',
        //     'section' => 'laravel',
        //     'subject' => 'models',
        //     'code' => Str::random(8),
        //     'status' => 'active',
        // ]);

        DB::table('classrooms')->insert([
            'name' => 'gsg-training',
            'section' => 'laravel',
            'subject' => 'models',
            'code' => Str::random(8),
            'status' => 'active',
        ]);
    }
}
