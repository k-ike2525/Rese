@extends('layouts.app')

@section('content')
    <div class="form_group">
        <form class="form_wrap_ttl">
          <div class="form_ttl">
            <p>ご予約ありがとうございます</p>
          </div>
          <div class="form__btn">
            <span class="submit_done" onclick="goBack()">戻る</span>
          </div>
        </form>
    </div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<style>
.submit_done {
    box-sizing: border-box;
    border-radius: 5px;
    border: none;
    background: #004cff;
    color: #fff;
    width: 20px;
    font-size: 15px;
    padding: 10px;
    }
</style>


@endsection