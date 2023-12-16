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
<form action="{{ route('reservations.store') }}" method="POST">
    @csrf
    <div class="panel-body">
        <label for="date"></label>
        <input type="date" id="date" name="date" required>
    </div>
    <div class="panel-body">
        <label for="time"></label>
        <select id="time" name="time" class="time" required>
            @for ($i = 0; $i < 24; $i++)
                @php
                    $hour = sprintf('%02d', $i);
                @endphp
                <option value="{{ $hour }}:00">{{ $hour }}:00</option>
            @endfor
        </select>
    </div>
    <div class="panel-body">
        <label for="num_people"></label>
        <select id="num_people" name="num_people" class="num_people" required>
            <script>
                for (var i = 1; i <= 10; i++) {
                    document.write("<option value='" + i + "'>" + i + " 人</option>");
                }
            </script>
        </select>
    </div>

 

 <!-- 予約詳細の表示部分 -->
                <div class="panel-detail">
                    <table>
                        <tr>
                            <td><p>Shop</p></td>
                            <td><p>{{ $shop->shop_name }}</p></td>
                        </tr>
                        <tr>
                            <td><p>Date</p></td>
                            <td><p id="displayDate"></p></td>
                            <input type="hidden" name="hiddenDate" id="date">
                        </tr>
                        <tr>
                            <td><p>Time</p></td>
                            <td><p id="displayTime"></p></td>
                            <input type="hidden" name="hiddenTime" id="time">
                        </tr>
                        <tr>
                            <td><p>Number</p></td>
                            <td><p id="displayNumpeople"></p></td>
                            <input type="hidden" name="hiddenNumpeople" id="num_people">
                        </tr>
                    </table>
                </div>

                    <button type="submit" class="submit">予約する</button>
            </form>
        </div>
    </section>
</div>

<!-- JavaScript -->
<script>
    // 予約フォームの入力が変更されたときに予約詳細部分に反映
    document.getElementById('date').addEventListener('input', function () {
        document.getElementById('displayDate').innerText = this.value;
    });

    document.getElementById('time').addEventListener('input', function () {
        document.getElementById('displayTime').innerText = this.value;
    });

    document.getElementById('num_people').addEventListener('input', function () {
        document.getElementById('displayNumpeople').innerText = this.value + ' 人';
    });
</script>

@endsection
