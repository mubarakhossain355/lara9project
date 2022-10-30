<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SubCategory::class,
        ]);
        // $categories = Category::factory(10)->create();
        // $subcategories = SubCategory::factory(10)->make()->each(function ($subcategory) use ($categories) {
        //     $subcategory->category_id = $categories->random()->id;
        //     $subcategory->save();
        // });
    }
}
