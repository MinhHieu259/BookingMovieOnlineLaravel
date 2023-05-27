var maBaiVietDelete = ''
function initTablePost() {
    $('#table-bai-viet').DataTable({
        "processing": true,
        "columns": [
            {data: "maBaiViet"},
            {data: "tieuDe"},
            {
                data: null,
                render: function (data, type, row) {
                    return `<img width="150" src="/${data.hinhAnh}" />`
                }
            },
            {data: "username"},
            {
                data: "thoiGianDang"
            },
            {
                data: "thoiGianCapNhat",
                render: function (data, type, row) {
                    if (data) {
                        return data;
                    } else {
                        return "Chưa cập nhật ";
                    }
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a href="cap-nhat-bai-viet/' + data.maBaiViet + '" class="btn btn-warning btn-sm float-left">Cập nhật</a>' +
                        '<button class="btn btn-danger btn-sm float-right btnDeleteBaiViet" data-ma-bai-viet="' + data.maBaiViet + '">Xóa</button>';
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

function initDataTablePost() {
    $.ajax({
        type: "GET",
        url: "/admin/get-list-bai-viet",
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                $('#table-bai-viet').DataTable().clear();
                $('#table-bai-viet').DataTable().rows.add(response.posts);
                $('#table-bai-viet').DataTable().draw();
            }
        },
    })
}

function DeletePost() {
    $('#table-bai-viet').on('draw.dt', function () {
        $('.btnDeleteBaiViet').on('click', function () {
            maBaiVietDelete = $(this).attr("data-ma-bai-viet");
            $('#btnAgree').attr('data-ma-bai-viet', maBaiVietDelete)
            popupConfirm(
                'Xác nhận xóa suất chiếu ?',
                function (e) {
                    e.preventDefault()
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/xoa-bai-viet/" + maBaiVietDelete,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status == 200) {
                                $('#popupCofirm').modal('hide')
                                toastr["success"](response.message, 'Thành công');
                                $('#table-bai-viet').DataTable().destroy();
                                initTablePost();
                                initDataTablePost();
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


$(document).ready(function() {
    initTablePost()
    initDataTablePost()
    DeletePost()
})