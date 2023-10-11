@if (Auth::check())
    {{-- ホームへのリンク --}}
    <li><a class="link link-hover" href="{{ route('records.index') }}">ホーム</a></li>
    {{-- 新規作成へのリンク --}}
    <li><a class="link link-hover" href="{{ route('records.create') }}">新規作成</a></li>
    {{-- 集計へのリンク--}}
    
    {{-- 設定（ユーザー詳細・カテゴリー詳細）へのリンク --}}
    <li><a class="link link-hover" href="{{ route('categories.index') }}">設定</a></li>
    
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a></li>
@else
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">ログイン</a></li>
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">会員登録</a></li>
    <li class="divider lg:hidden"></li>
@endif