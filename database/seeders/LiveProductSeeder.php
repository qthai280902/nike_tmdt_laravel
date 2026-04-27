<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class LiveProductSeeder extends Seeder
{
    public function run(): void
    {
        $productsData = [
            // NIKE CDN LINKS (With New Header Logic)
            ['name' => 'Nike Air Force 1 \'07', 'category' => 'Men', 'price' => 2800000, 'original_price' => 3500000, 'image' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/b7d9211c-26e7-431a-ac24-b0540fb3c00f/AIR+FORCE+1+%2707.png'],
            ['name' => 'Nike Air Max 270', 'category' => 'Men', 'price' => 3200000, 'original_price' => 4200000, 'image' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/9d58ca09-3252-4e00-8b17-38435d8a8b84/AIR+MAX+270.png'],
            ['name' => 'Nike Dunk Low Retro', 'category' => 'Men', 'price' => 2500000, 'original_price' => 2900000, 'image' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/8e97f699-245c-4433-875f-3ee0a1f49615/NIKE+DUNK+LOW+RETRO.png'],
            
            // UNSPLASH BACKUP LINKS (RELIABLE)
            ['name' => 'Nike Zoom Structure', 'category' => 'Men', 'price' => 2100000, 'original_price' => 2600000, 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Air Jordan 1 High', 'category' => 'Men', 'price' => 4500000, 'original_price' => null, 'image' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Precision Hero', 'category' => 'Men', 'price' => 1800000, 'original_price' => null, 'image' => 'https://images.unsplash.com/photo-1460353581641-37baddab0fa2?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Pegasus Turbo', 'category' => 'Men', 'price' => 2900000, 'original_price' => 3800000, 'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Free Run 5.0', 'category' => 'Women', 'price' => 2000000, 'original_price' => 2400000, 'image' => 'https://images.unsplash.com/photo-1512374382149-4332c6c021f1?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Metcon Training', 'category' => 'Women', 'price' => 2600000, 'original_price' => null, 'image' => 'https://images.unsplash.com/photo-1579338559194-a162d19bf842?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike React Infinity', 'category' => 'Women', 'price' => 3100000, 'original_price' => 3600000, 'image' => 'https://images.unsplash.com/photo-1539185441755-769473a23570?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Internationalist', 'category' => 'Women', 'price' => 1800000, 'original_price' => 2100000, 'image' => 'https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Court Legacy', 'category' => 'Women', 'price' => 1300000, 'original_price' => null, 'image' => 'https://images.unsplash.com/photo-1511556532299-8f662fc26c06?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Pegasus Shield', 'category' => 'Women', 'price' => 2700000, 'original_price' => 3300000, 'image' => 'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Kids Star Runner', 'category' => 'Kids', 'price' => 950000, 'original_price' => 1200000, 'image' => 'https://images.unsplash.com/photo-1514989940723-e8e51635b782?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Kids Flex Plus', 'category' => 'Kids', 'price' => 1100000, 'original_price' => null, 'image' => 'https://images.unsplash.com/photo-1551107696-a4b0c5a0d9a2?auto=format&fit=crop&q=80&w=1280'],
            ['name' => 'Nike Kids Pico 5', 'category' => 'Kids', 'price' => 750000, 'original_price' => 950000, 'image' => 'https://images.unsplash.com/photo-1597248881519-db089d3744a5?auto=format&fit=crop&q=80&w=1280'],
        ];

        foreach ($productsData as $data) {
            $url = $data['image'];
            
            // LOGIC SỐNG CÒN: Ping với User-Agent giả lập trình duyệt
            try {
                $response = Http::withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36'
                ])->timeout(8)->head($url);

                if ($response->failed()) {
                    $this->command->warn("Bỏ qua [{$data['name']}] do không thể lấy thông tin ảnh: $url");
                    continue;
                }
            } catch (\Exception $e) {
                $this->command->warn("Bỏ qua [{$data['name']}] do lỗi kết nối: {$e->getMessage()}");
                continue;
            }

            $category = Category::where('name', $data['category'])->first();
            if (!$category) {
                $category = Category::create([
                    'name' => $data['category'],
                    'slug' => Str::slug($data['category']),
                    'description' => "Products for {$data['category']}"
                ]);
            }

            // Xác định Featured Position cho Seeding
            $featuredPosition = null;
            if ($data['name'] === 'Nike Air Force 1 \'07') {
                $featuredPosition = 'hero';
            } elseif (in_array($data['name'], ['Nike Air Jordan 1 High', 'Nike Pegasus Turbo', 'Nike React Infinity'])) {
                $featuredPosition = 'secondary';
            }

            $product = Product::create([
                'category_id' => $category->id,
                'name' => $data['name'],
                'slug' => Str::slug($data['name']) . '-' . rand(100, 999),
                'description' => $data['description'] ?? 'Experience the pinnacle of performance and style with ' . $data['name'],
                'price' => $data['price'],
                'original_price' => $data['original_price'] ?? null,
                'image_url' => $url,
                'featured_position' => $featuredPosition,
            ]);

            foreach (['US 7', 'US 8', 'US 9', 'US 10', 'US 11', 'US 12'] as $size) {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => 'NK-' . strtoupper(Str::random(6)) . '-' . str_replace(' ', '', $size),
                    'size' => $size,
                    'color' => 'Black/White',
                    'stock' => rand(10, 100),
                ]);
            }

            $this->command->info("Đã nạp thành công sản phẩm: {$data['name']}");
        }
    }
}
