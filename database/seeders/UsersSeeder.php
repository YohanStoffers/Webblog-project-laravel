<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Cast\Bool_;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)
            ->create();
    }
}
