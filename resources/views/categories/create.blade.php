@extends('layouts.app')
@section('content')

<div class="w-screen">
  
  <div class="text-2xl text-center my-8"><b>カテゴリー追加</b></div>
    
  <section class="p-section p-section__categories-input">

      <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        
        <div class="form-control my-4">
            <label for="category" class="label flex justify-center my-8">カテゴリー名
            <input type="text" name="category" class="input input-bordered ml-40">
            </label>
        </div>
        
        <div class="flex justify-center">
          <input class="btn bg-amber-200" type="submit" value="追加">
        </div>
      </form>
  </section>
  
@endsection
</div>