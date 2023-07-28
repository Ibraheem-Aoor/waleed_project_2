<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Consultant;
use App\Models\Contractor;
use App\Models\Delegator;
use App\Models\ProjectAction;
use App\Models\ProjectBoard;
use App\Models\ProjectSector;
use App\Models\ProjectType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // ProjectType::factory(5)->create();
        // ProjectAction::factory(5)->create();
        // ProjectBoard::factory(5)->create();
        // ProjectSector::factory(5)->create();
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email'=> 'waleed@gmail.com',
            'type' => 'admin',
            'password' => Hash::make('123456'),
        ]);
    }
}
