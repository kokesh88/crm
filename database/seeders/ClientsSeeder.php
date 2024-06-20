<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Client;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Предел на количество создаваемых клиентов
        $clientCount = 1000;

        for ($i = 0; $i < $clientCount; $i++) {
            Client::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
        }
    }
}
