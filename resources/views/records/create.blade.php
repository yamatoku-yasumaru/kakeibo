
@extends('layouts.app')
@section('content')

<div class='w-screen'>
  <div class="text-2xl text-center my-8"><b>新規作成</b></div>
    
  <section class="p-section p-section__records-input flex justify-center w-screen">
    <form method="POST" action="{{ route('records.store') }}">
      @csrf
      
        <div class="p-form__flex-input flex justify-center mt-4 mb-8"><b>日付</b>
          <label for="date" class="ml-40"><input type="date" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" required></label>
        </div>

        <div class="form-control my-8 flex items-center justify-center">
          <label for="amount" class="label">
            <span class="label-text mr-20"><b>金額</b></span>
            <input type="text" name="amount" class="input input-bordered">
          </label>
        </div>

        <div class="form-control my-8 text-center">
          <label for="category" class="label">
            <span class="label-text"><b>カテゴリー</b></span>
              <select name="category_id">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
              </select>
          </label>
        </div>
            
        <div class="form-control my-8 flex items-center">
            <label for="memo" class="label">
              <span class="label-text mr-20"><b>メモ</b></span>
              <input type="text" name="memo" class="input input-bordered"  maxlength="20">
            </label>
        </div>
        
        <div class="flex justify-center">
         <button class="btn btn-outline bg-orange-300 mr-10" type="submit">登録</button>
         </div>
    </form>
  </section>
  
@endsection
</div>