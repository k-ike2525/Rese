@extends('layouts.home')


@section('content')

          <!--サイド-->
    <div class="container">
        <form role="search" method="get" action="{{ route('search') }}">
            @csrf

            <select class="" name="area">
                <option value="0">All area</option>
                <option value="1">東京都</option>
                <option value="2">大阪府</option>
                <option value="3">福岡県</option>
            </select>

            <select class="" name="genre">
                <option value="0">All genre</option>
                <option value="1">寿司</option>
                <option value="2">焼肉</option>
                <option value="3">居酒屋</option>
                <option value="4">イタリア</option>
                <option value="5">ラーメン</option>
            </select>

            <i class="fas fa-search">
            <input type="text" value="{{ old('search') }}" name="search" id="search-text" placeholder="Search..."></i>
        </form>
     </div>
</div>
</header>


<!-- メインコンテンツ -->
<div class="site-form">
    <section id="main">
        <div class="panel-list">
            @foreach($shops as $shop)
                <a class="panel-detail" >
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
                </a>
            @endforeach
        </div>
    </section>
</div>



<script>
// JavaScript //
document.addEventListener('DOMContentLoaded', function () {
    var favoriteButtons = document.querySelectorAll('.favorite-btn');

    favoriteButtons.forEach(function (button) {
        var shopId = button.getAttribute('data-shop-id');

        // ボタンにクリックイベントを追加
        button.addEventListener('click', function () {
            // ボタンがクリックされたときの処理
            button.disabled = true;

            // サーバーにリクエストを送信してお気に入りの状態を更新
            fetch('/favorites/toggle/' + shopId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }).then(response => response.json())
                .then(data => {
                    // クリック後に取得したお気に入りの状態を使用してボタンの状態を更新
                    updateButtonState(button, data.isFavorite);
                })
                .catch(error => console.error('Error:', error))
                .finally(() => {
                    // ボタンを再度クリック可能にする
                    button.disabled = false;
                });
        });

        // 初期状態を設定
        fetch('/favorites/check/' + shopId, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        }).then(response => response.json())
            .then(data => {
                var isFavorite = data.isFavorite;

                // 初期状態を設定
                updateButtonState(button, isFavorite);
            })
            .catch(error => console.error('Error:', error));
    });

    function updateButtonState(button, isFavorite) {
        // ローカルでactiveクラスを切り替える
        button.classList.toggle('active', isFavorite);

        // アイコンの色を切り替える
        var heartIcon = button.querySelector('i');
        if (isFavorite) {
            heartIcon.classList.remove('far');
            heartIcon.classList.add('fas', 'text-white'); // 赤いアイコンに変更
        } else {
            heartIcon.classList.remove('fas', 'text-white');
            heartIcon.classList.add('far'); // 白いアイコンに変更
        }
    }
});

    // 詳細ページへの遷移
function redirectToDetailPage(detailPageUrl) {
    window.location.href = detailPageUrl;
}


</script>

@endsection
