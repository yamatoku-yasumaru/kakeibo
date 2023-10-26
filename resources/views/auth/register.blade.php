@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center mb-10" style="font-family:cursive">
        <h2>Sign up</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('register') }}" class="w-1/2">
            @csrf

        <div align="center">
            <div class="form-group row">
                <label for="name" class="label">
                    <span class="label-text">名前</span>
                    <input type="text" name="name" value="{{ old('name') }}" class="input input-bordered w-1/2 my-4">
                </label>
            </div>
        </div>

        <div align="center">
            <div class="form-group row">
                <label for="email" class="label">
                    <span class="label-text">メール</span>
                    <input type="email" name="email" value="{{ old('mail') }}" class="input input-bordered w-1/2 my-4">
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
            <div class="form-group row">
                <label for="password_confirmation" class="label">
                    <span class="label-text">パスワード（確認用）</span>
                    <input type="password" name="password_confirmation" class="input input-bordered w-1/2 my-4">
                </label>
            </div>
        </div>

            <div align="center" class="mt-10">
                <button type="submit" class="btn normal-case bg-red-400">登録</button>
            </div>
        </form>
    </div>
    
@endsection