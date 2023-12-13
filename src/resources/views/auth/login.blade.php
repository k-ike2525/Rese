@extends('layouts.app')

@section('content')
<body>
<div class="form_group">
<h2>　Login</h2>
<form class="form_wrap" method="POST" action="{{ route('login') }}">
@csrf

                        <!--//メールアドレス//-->
                            <div class="">
                                <label for="email"><i class="fab fa-twitter"></i></label>
                                <input id="email" type="email" class="" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <!---//パスワード//--->
                            <div class="">
                                <label for="email"><i class="fab fa-twitter"></i></label>
                                <input id="password" type="password" class="" name="password" required autocomplete="current-password" placeholder="パスワード">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="">
                                <button type="submit" class="submit">
                                    {{ __('ログイン') }}
                                </button>

                            </div>
                    </form>
                </div>
</div>
</body>
@endsection
