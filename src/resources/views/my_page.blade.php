@extends('layouts.app')

@section('content')
<div class="container">

<!--予約機能  -->
<div class="item-width">
    <div class="item-wrap">
       <div class="item-name">予約状況</div>
    </div>


<style>
    .clock-icon, .fa-times-circle {
        color: white;
        font-size: 15px;
        margin: 0px 10px 10px 5px; 
    }
    .fa-times-circle{
        margin-left: 140px;
    }
    .clock-icon, .i{
        font-size: 20px;
    }
    .btn {
        margin-left: 180px;
    }
</style>

<!-- 予約機能   コンテンツ 表示 -->
@if(isset($reservations) && count($reservations) > 0)
    @foreach($reservations as $reservation)
        <div class="item-detail">
            <div>
                <i class="far fa-clock clock-icon" > </i>
                <p>予約{{ $loop->iteration }}<i class="fas fa-times-circle" onclick="cancelReservation({{ $reservation->id }})"></i></p>
           </div>
            <table>
                <tr>
                    <td><p>Shop</p></td>
                    <td><p>{{ $reservation->shop->shop_name }}</p></td>
                </tr>
                <tr>
                    <td><p>Date</p></td>
                    <td><p>{{ $reservation->date }}</p></td>
                </tr>
                <tr>
                    <td><p>Time</p></td>
                    <td><p>{{ $reservation->time }}</p></td>
                </tr>
                <tr>
                    <td><p>Number</p></td>
                    <td><p>{{ $reservation->count }}人</p></td>
                </tr>
            </table>
            <!-- 予約変更リンク -->
                        <div class=btn><a href="{{ route('reservations.edit', ['id' => $reservation->id]) }}"><p>予約変更</p></a></div>
                </div>
        
    @endforeach
@else
@endif

</div>
</body>

<!-- 予約機能 コンテンツ取り消し-->
<script>
    function cancelReservation(reservationId) {
        // ダイアログなどを表示して確認メッセージをユーザーに表示することができます
        if (confirm('本当に予約を取り消しますか？')) {
            // 確認がOKの場合、Ajaxを使用してコントローラーメソッドを呼び出す
            $.ajax({
                type: 'POST',
                url: '/cancel-reservation/' + reservationId,
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'DELETE'
                },
                success: function (data) {
                    // 成功した場合、ページを再読み込みするか、該当の要素を削除するなどの処理を行います
                    location.reload(); // 例: ページを再読み込み
                },
                error: function (data) {
                    console.log('エラーが発生しました。');
                }
            });
        }
    }
</script>





<!-- お気に入り　コンテンツ　-->
<div class="site-form">
    <section>
      <div>
        <div class="site-top">{{ auth()->user()->name }}さん</div>
            <div class="panel-top">お気に入り店舗</div>

<!-- 表示　-->

    @foreach($favoriteShops as $shop)
    <div class="panel-list">
        <div class="panel-detail">
            <div class="panel-head">
                <img src="{{ asset('' . $shop->image) }}">
            </div>
            <div class="panel-body">
                <p class="panel-title">{{ $shop->shop_name }}</p>
                <p class="panel-title_sub">#{{ optional($shop->area)->name }} #{{ optional($shop->genre)->name }}</p>
                        <button type="button" class="submit" onclick="redirectToDetailPage('{{ route('shop.detail', ['id' => $shop->id]) }}')">
                            詳しく見る
                        </button>
                        <button type="button" class="favorite-btn" data-shop-id="{{ $shop->id }}">
                            <i class="far fa-heart"></i>
                        </button>
            </div>
        </div>
    </div>
    @endforeach
       </div>
    </section>
</div>

<!-- JavaScript　店舗詳細表示 -->

<script>
    function redirectToDetailPage(detailPageUrl) {
        window.location.href = detailPageUrl;
    }
</script>

<!-- JavaScript -->
<script>
    // JavaScriptを使用してボタンのクリック時に色を変更
    var favoriteButtons = document.querySelectorAll('.favorite-btn');

    favoriteButtons.forEach(function (button) {
        // ページ読み込み時にアクティブ状態にする
        button.classList.add('active');

        // アイコンの色を切り替える
        var heartIcon = button.querySelector('i');
        heartIcon.classList.remove('far'); // アウトラインを削除
        heartIcon.classList.add('fas'); // 塗りつぶしを追加
    });
</script>


<!-- JavaScript -->
<script>
    var favoriteButtons = document.querySelectorAll('.favorite-btn');

    favoriteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var shopId = this.getAttribute('data-shop-id');

            // 確認メッセージを表示
            var confirmMessage = 'お気に入りを削除しますか？';
            if (confirm(confirmMessage)) {
                // お気に入りから削除するAPIを呼び出す
                fetch('/favorites/remove/' + shopId, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                }).then(response => response.json())
                  .then(data => {
                      console.log(data);
                      // ページを再読み込み
                      location.reload();
                  })
                  .catch(error => console.error('Error:', error));
            }
        });
    });
</script>

</div>

@endsection