@extends('layouts.app')

@section('content')
<body>
<div class="form_group">
<h2>　Login</h2>
<form class="form_wrap" method="POST" action="{{ route('login') }}">
@csrf

<style>
    .invalid-feedback{
    margin: 0;
    color: red;
    font-size: 13px;
    }
</style>

                        <!--//メールアドレス//-->
                            <div class="">
                                <label for="email"><i class="fa-solid fa-square-envelope"></i></label>
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                            </div>

                        <!---//パスワード//--->
                            <div class="">
                                <label for="email"><i class="fa-solid fa-square-pen"></i></label>
                                <input id="password" type="password" class="" name="password" required autocomplete="current-password" placeholder="Password">
                            </div>

                            <div class="">
                                <button type="submit" class="submit">
                                    {{ __('ログイン') }}
                                </button>
                            </div>
                            <div> 
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                    </form>
                </div>
</div>
</body>
@endsection
