@extends('layouts.app')
@section('content')

  <div class="prose ml-4">
      <h2>追加</h2>
  </div>
    
  <section class="p-section p-section__records-input">

      <form method="POST" action="{{ route('categories.store') } class="w-1/2" >
        @csrf
        
        <div class="form-control my-4">
            <label for="amount" class="label">
              <span class="label-text">カテゴリー名</span>
            </label>
            <input type="text" name="amount" class="input input-bordered w-1/2">
        </div>
        
         <input class="c-button c-button--bg-blue" type="submit" value="追加">
      </form>
  </section>
  

@endsection