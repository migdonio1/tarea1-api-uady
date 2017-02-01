<?php

use Illuminate\Database\Seeder;

use App\Seller;
use App\Product;
use App\Review;
use App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $sellers = factory(Seller::class, 2)->create();

        $tags = factory(Tag::class,5)->create();

        foreach ($sellers as $seller) {
            $products = factory(Product::class, 3)->create([
              'seller_id' => $seller->id
            ])->each(function($product) {
              $product->tags()->sync(
                  App\Tag::all()->random(2)
                );
            });

            foreach ($products as $product) {
              factory(Review::class, 10)->create([
                'product_id' => $product->id
              ]);
            }
        }


    }
}
