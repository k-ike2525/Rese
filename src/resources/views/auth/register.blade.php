@extends('layouts.app')

@section('content')
<div class="form__group">
<h2>　Registration</h2>
<form class="form_wrap" method="POST" action="{{ route('register') }}">
@csrf
                            <!--//名前//-->
                                <div class="" >
                                  <label for="password"><i class="fab fa-twitter"></i></label>
                                  <input id="name" type="text" class="" name="name"  required autocomplete="name" placeholder="名前">
                                </div>
                                <div class="form__error">
            @error('name')
            {{ $message }}
            @enderror
                                </div>

                            <!--//メールアドレス//-->
                                <div class="" >
                                                    <label for="password"><i class="fab fa-twitter"></i></label>
                                  <input id="email" type="email" class="" name="email"  required autocomplete="email" placeholder="メールアドレス">
                                </div>
                                <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
                                </div>

                            <!---//パスワード//--->
                                <div class="" >
                                                    <label for="password"><i class="fab fa-twitter"></i></label>
                                <input id="password" type="password" class="" name="password" required autocomplete="new-password" placeholder="パスワード">
                                </div>
                                <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
                                </div>

                                <div class="" >
                                <button type="submit" class="submit">
                                    {{ __('登録') }}
                                </button>
                            </div>
</form>

</div>


@endsection
