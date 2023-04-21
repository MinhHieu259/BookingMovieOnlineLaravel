var maPhimDelete = ''
function initTablePhim() {
    $('#table-phim').DataTable({
        "processing": true,
        "columns": [
            {data: "maPhim"},
            {data: "tenPhim"},
            {data: "giaVe"},
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a href="cap-nhat-phim/'+data.maPhim+'" class="btn btn-warning btn-sm float-left">Cập nhật</a>' +
                        '<button class="btn btn-danger btn-sm float-left btnDeletePhim" style="margin-left: 10px" data-ma-phim="'+data.maPhim+'">Xóa</button>'+
                        '<a href="/admin/quan-ly-lich-chieu/'+window.location.href.split('/').pop()+'/'+data.maPhim+'" style="margin-left: 10px" class="btn btn-success btn-sm btnSuatChieu" data-ma-phong="' + data.maPhim + '">Lịch chiếu</a>';
                    ;
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

function initDataTablePhim() {
    $.ajax({
        type: "GET",
        url: "get-list-phim",
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response.data)
            if (response.status == 200) {
                $('#table-phim').DataTable().clear();
                $('#table-phim').DataTable().rows.add(response.data);
                $('#table-phim').DataTable().draw();
            }
        },
    })
}

function functionPhim() {
    function DeletePhim(maPhim) {
        $.ajax({
            type: "DELETE",
            url: "/admin/delete-phim/" + maPhim,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    $('#popupCofirm').modal('hide')
                    toastr["success"](response.message, 'Thành công');
                    $('#table-phim').DataTable().destroy();
                    initTablePhim();
                    initDataTablePhim();
                    $('#popupCofirmDeletePhim').modal('hide')
                } else if (response.status == 500) {
                    console.log(response.message)
                }
            },
            error: function (error) {
                toastr["success"](error, 'Lỗi');
            }
        });
    }

    $('#table-phim').on('draw.dt', function () {
        $('.btnDeletePhim').on('click', function () {
            $('#popupCofirmDeletePhim').modal('show')
            maPhimDelete = $(this).attr("data-ma-phim");
            $('#btnAgreeDeletePhim').attr('data-ma-phim', maPhimDelete)
        })
    })
    $('#btnAgreeDeletePhim').on('click', (e) => {
        e.preventDefault();
        DeletePhim(maPhimDelete)
    })
}

function btnBackDeletePhim() {
    $('#btnRefuseDeletePhim').on('click', () => {
        $('#popupCofirmDeletePhim').modal('hide')
    })
}

$(document).ready(function () {
    initTablePhim()
    initDataTablePhim()
    functionPhim()
    btnBackDeletePhim()
})
