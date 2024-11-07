<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Models\User;
        $administrator->username = "krustybread";
        $administrator->name = "Krusty Bread";
        $administrator->email = "krustybread@email.com";
        $administrator->phone = "08123456789";
        $administrator->roles = json_encode("Owner");
        $administrator->password = \Hash::make("Demo123!");
        $administrator->save();
        $this->command->info("Owner user created successfully.");
    }
}
