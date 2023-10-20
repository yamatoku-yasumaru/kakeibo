
@extends('layouts.app')
@section('content')

  
  <div class="prose text-center md:container md:mx-auto"">
    <h2>新規作成</h2>
  </div>
    
  <section class="p-section p-section__records-input">
    <form method="POST" action="{{ route('records.store') }}">
      @csrf
        
        <input type="hidden" name="date" id="date" value="<?php echo date("Y/m/d"); ?>">
        <div class="p-form__flex-input md:container md:mx-auto">日付
          <label for="date"><input type="date" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" required></label>
        </div>

        <div class="form-control my-4">
          <label for="amount" class="label">
            <span class="label-text">金額:</span>
            <input type="text" name="amount" class="input input-bordered w-1/2">
          </label>
        </div>
        
        <div class="form-control my-4">
          <label for="category" class="label">
            <span class="label-text">カテゴリー:</span>
              <select name="category_id">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
              </select>
          </label>
        </div>
            
        <div class="form-control my-4">
            <label for="memo" class="label">
              <span class="label-text">メモ:</span>
              <input type="text" name="memo" class="input input-bordered w-1/2">
            </label>
        </div>

        <a class="btn btn-outline bg-orange-300" type="submit">登録</a>
    </form>
  </section>
  
@endsection