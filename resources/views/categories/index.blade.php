@extends('layouts.app')

@section('content')

<div class="w-screen"> 

    <!-- 会員登録後ページ遷移したときのみメッセージ -->
    @if (session('flash_message'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 p-5 shadow-md w-4/5 mx-auto" role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
              <p class="font-extrabold">{{ session('flash_message') }}</p>
              <p class="text-base">カテゴリーの登録がないとデータを登録することができません。</p>
              <p class="text-base">※このメッセージは今回のみ表示されます。</p>
             </div>
        </div>
    </div>
    @endif
    
    <!--ユーザー情報の表示 -->   
    <div class="card-body">
        <div class="text-2xl ml-5 mb-8"><b>ユーザー</b></div>
        <div class="flex justify-center"> @include('users.index')</div>
        <div class="flex justify-center mt-10">
            <a class="btn btn-outline bg-lime-400 mr-8" href="{{ route('users.edit', Auth::user()->id) }}">編集</a>
            <form method="POST" action="{{ route('users.destroy', Auth::user()->id) }}" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline bg-red-200 text-red-700 ml-8" 
                    onclick="return confirm('ユーザー情報を削除します。本当によろしいですか？')">削除</button>
            </form>
        </div>
    </div>

    <!--カテゴリー一覧-->
    <div class="card-body"> 
        <div class="text-2xl ml-5 my-8"><b>カテゴリー</b></div>
	    
	    <div class="flex justify-center">
        @if (isset($categories))
            <table class="table border w-5/6">
                @foreach($categories as $category)
                <div>
                    <tr>
                        <td>{{$category->name}}</td>
                        <td> <a class="btn btn-outline bg-lime-400" href="{{ route('categories.edit', $category->id) }}">編集</a></td>
                        <td> <form method="POST" action="{{ route('categories.destroy', $category->id) }}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline bg-red-200 text-red-700" 
                        onclick="return confirm('カテゴリーを削除します。よろしいですか？')">削除</button>
                        </form></td>
                         @if (session('message'))
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 p-5 shadow-md w-4/5 mx-auto" role="alert">
                                <div class="flex">
                                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                    <div>
                                      <p class="font-extrabold">{{ session('flash_message') }}</p>
             </div>
        </div>
    </div>
    @endif
                    </tr>
                </div>
                @endforeach
            </table>
        @endif
        </div>
            <div class="flex justify-center">
            <a class="btn btn-outline w-3/12 mt-10" href="{{ route('categories.create') }}">➕追加</a>
            </div>
    </div>

@endsection
</div>