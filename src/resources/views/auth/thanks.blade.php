@extends('layouts.app')

@section('content')
    <div class="form_group">
        <form class="form_wrap_ttl">
            <div class="form_ttl">
              <p>会員登録ありがとうございます</p>
            </div>
            <div class="form__btn">
              <span class="submit" type="submit" onclick="redirectToLogin()" href="{{ url('login') }}">ログインする</span>
            </div>
        </form>
    </div>

        <script>
        function redirectToLogin() {
            window.location.href = "{{ url('login') }}";
        }
    </script>
@endsection