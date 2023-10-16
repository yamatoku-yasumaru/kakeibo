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
    
      <div>
        @if (Auth::id() == $category->user_id)
            {{-- 投稿削除ボタンのフォーム --}}
            <form method="POST" action="{{ route('categoriess.destroy', $category->id) }}">
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-error btn-sm normal-case" 
            onclick="return confirm('Delete id = {{ $category->id }} ?')">Delete</button>
            </form>
         @endif
    </div>
@endsection
    