<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
        $table->bigIncrements('id');
            $table->string('shop_name'); // 店舗名
            $table->unsignedBigInteger('area_id'); // 地域を参照する外部キー
            $table->foreign('area_id')->references('id')->on('areas');
            $table->unsignedBigInteger('genre_id');// ジャンルを参照する外部キー
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->string('image')->nullable(); // 写真のファイル
            $table->text('detail')->nullable(); // 詳細説明（テキスト）
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
