@extends('layouts.app')

@section('content')

    <div class="text-2xl flex justify-center my-8"><b>編集</b></div>

    <section class="p-section p-section__records-input flex justify-center w-screen">
    
        <form method="POST" action="{{ route('records.update', $record->id) }}" class="p-form p-form--input-record">
            @csrf
            @method('PUT')

                <input type="hidden" name="date" id="date" value="<?php echo date("Y/m/d"); ?>">
                <div class="p-form__flex-input flex justify-center mt-4 mb-8"><b>日付</b>
                    <label for="date" class="ml-40"><input type="date" name="date" id="date" value="{{ $record->date }}" ></label>
                </div>
                         
                <div class="form-control my-8 flex items-center justify-center">
                    <label for="amount" class="label">
                        <span class="label-text mr-20"><b>金額</b></span>
                        <input type="text" name="amount" value="{{ $record->amount }}" maxlength="7" class="input input-bordered">
                    </label>
                </div>
            
                <div class="form-control my-8 text-center">
                    <label for="category" class="label">
                        <span class="label-text"><b>カテゴリー</b></span>
                        <select name="category_id">
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if(old('category_id') == $record->category_id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                        </select>
                    </label>
                </div>
                
                <div class="form-control my-8 flex items-center">
                    <label for="memo" class="label">
                        <span class="label-text mr-20"><b>メモ</b></span>
                        <input type="text" name="memo" value="{{ $record->memo }}" maxlength="20" class="input input-bordered">
                    </label>
                </div>

            <div class = "flex justify-center">
            <button class="btn btn-outline bg-orange-300 flex items-center" type="submit">更新</button>
            </div>
        </form>
    </div>

@endsection