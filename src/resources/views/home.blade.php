@extends('layouts.home')


@section('content')

          <!-- サーチサイド-->
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
                        <div class="panel-head" >
                            <img src="{{ asset('' . $shop->image) }}">
                        </div>
                        <div class="panel-body">
                            <p class="panel-title">{{ $shop->shop_name }}</p>
                            <p class="panel-title_sub">#{{ optional($shop->area)->name }} #{{ optional($shop->genre)->name }}</p>
                            <button type="button" class="submit" onclick="redirectToDetailPage('{{ route('shop.detail', ['id' => $shop->id]) }}')">
                                詳しく見る
                            </button>
                            <button type="button" class="favorite-btn" data-favorite-id="favoriteButton2">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </div>

    <!-- JavaScript -->
<script>
    function redirectToDetailPage(detailPageUrl) {
        // 詳細ページへの遷移
        window.location.href = detailPageUrl;
    }
</script>

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

@endsection
