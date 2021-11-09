<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $Admin= [
             [
                 'name'=>'Admin',
                 'email'=>'Admin@gmail.com',
                 'status'=>'0',
                 'password'=>bcrypt('Admin123')
             ]
            ];

        foreach ($Admin as $key => $value) {
            # code...
            User::create($value);
        }
    }
}
