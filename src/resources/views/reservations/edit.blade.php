@extends('layouts.app')

@section('content')
<body>
<div class="container">
    <form action="{{ route('reservations.update', ['id' => $reservation->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- 変更項目の入力フォーム（日付、時間、人数など） -->
        <div>
            <label for="date">予約日:</label>
            <input type="date" id="date" name="date" value="{{ $reservation->date }}" required>
        </div>

        <div>
            <label for="time">予約時間:</label>
            <select id="time" name="time" class="time" required>
                @for ($i = 0; $i < 24; $i++)
                    @php
                        $hour = sprintf('%02d', $i);
                        $selected = ($hour.':00' === $reservation->time) ? 'selected' : '';
                    @endphp
                    <option value="{{ $hour }}:00" {{ $selected }}>{{ $hour }}:00</option>
                @endfor
            </select>
        </div>

        <div>
            <label for="count">人数:</label>
            <select id="count" name="count" class="count" required>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ ($i === $reservation->count) ? 'selected' : '' }}>{{ $i }} 人</option>
                @endfor
            </select>
        </div>

        <button type="submit">変更</button>
    </form>
</div>
</body>
@endsection


<style>
.body {
    max-width: 768px;
    height: 800px;
    background-color: #e6e6e6ae;
    display: flex;
    margin: auto;
    padding: auto;
}
</style>
