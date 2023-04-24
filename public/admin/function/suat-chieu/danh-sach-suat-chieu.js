var maSuatChieuDelete = ''
function initTableSuatChieu() {
    $('#table-suat-chieu').DataTable({
        "processing": true,
        "columns": [
            {data: "maSuatChieu"},
            {data: "ngayChieu"},
            {data: "gioChieu"},
            {data: "tenRap"},
            {data: "tenPhong"},
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a href="/admin/cap-nhat-suat-chieu/' + data.maSuatChieu + '" class="btn btn-warning btn-sm float-left">Cập nhật</a>' +
                        '<button class="btn btn-danger btn-sm float-left ml-3 btnDeleteSuatChieu" data-ma-suat-chieu="' + data.maSuatChieu + '">Xóa</button>'+
                        '<a href="/admin/danh-sach-ghe/'+data.maPhong+'/'+ data.maSuatChieu + '" class="btn btn-primary btn-sm float-left ml-3 btnViewChair" data-ma-suat-chieu="' + data.maSuatChieu + '">Xem Ghế</a>';
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

function initDataTableSuatChieu() {
    $.ajax({
        type: "GET",
        url: "/admin/get-list-suat-chieu/" + $('#maPhim').val(),
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response.suatChieus)
            if (response.status == 200) {
                $('#table-suat-chieu').DataTable().clear();
                $('#table-suat-chieu').DataTable().rows.add(response.suatChieus);
                $('#table-suat-chieu').DataTable().draw();
            }
        },
    })
}

function deleteSuatChieu() {
    $('#table-suat-chieu').on('draw.dt', function () {
        $('.btnDeleteSuatChieu').on('click', function () {
            maSuatChieuDelete = $(this).attr("data-ma-suat-chieu");
            $('#btnAgree').attr('data-ma-do-an', maSuatChieuDelete)
            popupConfirm(
                'Xác nhận xóa suất chiếu ?',
                function (e) {
                    e.preventDefault()
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/delete-suat-chieu/" + maSuatChieuDelete,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status == 200) {
                                $('#popupCofirm').modal('hide')
                                toastr["success"](response.message, 'Thành công');
                                $('#table-suat-chieu').DataTable().destroy();
                                initTableSuatChieu();
                                initDataTableSuatChieu();
                            } else if (response.status == 500) {
                                toastr["error"](response.message, 'Lỗi');
                            }
                        },
                        error: function (error) {
                            toastr["error"](error, 'Lỗi');
                        }
                    })
                }
            )
        })
    })
}

$(document).ready(function () {
    initTableSuatChieu()
    initDataTableSuatChieu()
    deleteSuatChieu()
})
