@extends('layouts.app')

@section('content')

 @if (Auth::check())
  <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            <aside class="mt-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="sm:col-span-2">
                {{-- 投稿フォーム --}}
                @include('records.index')
            </div>
        </div>
 
  @else
    <div class="prose hero mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10" style="font-family:cursive">
                <h2>Welcome</h2>
            

                {{-- ログインページへのリンク --}}
                <a class="btn btn-primary normal-case" href="{{ route('login') }}">ログイン</a>
                {{-- ユーザ登録ページへのリンク --}}
                <a class="btn btn-primary normal-case" href="{{ route('register') }}">会員登録</a>
            </div>
        </div>
    </div>
    
     @endif
     
@endsection