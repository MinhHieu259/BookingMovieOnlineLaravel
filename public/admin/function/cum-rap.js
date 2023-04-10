function initTableCumRap() {
    var maCumDelete = ''
    $('#table-cum-rap').DataTable({
        "processing": true,
        "columns": [
            {data: "maChiTietRap"},
            {data: "tenRap"},
            {data: "diaChi"},
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a href="cap-nhat-cum-rap/'+data.maChiTietRap+'" class="btn btn-warning btn-sm float-left">Cập nhật</a>' +
                        '<button class="btn btn-danger btn-sm float-right btnDeleteCumRap" data-ma-cum="'+data.maChiTietRap+'">Xóa</button>';
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

function initDataTableCumRap() {
    $.ajax({
        type: "GET",
        url: "get-list-cum-rap",
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $('#table-cum-rap').DataTable().clear();
                $('#table-cum-rap').DataTable().rows.add(response.data);
                $('#table-cum-rap').DataTable().draw();
            }
        },
    })
}

function functionCumRap() {
    function DeleteCumRap(maCum) {
        $.ajax({
            type: "DELETE",
            url: "/admin/delete-cum-rap/" + maCum,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    $('#popupCofirm').modal('hide')
                    toastr["success"](response.message, 'Thành công');
                    // var row = $("#table-cum-rap").find("tbody tr").filter(function () {
                    //     return $(this).find(".btnDeleteCumRap").data("ma-cum") === maCum;
                    // });
                    // row.remove();
                    $('#table-cum-rap').DataTable().destroy();
                    initTableCumRap();
                    initDataTableCumRap();
                    $('#popupCofirmDeleteCumRap').modal('hide')
                } else if (response.status == 500) {
                    console.log(response.message)
                }
            },
            error: function (error) {
                toastr["success"](error, 'Lỗi');
            }
        });
    }

    $('#table-cum-rap').on('draw.dt', function () {
        $('.btnDeleteCumRap').on('click', function () {
            $('#popupCofirmDeleteCumRap').modal('show')
            maCumDelete = $(this).attr("data-ma-cum");
            $('#btnAgreeDeleteCum').attr('data-ma-cum', maCumDelete)
        })
    })
    $('#btnAgreeDeleteCum').on('click', (e) => {
        e.preventDefault();
        DeleteCumRap(maCumDelete)
    })
}

function btnBackDeleteCum() {
    $('#btnRefuseDeleteCum').on('click', () => {
        $('#popupCofirmDeleteCumRap').modal('hide')
    })
}

$(document).ready(function () {
    initTableCumRap()
    initDataTableCumRap()
    functionCumRap()
    btnBackDeleteCum()
})
