@extends('layouts.app')

@section('content')

<div class = "w-screen flex justify-center">
    <table class="table border w-5/12 my-10">
        <tr>
            <th>日付</th>
            <td>{{ $record->date }}</td>
        </tr>

        <tr>
            <th>カテゴリー</th>
            <td>{{ $record->category->name }}</td>
        </tr>
        
          <tr>
            <th>金額</th>
            <td>￥{{ $record->amount }}</td>
        </tr>
        
          <tr>
            <th>メモ</th>
            <td>{{ $record->memo }}</td>
        </tr>
    </table>
</div>

{{-- 編集ページへのリンク --}}
    <div class="flex justify-center my-8">
    <a class="btn btn-outline bg-lime-400 mr-5" href="{{ route('records.edit', $record->id) }}">編集</a>
    
     {{-- メッセージ削除フォーム --}}
    <form method="POST" action="{{ route('records.destroy', $record->id) }}">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-outline bg-red-200 text-red-700 ml-5" 
            onclick="return confirm('削除します。よろしいですか？')">削除</button>
    </form>
    </div>
    
@endsection
    