function search(){
    var dataTableSearch = {
        'trangThai': $('#trangThai').val(),
        'ngayDat': $('#ngayDat').val(),
        'cumRap': $('#cumRap').val(),
        'maPhim': $('#Phim').val()
    };
    $.ajax({
        type: "GET",
        url: "/admin/tim-kiem-order",
        data: dataTableSearch,
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response)
            $('#table-dat-ve-admin').DataTable().clear();
            $('#table-dat-ve-admin').DataTable().rows.add(response);
            $('#table-dat-ve-admin').DataTable().draw();
        },
    })
}
function SearchOrder() {
    $('#trangThai').on('change', function (){
       search()
    })

    $('#ngayDat').on('blur', function (){
        search()
    })

    $('#cumRap').on('change', function (){
        search()
    })

    $('#Phim').on('change', function (){
        search()
    })
}

function initTableDonDat() {
    $('#table-dat-ve-admin').DataTable({
        "processing": true,
        "columns": [
            {data: "maLichSu"},
            {data: "thoiGianDat"},
            {data: "tienDat"},
            {data: "username"},
            {
                data: "trangThai",
                render: function (data, type, row){
                    if (data == 1) {
                        return "Chưa chiếu";
                    } else if (data == 2) {
                        return "Đã chiếu";
                    }
                }
            },
            {data: "loaiThanhToan"},
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a href="/admin/chi-tiet-dat-ve/' + data.maLichSu + '" class="btn btn-warning btn-sm float-left">Xem</a>';
                }
            }
        ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
}


$(document).ready(function () {
    search()
    initTableDonDat()
    SearchOrder()
})
