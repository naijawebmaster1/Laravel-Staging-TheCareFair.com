<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReceiverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receivers')->insert([
            'name' => "Receiver Joe",
            'email' => 'receiver@admin.com',
            'password' => Hash::make('password'),
            'phone' => '+16152208372',
            'zip_code' => 'BM',
        ]);
    }
}
