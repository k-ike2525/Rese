@extends('layouts.app')

@section('content')
    <div class="form_group">
        <form class="form_wrap_ttl">
          <div class="form_ttl">
            <p>ご予約ありがとうございます</p>
          </div>
          <div class="form__btn">
            <span class="submit" onclick="goBack()">戻る</span>
          </div>
        </form>
    </div>

<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection