<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app" class="container p-3">
        <div class="row">
            <div class="col-md-6">

                <!--  円グラフを表示するキャンバス -->
                <canvas id="chart" width="400" height="400"></canvas>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
    <script>

        new Vue({
            el: '#app',
            data: {
                sales: [],
                month: '{{ date('Y-m') }}',
                years: [],
                chart: null
            },

                getCategories() {

                    //  販売実績データを取得 ・・・ ②
                    fetch('/records/chartjs?month='+ this.month)
                        .then(response => response.json())
                        .then(data => {

                            if(this.chart) { // チャートが存在していれば初期化

                                this.chart.destroy();

                            }

                            //  lodashでデータを加工 ・・・ ③
                            const groupedCategories = _.groupBy(data, 'category'); // 会社ごとにグループ化
                            const amounts = _.map(groupedCategories, aggregationbycategory => {

                                return _.sumBy(aggregationbycategory, 'amount'); // 金額合計

                            });
                            const categoryNames = _.keys(groupedCategories); // 会社名

                            // 👇 円グラフを描画 ・・・ ④
                            const ctx = document.getElementById('chart').getContext('2d');
                            this.chart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    datasets: [{
                                        data: amounts,
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ]
                                    }],
                                    labels: categoryNames
                                },
                                options: {
                                    title: {
                                        display: true,
                                        fontSize: 45,
                                        text: '売上統計'
                                    },
                                    tooltips: {
                                        callbacks: {
                                            label(tooltipItem, data) {

                                                const datasetIndex = tooltipItem.datasetIndex;
                                                const index = tooltipItem.index;
                                                const amount = data.datasets[datasetIndex].data[index];
                                                const amountText = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                                                const company = data.labels[index];
                                                return ' '+ category +' '+amountText +' 円';

                                            }
                                        }
                                    }
                                }
                            });

                        });

                }
            },
            mounted() {

                this.getMonths();
                this.getCategories();

            }
        });

    </script>
</body>
</html>