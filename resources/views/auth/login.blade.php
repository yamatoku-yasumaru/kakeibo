@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center" style="font-family:cursive">
        <h2>Log in</h2>
    </div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-1/2">
            @csrf

        <div align="center">            
            <div class="form-group row">
                <label for="email" class="label w-4/5 my-4">
                     <span class="label-text">メール</span>
                <input type="email" name="email" class="input input-bordered">
                </label>
            </div>
        </div>
        
        <div align="center">
            <div class="form-group row">
                <label for="password" class="label w-4/5 my-4"">
                    <span class="label-text">パスワード</span>
                <input type="password" name="password" class="input input-bordered">
                </label>
            </div>
        </div>
            
            <div align="center">
            <button type="submit" class="btn btn-primary btn">ログイン</button>
            </div>
            
        </form>
    </div>
@endsection