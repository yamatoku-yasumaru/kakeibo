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
                    <label for="date"><input type="date" name="date" id="date" value="{{ $record->date }}" required></label>
                    </div>
                         
                <div class="p-form__flex-input">
                    <p>金額</p>
                    <input type="number" name="amount" value="{{ $record->amount }}" maxlength="7" required>
                </div>
            
                <div class="p-form__flex-input">
                    <p>カテゴリー</p>
                    <input type="text" name="category" value="{{ $record->category }}""  required>
                </div>
                
                <div class="p-form__flex-input">
                    <p>メモ</p>
                    <input type="text" name="memo" value="{{ $record->memo }}" maxlength="20" required>
                </div>

            <button type="submit" class="btn btn-primary btn-outline">更新</button>
        </form>
    </div>

@endsection