@extends('layouts.app')

@section('content')
 @if (Auth::check())

        </div>
    </div>
 
  @else
    <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10">
                <h2>Welcome</h2>
                {{-- ログインページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('login') }}">ログイン</a>
                {{-- ユーザ登録ページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">会員登録</a>
            </div>
        </div>
    </div>
     @endif
@endsection