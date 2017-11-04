<?php

use App\Models\ProductAttribute;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; ++$i) {
            $id = factory(\App\Models\Product::class)->create()->id;
            // product images
            ProductImage::create(['link' => $faker->imageUrl(800, 400), 'product_id' => $id]);
            // product detail
            ProductDetail::create(['count' => mt_rand(100, 1000), 'unit' => '件', 'description' => $faker->text, 'product_id' => $id]);
            // product attribute
            ProductAttribute::create(['attribute' => '颜色', 'items' => '白色', 'markup' => 10, 'product_id' => $id]);
            ProductAttribute::create(['attribute' => '颜色', 'items' => '红色', 'markup' => 5, 'product_id' => $id]);
        }
    }
}
