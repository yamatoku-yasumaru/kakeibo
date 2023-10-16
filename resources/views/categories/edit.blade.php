@extends('layouts.app')

@section('content')


    
    <div class="prose ml-4">
        <h2>編集</h2>
    </div>

    <section class="p-section p-section__categories-input">
    
        <form method="POST" action="{{ route('categories.update', $category->id) }}" class="p-form p-form--input-category">
            @csrf
            @method('PUT')
            
                <div class="p-form__flex-input">
                    <p>カテゴリー</p>
                    <input type="text" name="category" value="{{ $category->name }}" maxlength="20" >
                </div>

            <button type="submit" class="btn btn-primary btn-outline">更新</button>
        </form>

        	
    </section>

@endsection