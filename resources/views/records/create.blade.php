@extends('layouts.app')
@section('content')

  <div class="prose ml-4">
      <h2>新規作成</h2>
  </div>
    
  <section class="p-section p-section__records-input">

      <form method="POST" action="{{ route('records.store') } class="p-form p-form--input-record" >
        @csrf
      
        <input type="hidden" name="input_time" id="input_time" value="<?php echo date("Y/m/d-H:i:s"); ?>">
        <div class="p-form__flex-input">
          <p>日付</p>
          <label for="date"><input type="date" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" required></label>
        </div>

         <div class="form-control my-4">
            <label for="amount" class="label">
              <span class="label-text">金額:</span>
            </label>
            <input type="text" name="amount" class="input input-bordered w-1/2">
        </div>
        
        <div class="form-control my-4">
             <label for="memo" class="label">
              <span class="label-text">カテゴリー:</span>
            </label>
            <input type="text" name="category" class="input input-bordered w-1/2">
        </div>
            
        <div class="form-control my-4">
            <label for="memo" class="label">
              <span class="label-text">メモ:</span>
            </label>
            <input type="text" name="memo" class="input input-bordered w-1/2">
        </div>

        <input class="c-button c-button--bg-blue" type="submit" value="登録">
      </form>
  </section>