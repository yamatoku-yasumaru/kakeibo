@extends('layouts.app')

@section('content')


    <table class="table w-full my-4">
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
            <td>{{ $record->amount }}</td>
        </tr>
        
          <tr>
            <th>メモ</th>
            <td>{{ $record->memo }}</td>
        </tr>
    </table>

{{-- 編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('records.edit', $record->id) }}">編集</a>
    
     {{-- メッセージ削除フォーム --}}
    <form method="POST" action="{{ route('records.destroy', $record->id) }}" class="my-2">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $record->id }} 削除します。よろしいですか？')">削除</button>
    </form>
@endsection
    