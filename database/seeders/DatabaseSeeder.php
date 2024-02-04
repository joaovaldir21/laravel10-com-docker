<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EstadoSeeder::class,
            Cidade1Seeder::class,
            Cidade2Seeder::class,
            Cidade3Seeder::class,
            Cidade4Seeder::class,
            Cidade5Seeder::class,

            //ProdutosSeeder::class,
        ]);

    }
}
