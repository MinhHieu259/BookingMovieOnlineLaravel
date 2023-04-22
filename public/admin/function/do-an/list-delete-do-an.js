function initTableDoAn() {
    var maDoAnDelete = ''
    $('#table-do-an').DataTable({
        "processing": true,
        "columns": [
            {data: "maDoAn"},
            {data: "tenDoAn"},
            {data: "gia"},
            {data: "tenRap"},
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a href="cap-nhat-do-an/' + data.maDoAn + '" class="btn btn-warning btn-sm float-left">Cập nhật</a>' +
                        '<button class="btn btn-danger btn-sm float-right btnDeleteDoAn" data-ma-do-an="' + data.maDoAn + '">Xóa</button>';
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

function initDataTableDoAn() {
    $.ajax({
        type: "GET",
        url: "get-list-do-an",
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response.data)
            if (response.status == 200) {
                $('#table-do-an').DataTable().clear();
                $('#table-do-an').DataTable().rows.add(response.data);
                $('#table-do-an').DataTable().draw();
            }
        },
    })
}

function functionDoAn() {
    function DeleteDoAn(maDoAn) {
        $.ajax({
            type: "DELETE",
            url: "/admin/delete-do-an/" + maDoAn,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    $('#popupCofirm').modal('hide')
                    toastr["success"](response.message, 'Thành công');
                    $('#table-do-an').DataTable().destroy();
                    initTableDoAn();
                    initDataTableDoAn();
                    $('#popupCofirmDeleteDoAn').modal('hide')
                } else if (response.status == 500) {
                    console.log(response.message)
                }
            },
            error: function (error) {
                toastr["success"](error, 'Lỗi');
            }
        });
    }

    $('#table-do-an').on('draw.dt', function () {
        $('.btnDeleteDoAn').on('click', function () {
            // $('#popupCofirmDeleteDoAn').modal('show')
            maDoAnDelete = $(this).attr("data-ma-do-an");
            $('#btnAgree').attr('data-ma-do-an', maDoAnDelete)
            popupConfirm(
                'Xác nhận xóa thông tin đồ ăn ?',
                function (e) {
                    e.preventDefault()
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/delete-do-an/" + maDoAnDelete,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status == 200) {
                                $('#popupCofirm').modal('hide')
                                toastr["success"](response.message, 'Thành công');
                                $('#table-do-an').DataTable().destroy();
                                initTableDoAn();
                                initDataTableDoAn();
                                $('#popupCofirmDeleteDoAn').modal('hide')
                            } else if (response.status == 500) {
                                console.log(response.message)
                            }
                        },
                        error: function (error) {
                            toastr["success"](error, 'Lỗi');
                        }
                    })
                }
            )
        })
    })
    // $('#btnAgreeDeleteDoAn').on('click', (e) => {
    //     e.preventDefault();
    //     DeleteDoAn(maDoAnDelete)
    // })
}

// function btnBackDeleteDoAn() {
//     $('#btnRefuseDeleteDoAn').on('click', () => {
//         $('#popupCofirmDeleteDoAn').modal('hide')
//     })
// }
$(document).ready(function () {
    initTableDoAn()
    initDataTableDoAn()
    functionDoAn()
    //btnBackDeleteDoAn()
})
