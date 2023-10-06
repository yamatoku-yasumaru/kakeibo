@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>メッセージ新規作成ページ</h2>
    </div>
@csrf
    
     <!-- データ入力 -->
    <section class="p-section p-section__records-input">

      <form class="p-form p-form--input-record" name="recordInput" action="{{ route('records.store') }}" method="POST">
        <input type="hidden" name="input_time" id="input_time" value="<?php echo date("Y/m/d-H:i:s"); ?>">
        <div class="p-form__flex-input">
          <p>日付</p>
          <label for="date"><input type="date" name="date" id="date" value="<?php echo date("Y-m-d"); ?>" required></label>
        </div>

        <div class="p-form__flex-input">
          <p>金額</p>
          <input type="number" name="amount" id="amount" step="1" maxlength="7" required>
        </div>

        <div class="u-js__show-switch flex p-form__flex-input sp-change-order" id="spendingCategoryBox">
          <p class="long-name">カテゴリー</p>
          <a class="c-button c-button--bg-gray" href="./item-edit.php">編集</a>
        </div>
        
        <div class=

        <input class="c-button c-button--bg-blue" type="submit" value="登録">
      </form>
    </section>