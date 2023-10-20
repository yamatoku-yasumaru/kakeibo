<!--ユーザー編集画面-->

@extends('layouts.app') 
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザ編集</div>
        <div class="card-body">
          <!-- 重要な箇所ここから -->
        <form method="POST" action="{{ route('users.update', $user->id) }}" class="p-form p-form--input-user">
            @csrf
            <p>ID: {{ $user->id }}</p>
            <input type="hidden" name="id" value="{{ $user->id }}" />
            <p>名前</p>
            <input type="text" name="name" value="{{ $user->name }}" />
            <p>メール</p>
            <input type="text" name="email" value="{{ $user->mail }}" /><br />
            <input type="submit" value="更新" />
          </form>
          <!-- 重要な箇所ここまで -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection