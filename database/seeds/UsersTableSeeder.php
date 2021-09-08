<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app(\Faker\Generator::class);
        $now = now();
        $users = [
            ['name' => $faker->name(), 'email' => $faker->unique()->email(), 'password' => bcrypt('123456'), 'type' => 'admin', 'created_at' => $now, 'updated_at' => $now],
            ['name' => $faker->name(), 'email' => $faker->unique()->email(), 'password' => bcrypt('123456'), 'type' => 'editor', 'created_at' => $now, 'updated_at' => $now],
        ];

        foreach (range(0, 4) as $i) {
            $users[] = [
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('123456'),
                'type' => 'user',
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        User::insert($users);
    }
}
