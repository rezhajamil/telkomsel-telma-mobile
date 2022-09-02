<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "id" => 1,
                "email" => "rezha.jn@gmail.com",
                "password" => \bcrypt("123456"),
                "nama" => "Rezha",
                "telp" => "081269863028",
                "wa" => "081269863028",
            ],
        ];

        foreach ($data as $data) {
            User::create($data);
        }
    }
}
