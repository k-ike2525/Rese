@extends('layouts.app')

@section('content')
<div class="container">

    <!--予約状況　コンテンツ　タイトル -->
<div class="item-width">
    <div class="item-wrap">
       <div class="item-name">予約状況</div>
    </div>

    <style>
        .clock-icon, .fa-times-circle {
            color: white;
            font-size: 20px;
            margin: 10px 15px 20px 10px; 
        }
    </style>



    <!--予約状況　コンテンツ　表示 -->
<div class="item-detail">
<div>
    <i class="far fa-clock clock-icon">　予約１</i><i class="fas fa-times-circle"></i>
</div>
    <table>
        <tr>
            <td><p>Shop</p></td>
            <td><p>仙人</p></td>
        </tr>
        <tr>
            <td><p>Date</p></td>
            <td><p>2021-04-01</p></td>
        </tr>
        <tr>
            <td><p>Time</p></td>
            <td><p>17:00</p></td>
        </tr>
        <tr>
            <td><p>Number</p></td>
            <td><p>1人</p></td>
        </tr>
    </table>
</div>
</div>
</body>

<!-- お気に入り　コンテンツ　-->
<div class="site-form">
    <section5>
      <div>
        <div class="site-top">ユーザーネームさん</div>
            <div class="panel-top">お気に入り店舗</div>
      <div class="psnel-list">
                <div class="panel-detail">
                    <div class="panel-head">
                        <img src="img/italian.jpg">
                    </div>
                        <div class="panel-body">
                        <p class="panel-title">store name</p>
                        <p class="panel-title_sub">#東京都 #寿司</p>
                        <button type="submit" class="submit" data-detail-id="detailButton1">詳しく見る</button>
                        <button type="button" class="favorite-btn" data-favorite-id="favoriteButton1">
                            <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="panel-detail">
                    <div class="panel-head">
                        <img src="img/italian.jpg">
                    </div>
                    <div class="panel-body">
                        <p class="panel-title">store name</p>
                        <p class="panel-title_sub">#東京都 #寿司</p>
                        <button type="submit" class="submit" data-detail-id="detailButton1">詳しく見る</button>
                        <button type="button" class="favorite-btn" data-favorite-id="favoriteButton1">
                            <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="panel-detail">
                   <div class="panel-head">
                        <img src="img/italian.jpg">
                   </div>
                   <div class="panel-body">
                        <p class="panel-title">store name</p>
                        <p class="panel-title_sub">#東京都 #寿司</p>
                        <button type="submit" class="submit" data-detail-id="detailButton1">詳しく見る</button>
                        <button type="button" class="favorite-btn" data-favorite-id="favoriteButton1">
                            <i class="far fa-heart"></i>
                </div>
            </div>
<!-- JavaScript -->
<script>
    // JavaScriptを使用してボタンのクリック時に色を変更
    var favoriteButtons = document.querySelectorAll('.favorite-btn');

    favoriteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            this.classList.toggle('active');
            // アイコンの色を切り替える
            var heartIcon = this.querySelector('i');
            heartIcon.classList.toggle('fas'); // 塗りつぶし
            heartIcon.classList.toggle('far'); // アウトライン
        });
    });
</script>

       </div>
    </section>
</div>



</div>

@endsection