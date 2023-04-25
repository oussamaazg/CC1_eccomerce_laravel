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
         //\App\Models\User::factory(10)->create();
         //\App\Models\Category::factory(10)->create();
         
         //\App\Models\Product::factory(10)->create();
         \App\Models\Photo::factory(10)->create();
         //\App\Models\Order::factory(10)->create();
         
         //\App\Models\Admin::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*
        $this->call(UsersTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(AdminTableSeeder::class);
        */
    }
}
