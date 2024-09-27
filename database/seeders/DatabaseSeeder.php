<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use App\Models\Tipo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::create(["name"=>"admin", "email"=>"admin@admin.com", "password"=>bcrypt("12345678")]);

        Tipo::create(["descripcion"=>"eléctrico"]);
        Tipo::create(["descripcion"=>"fuego"]);
        Tipo::create(["descripcion"=>"agua"]);

        Pokemon::create(["nombre"=>"pikachu", "altura"=>0.7, "peso"=>1, "tipos_id"=>1]);
        Pokemon::create(["nombre"=>"charmander", "altura"=>0.5, "peso"=>1.5, "tipos_id"=>2]);
        Pokemon::create(["nombre"=>"squirtle", "altura"=>1.2, "peso"=>3, "tipos_id"=>3]);
    }
}
