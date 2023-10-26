@extends('layouts.app')

@section('content')
<div class = "w-screen">
    
    <div class="flex justify-center items-center"><b>
        <a href="/records?month={{ $prev_month }}" id="prev" class="btn btn-outline bg-slate-100">前月</a> < <span id="now" class="text-2xl underline">{{ $month }}</span> ><a href="/records?month={{ $next_month }}" id="next" class="btn btn-outline bg-slate-100">次月</a>
    </div></b>
    
   <!--合計表示-->
    <div class='border rounded-md bg-emerald-300 p-2 shadow-sm my-10 mx-7'>
        <div class="text-x1"><b>今月の合計</b></div>
            <div class='text-2xl bg-white px-4 py-4'>￥{{ number_format($amount_income - $amount_outcome) }}</div>
    </div>
    
    <div class="flex">
        <div class="rounded-md border bg-orange-300 p-2 shadow-sm flex-1 ml-7 mr-6"><b>今月の収入</b>
            <p class='text-2xl bg-white px-4 py-4'>￥{{ number_format($amount_income) }}</p>
        </div>
    
        <div class="rounded-md border bg-blue-400 p-2 shadow-sm flex-1 ml-6 mr-7"><b>今月の支出</b>
            <p class='text-2xl bg-white px-4 py-4'>￥{{ number_format($amount_outcome) }}</p>
        </div>
    </div>
    
    <!--カレンダー表示-->
    <div class="card-body">
        <div id='calendar'></div>
    </div>

    <!--入力済みのデータ表示-->
    <div class="card-body flex justify-center w-screen">
    @if (isset($records))
        <table class="table w-full my-3">
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
            <td><b>￥{{number_format($record->amount)}}</td></b>
          
            <td> <a class="btn btn-outline bg-lime-400" href="{{ route('records.edit', $record->id) }}">編集</a></td>
            <td> <form method="POST" action="{{ route('records.destroy', $record->id) }}" >
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline bg-red-200 text-red-700" 
                onclick="return confirm('id = {{ $record->id }} を削除します。よろしいですか？')">削除</button>
            </form></td>
        </tr>
        @endforeach
    
        </tbody>
        </table>
    @endif

        <td class="button-td">
    </div>
            
    {{-- ページネーションのリンク --}}
    {{ $records->links() }}

@endsection
</div>