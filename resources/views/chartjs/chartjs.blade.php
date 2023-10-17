<html>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <div>
        <canvas id="myChart"></canvas>
    </div>
</body>
</html>

// as $key => $valueの場合、
@foreach($array_datas as $key => $value)
     <div class="box">
         <p>keyは{{ $key }}で、valueは{{ $value }}だよ</p>
     </div>
@endforeach