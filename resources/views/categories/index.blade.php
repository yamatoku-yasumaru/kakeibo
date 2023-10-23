@extends('layouts.app')

@section('content')

    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        {{-- ユーザ情報 --}}
        @include('users.index')
    </div>

	@if (isset($categories))
	<div style="margin-top: 50px;">
	<b><h2>カテゴリー</h2></b>
	</div>

    <div class="card-body">  
    <table class="table flex justify-center">
        @foreach($categories as $category)
        <div>
        
            <tr>
                <td>{{$category->name}}</td>
                <td> <a class="btn btn-outline bg-lime-400" href="{{ route('categories.edit', $category->id) }}">編集</a></td>
                <td> <form method="POST" action="{{ route('categories.destroy', $category->id) }}" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline bg-red-200 text-red-700" 
                onclick="return confirm('id = {{ $category->id }} 削除します。よろしいですか？')">削除</button>
                </form></td>
            </tr>
        @endforeach
    
    @endif

    </table>
    <p>
    <a class="btn btn-outline" href="{{ route('categories.create') }}">＋追加</a>
    </p>

    </div>

@endsection