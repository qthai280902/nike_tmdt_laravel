<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::whereNotNull('parent_id')->get();

        $nikeProducts = [
            [
                'name' => "Nike Air Force 1 '07",
                'description' => "The radiance lives on in the Nike Air Force 1 '07, the b-ball icon that puts a fresh spin on what you know best.",
                'price' => 115.00,
            ],
            [
                'name' => 'Nike Air Max Dn',
                'description' => 'Say hello to the next generation of Air technology. The Air Max Dn features our Dynamic Air unit system.',
                'price' => 160.00,
            ],
            [
                'name' => 'Nike Pegasus 40',
                'description' => 'A springy ride for every run, the Peg’s familiar, just-for-you feel returns to help you accomplish your goals.',
                'price' => 130.00,
            ],
            [
                'name' => 'Nike Dunk Low',
                'description' => 'Created for the hardwood but taken to the streets, the Nike Dunk Low returns with crisp overlays.',
                'price' => 110.00,
            ],
            [
                'name' => 'Nike Air Max 270',
                'description' => "Nike's first lifestyle Air Max brings you style, comfort and big Air.",
                'price' => 160.00,
            ],
            [
                'name' => 'Nike Killshot 2',
                'description' => 'Inspired by original low-profile tennis shoes, the Nike Killshot 2 updates the upper with premium textured leathers.',
                'price' => 90.00,
            ],
        ];

        foreach ($nikeProducts as $data) {
            $product = Product::create([
                'category_id' => $categories->random()->id,
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'description' => $data['description'],
                'price' => $data['price'],
                'image_url' => 'https://images.nike.com/placeholder.png', // Placeholder URL
            ]);

            // Create Variants
            $sizes = ['US 7', 'US 8', 'US 9', 'US 10', 'US 11', 'US 12'];
            $colors = ['Triple White', 'Black/White', 'Wolf Grey'];

            foreach ($colors as $color) {
                foreach ($sizes as $size) {
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'sku' => strtoupper(Str::random(10)),
                        'size' => $size,
                        'color' => $color,
                        'stock' => rand(5, 50),
                    ]);
                }
            }
        }
    }
}
