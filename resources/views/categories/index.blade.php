@extends('layouts.app')

@section('content')

	@if (isset($categories))
	<label for="category">カテゴリ</label>
    <select name="category" id="category">
    	@foreach($categories as $category)
        	<option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
                 
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $category->id }} 削除します。よろしいですか？')">削除</button>
            </div>
    </select>
	@endif

 <a class="btn btn-outline" href="{{ route('categories.create', $category->name) }}">＋追加</a>
                

@endsection