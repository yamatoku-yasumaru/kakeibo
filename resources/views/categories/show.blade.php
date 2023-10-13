@extends('layouts.app')

@section('content')


    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $category->id }}</td>
        </tr>

        <tr>
            <th>カテゴリー名</th>
            <td>{{ $category->name }}</td>
        </tr>
        
         
    </table>

{{-- 編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('categoriess.edit', $categories->id) }}">編集</a>
    
     {{-- メッセージ削除フォーム --}}
    <form method="POST" action="{{ route('categoriess.destroy', $categories->id) }}" class="my-2">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $category->id }} 削除します。よろしいですか？')">削除</button>
    </form>
@endsection
    