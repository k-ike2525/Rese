<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // genres テーブルにデータを挿入
         DB::table('shops')->insert([
            [   'shop_name' => '仙人',
                'area_id' => 1, // 地域ID
                'genre_id' => 1, // ジャンルID
                'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
                'detail' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
                'created_at' => now(),
                'updated_at' => now(),
            ],]);

         DB::table('shops')->insert([
            [   'shop_name' => '牛助',
                'area_id' => 2, // 地域ID
                'genre_id' => 2, // ジャンルID
                'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
                'detail' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の実績とお付き合いをもとに、なかなか食べられない希少部位も仕入れております。また、ゆったりとくつろげる空間はお仕事終わりの一杯や女子会にぴったりです。',
                'created_at' => now(),
                'updated_at' => now(),
            ],]);

          DB::table('shops')->insert([
            [   'shop_name' => '戦慄',
                'area_id' => 3, // 地域ID
                'genre_id' => 3, // ジャンルID
                'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
                'detail' => '気軽に立ち寄れる昔懐かしの大衆居酒屋です。キンキンに冷えたビールを、なんと199円で。鳥かわ煮込み串は販売総数100000本突破の名物料理です。仕事帰りに是非御来店ください。',
                'created_at' => now(),
                'updated_at' => now(),
            ],]);

          DB::table('shops')->insert([
            [   'shop_name' => 'ルーク',
                'area_id' => 1, // 地域ID
                'genre_id' => 4, // ジャンルID
                'image' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
                'detail' => '都心にひっそりとたたずむ、古民家を改築した落ち着いた空間です。イタリアで修業を重ねたシェフによるモダンなイタリア料理とソムリエセレクトによる厳選ワインとのペアリングが好評です。ゆっくりと上質な時間をお楽しみください。',
                'created_at' => now(),
                'updated_at' => now(),
            ],]);

    }
}
