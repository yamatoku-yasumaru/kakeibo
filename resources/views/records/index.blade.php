@extends('layouts.app')

@section('content')

    <div class='bg-white p-6 roundded shadow'>
        <div class=text-x2 mb-6>
            <thead>
                <tr>
                    <th>当月合計</th>
                 </tr>
            </thead>
        </div>
    <div>
   
      <tr>
        <td>￥{{ $total_amount }}</td>
      </tr>
    
    
<!--カレンダー表示-->
<html lang="ja">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <div id='calendar'></div>
</body>
</html>


  @if (isset($records))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>カテゴリー</th>
                    <th>メモ</th>
                    <th>金額</th>
                </tr>
            </thead>
            <tbody>
     @foreach($records as $record)
        <tr>
            <td><a class="link link-hover text-info" href="{{ route('records.show', $record->id) }}">{{ $record->date }}</a></td>
            <td>{{$record->category->name}}</td>
            <td>{{$record->memo}}</td>
            <td>{{$record->amount}}</td>
            <td> <a class="btn btn-outline" href="{{ route('records.edit', $record->id) }}">編集</a></td>
            <td> <form method="POST" action="{{ route('records.destroy', $record->id) }}" >
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $record->id }} 削除します。よろしいですか？')">削除</button>
    </form></td>
        </tr>
    @endforeach
    
            </tbody>
        </table>
    @endif


        <td class="button-td">
            
 

                           
@endsection