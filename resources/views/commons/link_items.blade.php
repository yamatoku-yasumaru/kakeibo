@if (Auth::check())
    {{-- ホームへのリンク --}}
    <li><a class="link link-hover" href="{{ route('records.index') }}">ホーム</a></li>
    {{-- 新規作成へのリンク --}}
    <li><a class="link link-hover" href="{{ route('records.create') }}">新規作成</a></li>
    {{-- 集計へのリンク--}}
    
    {{-- ユーザ詳細ページへのリンク --}}
    <li><a class="link link-hover" href="#">プロフィール</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">ログイン</a></li>
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">会員登録</a></li>
    <li class="divider lg:hidden"></li>
@endif