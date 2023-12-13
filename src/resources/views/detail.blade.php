@extends('layouts.detail')

@section('content')
<!-- ショップコンテンツ -->
    <div class="item-width">
        <div class="item-wrap">
            <div class="item-btn" onclick="goBack()">＜</div>
            @if ($shop)
                <div class="item-name">{{ $shop->shop_name }}</div>
            @else
                <div class="item-name">ショップが見つかりません</div>
            @endif
        </div>

        <!-- ショップコンテンツ＿詳細 -->
        @if ($shop)
            <div class="item-photo">
                <img src="{{ asset('' . $shop->image) }}" alt="" width="100%" height="100%">
            </div>
            <div class="item detail_1">
                <a>#{{ optional($shop->area)->name }}</a>
                <a>#{{ optional($shop->genre)->name }}</a>
            </div>
            <div class="item detail_2">
                {{ $shop->detail }}
            </div>
        @else
            <p>ショップが見つかりません</p>
        @endif
    </div>

        <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <!-- 予約　コンテンツ　-->
<div class="site-form">
    <section id="main">
        <div class="panel-list">
            <form class="" method="POST" action="{{ route('register') }}">
                <div class="panel-top">予約</div>
                 <!-- 入力　-->
                <div class="panel-body">
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="panel-body">
                    <input type="time" id="time" name="time" class="time" required>
                </div>

                <div class="panel-body">
                    <select id="num_people" name="num_people" class="num_people" required>
                    <script>
                        for (var i = 1; i <= 10; i++) {
                            document.write("<option value='" + i + "'>" + i + " 人</option>");
                            }
                        </script>
                    </select>
                </div>

<div class="panel-detail">
    <table>
        <tr><td><p>Shop</p></td>
            <td> <p>仙人</p></td>
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
                <div class="">
                    <button type="submit" class="submit">予約する</button>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection
