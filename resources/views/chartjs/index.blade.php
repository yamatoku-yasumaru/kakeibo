@extends('layouts.app')
@section('content')

<div class="w-screen">
  <p class="text-center text-2xl my-10"><b>集計</b></p>
  
  <div class="flex justify-center items-center"><b>
      <a href="/chart?month={{ $prev_month }}" id="prev" class="btn btn-outline bg-slate-100">前月</a> < <span id="now" class="text-2xl underline">{{ $month }}</span> ><a href="/chart?month={{ $next_month }}" id="next" class="btn btn-outline bg-slate-100">次月</a>
  </div></b>

<p style="height: 40px;"></p>
  <div style="position: relative; width: 38vw; height: 38vh; margin: 0 auto">
    <canvas id="myPieChart">
  </div>

  <script>
    const ctx = document.getElementById("myPieChart");
    const myPieChart = new Chart(ctx, {
      type: 'pie',// 円グラフを使用
      data: {
        labels: @json($labels),
        datasets: [{
          backgroundColor: [
            "#87ceeb",
            "#5f9ea0",
            "#db7093",
            "#e9967a",
            "#f0e68c",
            "#dda0dd",
            "#b0c4de",
          ],
          data: @json($data),
        }]
      },
      options: {
          }
    });
  </script>
@endsection
</div>
