
@extends('layouts.app')
@section('content')
    <div class='bg-white p-6 roundded shadow'>
        <div class=text-x2 mb-6>
            <h2>今月の合計</h2>
         <p class='text-2xl'>￥</p>
        </div>    
    </div>
    
    <div class='bg-white p-6 roundded shadow'>
        <div class=text-x1 mb-6>
            <h2>今月の収入</h2>
            <p class='text-2xl'>￥</p>
        </div>
    </div>
    
    <div class='bg-white p-6 roundded shadow'>
        <div class=text-x1 mb-6>
            <h2>今月の支出</h2>
            <p class='text-2xl'>￥</p>
        </div>
    </div>
    
<!--カレンダー表示-->
<html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <div id='calendar'></div>
</body>
</html>

@endsection