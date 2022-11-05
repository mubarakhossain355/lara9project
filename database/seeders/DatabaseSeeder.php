<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SubCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      if($this->command->confirm('Do you want to refresh the db')){
            $this->command->call('migrate:refresh');
            $this->command->info('Database is refreshed');
        }


        $this->call([
            
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
        ]);

        // $categories = Category::factory(10)->create();

        // $subcategories = SubCategory::factory(10)->make()->each(function($subcategory) use($categories){
        //     $subcategory->category_id = $categories->random()->id;
        //     $subcategory->save();
        // });
    }
}
