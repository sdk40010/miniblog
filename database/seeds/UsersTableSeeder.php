<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSet = [
            [
                'name' => 'a',
                'email' => 'a@example.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'b',
                'email' => 'b@example.com',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($dataSet as $data) {
            User::create($data);
        }

    }
}
