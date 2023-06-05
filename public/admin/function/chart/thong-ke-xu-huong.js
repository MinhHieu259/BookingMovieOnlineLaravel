var chartXuHuong;
const ctxchartXuHuong = document.getElementById('chartXuHuong');
chartXuHuong = {
    chart: null,
    ChartData: function (ctx, labels, dataXuHuong) {
        //const labels = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Xu hướng',
                data: dataXuHuong,
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
                borderWidth: 1,
                hoverOffset: 4
            }]
        };

        const config = {
            type: 'pie',
            data: data
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
    $('#Phim').on('change', function() {
       
            var dataTableSearch = {
                'maPhim': $('#Phim').val(),
                'tieuChi': $('#tieuChi').val()
            };
            $.ajax({
                type: "GET",
                url: "/admin/get-data-xu-huong",
                data: dataTableSearch,
                contentType: 'application/json',
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    chartXuHuong.ChartData(ctxchartXuHuong, response.label, response.data)
                },
                error: function(err){
                    console.log(err)
                }
            })
    });

    $('#tieuChi').on('change', function() {
       
        var dataTableSearch = {
            'maPhim': $('#Phim').val(),
            'tieuChi': $('#tieuChi').val()
        };
        $.ajax({
            type: "GET",
            url: "/admin/get-data-xu-huong",
            data: dataTableSearch,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                console.log(response)
                chartXuHuong.ChartData(ctxchartXuHuong, response.label, response.data)
            },
            error: function(err){
                console.log(err)
            }
        })
});

}

function InitchartXuHuong() {
    chartXuHuong.ChartData(ctxchartXuHuong)
}

$(document).ready(function () {
     InitchartXuHuong()
    ChangeDate()
})
