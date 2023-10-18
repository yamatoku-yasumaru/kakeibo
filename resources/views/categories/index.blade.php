@extends('layouts.app')

@section('content')

 <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
    </div>


	@if (isset($categories))
	<label for="category">カテゴリー</label>

    <table class="table  w-1/2 my-4">
        @foreach($categories as $category)
        <div>
        
        <tr>
            <td>{{$category->name}}</td>
            
            <td> <a class="btn btn-outline" href="{{ route('categories.edit', $category->id) }}">編集</a></td>
            <td> <form method="POST" action="{{ route('categories.destroy', $category->id) }}" >
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $category->id }} 削除します。よろしいですか？')">削除</button>
            </form></td>
        </tr>
        @endforeach
    
    @endif

</div>

     <a class="btn btn-outline" href="{{ route('categories.create') }}">＋追加</a>

@endsection