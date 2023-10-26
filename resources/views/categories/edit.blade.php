@extends('layouts.app')

@section('content')


<div class="w-screen">
    <div class="text-2xl text-center my-8"><b>編集</b></div>

    <section class="p-section p-section__categories-input">
        <form method="POST" action="{{ route('categories.update', $category->id) }}" class="p-form p-form--input-category">
            @csrf
            @method('PUT')
            
                <div class="flex justify-center">
                    <label>カテゴリー
                    <input type="text" name="category" value="{{ $category->name }}" maxlength="20" class="input input-bordered ml-40">
                    </label>
                </div>
                
            <div class="flex justify-center mt-10">
            <button type="submit" class="btn btn-outline bg-orange-300">更新</button>
            </div>
        </form>
    </section>
    </div>

@endsection

</div>