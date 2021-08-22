<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'receiver_id' => 1,
            'title' => "Assumenda qui non laborum corporis rerum vero rerum.",
            'description' => 'Dolor repellendus ut quis molestiae nostrum omnis aut occaecati aperiam sapiente id at at pariatur laudantium officiis ex in consectetur.',
            'location' => '867 Cremin Highway Suite 854\nKelsiehaven, DC 25120-8995',
            'distance' => 100,
            'minimum_rate' => 10,
            'maximum_rate' => 100,
            'languages' => '[ "English", "French" ]',
            'minimum_years_of_experience' => 1,
            'status' => false,
        ]);
    }
}
