<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Men' => ['Lifestyle', 'Running', 'Basketball', 'Training'],
            'Women' => ['Lifestyle', 'Running', 'Training', 'Yoga'],
            'Kids' => ['Shoes', 'Clothing', 'Accessories'],
        ];

        foreach ($categories as $parentName => $subCategories) {
            $parent = Category::create([
                'name' => $parentName,
                'slug' => Str::slug($parentName),
                'description' => "Shop the latest for $parentName",
            ]);

            foreach ($subCategories as $subName) {
                Category::create([
                    'parent_id' => $parent->id,
                    'name' => $subName,
                    'slug' => Str::slug($parentName.'-'.$subName),
                    'description' => "$subName gear for $parentName",
                ]);
            }
        }
    }
}
