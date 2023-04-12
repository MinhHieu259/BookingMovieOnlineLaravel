function initTablePhong() {
    $('#table-phong').DataTable({
        "processing": true,
        "columns": [
            {data: "maPhong"},
            {data: "tenPhong"},
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a href="cap-nhat-phong/'+data.maPhong+'" class="btn btn-warning btn-sm float-left">Cập nhật</a>' +
                        '<button class="btn btn-danger btn-sm float-right btnDeletePhong" data-ma-phong="'+data.maPhong+'">Xóa</button>';
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

function initDataTablePhong() {
    $.ajax({
        type: "GET",
        url: `/admin/danh-sach-phong-table/${window.location.href.split('/').pop()}`,
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $('#table-phong').DataTable().clear();
                $('#table-phong').DataTable().rows.add(response.data);
                $('#table-phong').DataTable().draw();
            }
        },
    })
}

$(document).ready(function () {
    initTablePhong()
    initDataTablePhong()
})
