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
                <label for="email" class="label">
                     <span class="label-text">メール</span>
                <input type="email" name="email" class="input input-bordered w-1/2 my-4">
                </label>
            </div>
        </div>
        
        <div align="center">
            <div class="form-group row">
                <label for="password" class="label">
                    <span class="label-text">パスワード</span>
                <input type="password" name="password" class="input input-bordered w-1/2 my-4">
                </label>
            </div>
        </div>
            
            <div align="center">
            <button type="submit" class="btn normal-case bg-blue-400">ログイン</button>
            </div>
            
        </form>
    </div>
@endsection