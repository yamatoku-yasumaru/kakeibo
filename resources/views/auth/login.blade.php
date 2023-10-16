@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <h2>Log in</h2>
    </div>
    
    <div class="flex justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-4/5">
            @csrf

            <div class="form-group row">
                <label for="email" class="label">
                     <span class="label-text">メール</span>
                <input type="email" name="email" class="input input-bordered">
                </label>
            </div>

            <div class="form-group row">
                <label for="password" class="label">
                    <span class="label-text">パスワード</span>
                <input type="password" name="password" class="input input-bordered">
                </label>
            </div>
            
            <div align="center">
            <button type="submit" class="btn btn-primary btn">ログイン</button>
            </div>
            
        </form>
    </div>
@endsection