<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articles::create([
            "user_id" => 1,
            'categories_id'=>1,
            'title' => "Televisi",
            "content" => "televisi (TV) merupakan media telekomunikasi paling favorit bagi individu maupun keluarga di rumah.",
            "image" => "https://cdn-2.tstatic.net/tribunnews/foto/bank/images/set-top-box-sharp.jpg"
        ]);

        Articles::create([
            "user_id" => 1,
            'categories_id'=>2,
            'title' => "Relaxed Fit Hoodie",
            "content" => "Block-coloured hoodie in sweatshirt fabric made from a cotton blend with a soft brushed inside. Relaxed fit with a lined, drawstring hood, long sleeves, kangaroo pocket and ribbing at the cuffs andhem. Small text print on the front.",
            "image" => "https://cf.shopee.co.id/file/524632e451153d1b622c33448488828f"
        ]);
    }
}
