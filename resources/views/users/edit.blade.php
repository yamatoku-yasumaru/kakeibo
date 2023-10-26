
@extends('layouts.app') 
@section('content')

<div class="w-screen flexjustify-center">
<div class="text-2xl text-center my-8"><b>編集</b></div>
    
    <form method="POST" action="{{ route('users.update', $user->id) }}" class="p-form p-form--input-user">
        @csrf
        @method('PUT')
 
        <div class="p-form__flex-input">
            <label for="name" class="label flex justify-center my-8">名前
            <input type="text" name="name" value="{{ $user->name }}"  class="input input-bordered ml-40">
            </label>
        </div>
            
        <div class="p-form__flex-input">
            <label for="mail" class="label flex justify-center my-8">メール
            <input type="email" name="email" value="{{ $user->email }}"  class="input input-bordered ml-40">
            </label>
        </div>
         
         <div class="flex justify-center mt-10">   
        <button class="btn btn-outline bg-orange-300" type="submit">更新</button>
        </div>
    </form>
       
@endsection
</div>