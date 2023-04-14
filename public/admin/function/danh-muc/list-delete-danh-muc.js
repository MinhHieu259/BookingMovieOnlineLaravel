function initTableDanhMuc() {
    var maDanhMucDelete = ''
    $('#table-danh-muc').DataTable({
        "processing": true,
        "columns": [
            {data: "maDanhMuc"},
            {data: "tenDanhMuc"},
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a href="cap-nhat-danh-muc/'+data.maDanhMuc+'" class="btn btn-warning btn-sm float-left">Cập nhật</a>' +
                        '<button class="btn btn-danger btn-sm float-right btnDeleteDanhMuc" data-ma-danh-muc="'+data.maDanhMuc+'">Xóa</button>';
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

function initDataTableDanhMuc() {
    $.ajax({
        type: "GET",
        url: "list-danh-muc-table",
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response.data)
            if (response.status == 200) {
                $('#table-danh-muc').DataTable().clear();
                $('#table-danh-muc').DataTable().rows.add(response.data);
                $('#table-danh-muc').DataTable().draw();
            }
        },
    })
}

function functionDanhMuc() {
    function DeleteDanhMuc(maDanhMuc) {
        $.ajax({
            type: "DELETE",
            url: "/admin/delete-danh-muc/" + maDanhMuc,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    toastr["success"](response.message, 'Thành công');
                    $('#table-danh-muc').DataTable().destroy();
                    initTableDanhMuc();
                    initDataTableDanhMuc();
                    $('#popupCofirmDeleteDanhMuc').modal('hide')
                } else if (response.status == 500) {
                    console.log(response.message)
                }
            },
            error: function (error) {
                toastr["success"](error, 'Lỗi');
            }
        });
    }

    $('#table-danh-muc').on('draw.dt', function () {
        $('.btnDeleteDanhMuc').on('click', function () {
            $('#popupCofirmDeleteDanhMuc').modal('show')
            maDanhMucDelete = $(this).attr("data-ma-danh-muc");
            $('#btnAgreeDeleteDanhMuc').attr('data-ma-danh-muc', maDanhMucDelete)
        })
    })
    $('#btnAgreeDeleteDanhMuc').on('click', (e) => {
        e.preventDefault();
        DeleteDanhMuc(maDanhMucDelete)
    })
}

function btnBackDeleteDanhMuc() {
    $('#btnRefuseDeleteDanhMuc').on('click', () => {
        $('#popupCofirmDeleteDanhMuc').modal('hide')
    })
}
$(document).ready(function () {
    initTableDanhMuc()
    initDataTableDanhMuc()
    functionDanhMuc()
    btnBackDeleteDanhMuc()
})
