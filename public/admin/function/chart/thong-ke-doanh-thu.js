var chartDoanhThu;
const ctxchartDoanhThu = document.getElementById('chartDoanhThu');
chartDoanhThu = {
    chart: null,
    ChartData: function (ctx, labels, dataDoanhThu) {
        //const labels = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Doanh thu',
                data: dataDoanhThu,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Hủy bỏ biểu đồ cũ nếu tồn tại
        if (this.chart) {
            this.chart.destroy();
        }

        // Tạo biểu đồ mới và gán vào thuộc tính chart
        this.chart = new Chart(ctx, config);
    }
}

function ChangeDate() {
    $('#tuThang').on('blur', function() {
        var startMonth = moment($(this).val(), 'MM/YYYY');
        var endMonth = moment($('#denThang').val(), 'MM/YYYY');

        if ($('#denThang').val().length > 0 && startMonth.isBefore(endMonth)) {
            var dataTableSearch = {
                'tuThang': $('#tuThang').val(),
                'denThang': $('#denThang').val()
            };
            $.ajax({
                type: "GET",
                url: "/admin/get-data-doanh-thu",
                data: dataTableSearch,
                contentType: 'application/json',
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    chartDoanhThu.ChartData(ctxchartDoanhThu, response.listMonth, response.listDoanhThu)
                },
                error: function(err){
                    console.log(err)
                }
            })
        }
    });

    $('#denThang').on('blur', function() {
        var startMonth = moment($('#tuThang'), 'MM/YYYY');
        var endMonth = moment($(this).val(), 'MM/YYYY');

        if ($('#tuThang').val().length > 0) {
            var dataTableSearch = {
                'tuThang': $('#tuThang').val(),
                'denThang': $('#denThang').val()
            };
            $.ajax({
                type: "GET",
                url: "/admin/get-data-doanh-thu",
                data: dataTableSearch,
                contentType: 'application/json',
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    chartDoanhThu.ChartData(ctxchartDoanhThu, response.listMonth, response.listDoanhThu)
                },
                error: function(err){
                    console.log(err)
                }
            })
        }
    });
}

function InitChartDoanhThu() {
    chartDoanhThu.ChartData(ctxchartDoanhThu)
}

$(document).ready(function () {
    InitChartDoanhThu()
    ChangeDate()
})
