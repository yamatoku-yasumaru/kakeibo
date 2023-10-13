@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>編集</h2>
    </div>

    <section class="p-section p-section__records-input">
    
        <form method="POST" action="{{ route('records.update', $record->id) }}" class="p-form p-form--input-record">
            @csrf
            @method('PUT')

                <input type="hidden" name="input_time" id="input_time" value="<?php echo date("Y/m/d-H:i:s"); ?>">
                <div class="p-form__flex-input">
                    <p>日付</p>
                    <label for="date"><input type="date" name="date" id="date" value="{{ $record->date }}" ></label>
                </div>
                         
                <div class="p-form__flex-input">
                    <p>金額</p>
                    <input type="text" name="amount" value="{{ $record->amount }}" maxlength="7" >
                </div>
            
                <div class="form-control my-4">
                    <label for="category" class="label">
                        <span class="label-text">カテゴリー</span>
                    </label>
                    <select name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if(old('category_id') == $category->id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="p-form__flex-input">
                    <p>メモ</p>
                    <input type="text" name="memo" value="{{ $record->memo }}" maxlength="20" >
                </div>

            <button type="submit" class="btn btn-primary btn-outline">更新</button>
        </form>
    </div>

@endsection