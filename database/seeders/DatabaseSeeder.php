<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->command->info('User table seeded!');

         \App\Models\User::factory(1)->create();
               \App\Models\ListaJogo::factory(5)->create();
    }
}
