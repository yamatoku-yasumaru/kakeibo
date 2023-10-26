@extends('layouts.app')

@section('content')

    @if (Auth::check())
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザ情報 --}}
            @include('users.index')
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
                <h1>Welcome</h1>
            
                {{-- ログインページへのリンク --}}
                <a class="btn normal-case bg-blue-400 mr-5" href="{{ route('login') }}">ログイン</a>
                {{-- ユーザ登録ページへのリンク --}}
                <a class="btn normal-case bg-red-400 ml-5" href="{{ route('register') }}">会員登録</a>
                
            </div>
        </div>
    </div>
    
    @endif
     
@endsection