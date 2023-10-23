
@extends('layouts.app') 
@section('content')

<div class="prose ml-4">
        <h2>編集</h2>
    </div>
    

        
        <form method="POST" action="{{ route('users.update', $user->id) }}" class="p-form p-form--input-user">
            @csrf
            @method('PUT')
            
            <p>ID: {{ $user->id }}</p>
            <input type="hidden" name="id" value="{{ $user->id }}" />
 
            <div class="p-form__flex-input">
            <p>名前</p>
            <input type="text" name="name" value="{{ $user->name }}">
            </div>
            
            <div class="p-form__flex-input">
            <p>メール</p>
            <input type="mail" name="email" value="{{ $user->mail }}">
            </div>
            
            <input type="submit" value="更新" />
          </form>
       
        </div>
      </div>
    </div>
  </div>
</div>
@endsection