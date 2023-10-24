import Chart from 'mychart.js';

console.log('ok');
    const ctx = document.getElementById("myPieChart");
    const myPieChart = new Chart(ctx, {
      type: 'pie', // 円グラフを使用
      data: {
        labels: ["A型", "O型", "B型", "AB型"],
        datasets: [{
          backgroundColor: [
            "#BB5179",
            "#FAFF67",
            "#58A27C",
            "#3C00FF"
          ],
          data: [38, 31, 21, 10]
        }]
      },
      options: {
          }
    });