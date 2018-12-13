<?php

use App\Category;
use App\CategoryItem;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new Category;
        $category->name = "Produk";
        $category->save();

        $category_items = [
            [
                "name" => "Tabungan",
                "category_id" => $category->id
            ],
            [
                "name" => "Kredit",
                "category_id" => $category->id
            ],
            [
                "name" => "Deposito",
                "category_id" => $category->id
            ]
        ];

        foreach ($category_items as $key => $category_item) {
            CategoryItem::create($category_item);
        }

        $category2 = new Category;
        $category2->name = "News & Promo";
        $category2->save();

        $category_items2 = [
            [
                "name" => "News",
                "category_id" => $category->id
            ],
            [
                "name" => "Promo",
                "category_id" => $category->id
            ]
        ];

        foreach ($category_items2 as $key => $category_item) {
            CategoryItem::create($category_item);
        }
    }
}
