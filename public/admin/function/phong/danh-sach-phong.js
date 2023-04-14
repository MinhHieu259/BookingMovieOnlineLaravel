function initTablePhong() {
    $('#table-phong').DataTable({
        "processing": true,
        "columns": [
            {data: "maPhong"},
            {data: "tenPhong"},
            {
                data: null,
                render: function (data, type, row) {
                    return ' <a data-ma-phong="' + data.maPhong + '" class="btn btn-warning btn-sm float-left btnEditPhong">Cập nhật</a>' +
                        '<button class="btn btn-danger btn-sm float-right btnDeletePhong" data-ma-phong="' + data.maPhong + '">Xóa</button>';
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

function btnAddPhong() {
    $('#btnAddPhong').click(() => {
        $('#tenPhong').val('')
        $('#popupAddPhong').modal('show')
    })
}

function btnEditPhong() {
    $('#table-phong').on('draw.dt', function () {
        $('.btnEditPhong').click((e) => {
            $('#btnAgreeUpdatePhong').attr('data-ma-phong', $(e.target).data('ma-phong'))
            $('#popupEditPhong').modal('show')
            $.ajax({
                type: "GET",
                url: `/admin/chi-tiet-phong/${window.location.href.split('/').pop()}/${$(e.target).data('ma-phong')}`,
                contentType: 'application/json',
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {
                        $('#tenPhongEdit').val(response.data.tenPhong)
                    }
                },
            })
        })
    })
}

function InsertPhong()
{
    $('#btnAgreeAddPhong').click((e) => {
        e.preventDefault()
        var formData = new FormData();
        formData.append('tenPhong', $('#tenPhong').val());
        $.ajax({
            type: "POST",
            url: "/admin/them-moi-phong/" + window.location.href.split('/').pop(),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    $('#popupAddPhong').modal('hide')
                    $('#table-phong').DataTable().destroy();
                    initTablePhong()
                    initDataTablePhong()
                    toastr["success"](response.message, 'Thành công');
                } else if (response.status == 500) {
                    console.log(response.message)
                }
            },
            error: function (error) {
                if (error.status == 422) {
                    var arrayErrors = [];
                    $.each(error.responseJSON.errors, function (prefix, val) {
                        $('#' + prefix).addClass("is-invalid");
                        $('#' + prefix + "Error").text(val);
                        arrayErrors.push(prefix);
                    })
                    $('#' + arrayErrors[0]).focus();
                } else {
                    toastr["success"](error, 'Lỗi');
                }
            }
        });

    })
}

function UpdatePhong()
{
    $('#btnAgreeUpdatePhong').click((e) => {
        e.preventDefault()
        var formData = new FormData();
        formData.append('tenPhong', $('#tenPhongEdit').val());
        $.ajax({
            type: "POST",
            url: "/admin/cap-nhat-phong/" + window.location.href.split('/').pop()+ "/"+$('#btnAgreeUpdatePhong').data('ma-phong'),
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    toastr["success"](response.message, 'Thành công');
                    $('#table-phong').DataTable().destroy();
                    initTablePhong()
                    initDataTablePhong()
                } else if (response.status == 500) {
                    console.log(response.message)
                }
                $('#popupEditPhong').modal('hide')
            },
            error: function (error) {
                if (error.status == 422) {
                    var arrayErrors = [];
                    $.each(error.responseJSON.errors, function (prefix, val) {
                        $('#' + prefix+"Edit").addClass("is-invalid");
                        $('#' + prefix +"Edit"+"Error").text(val);
                        arrayErrors.push(prefix+"Edit");
                    })
                    $('#' + arrayErrors[0]).focus();
                } else {
                    toastr["success"](error, 'Lỗi');
                }
            }
        });
    })
}

function DeletePhong()
{
    var maPhongDelete = ''
    $('#btnRefuseDeletePhong').click(function () {
        $('#popupCofirmDeletePhong').modal('hide')
    })
    $('#table-phong').on('draw.dt', function () {
        $('.btnDeletePhong').on('click', function () {
            $('#popupCofirmDeletePhong').modal('show')
            maPhongDelete = $(this).attr("data-ma-phong");
            $('#btnAgreeDeletePhong').attr('data-ma-phong', maPhongDelete)
        })
    })

    $('#btnAgreeDeletePhong').on('click', (e) => {
        e.preventDefault();
        $.ajax({
            type: "DELETE",
            url: "/admin/delete-phong/" + maPhongDelete,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    toastr["success"](response.message, 'Thành công');
                    $('#table-phong').DataTable().destroy();
                    initTablePhong()
                    initDataTablePhong()
                    $('#popupCofirmDeletePhong').modal('hide')
                } else if (response.status == 500) {
                    console.log(response.message)
                }
            },
            error: function (error) {
                toastr["success"](error, 'Lỗi');
            }
        });
    })
}

$(document).ready(function () {
    initTablePhong()
    initDataTablePhong()
    btnAddPhong()
    btnEditPhong()
    InsertPhong()
    UpdatePhong()
    DeletePhong()
})
