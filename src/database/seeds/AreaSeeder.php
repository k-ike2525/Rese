<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             // genres テーブルにデータを挿入
        DB::table('areas')->insert([
            ['name' => '東京都'],
            ['name' => '大阪府'],
            ['name' => '福岡県'],
        ]);

    }
}
