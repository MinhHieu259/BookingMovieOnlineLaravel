var tenDanhMuc = $('#tenDanhMuc')

function SaveData(e) {
    e.preventDefault()
    var formData = new FormData();
    formData.append('tenDanhMuc', tenDanhMuc.val());
    $.ajax({
        type: "POST",
        url: "them-moi-danh-muc",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == 200) {
                $('#popupCofirm').modal('hide')
                toastr["success"](response.message, 'Thành công');
            } else if (response.status == 500) {
                console.log(response.message)
            }
        },
        error: function (error) {
            toastr["success"](error, 'Lỗi');
        }
    });
}
function validateDanhMuc() {
    $('#btnSaveDanhMuc').click(() => {
        var formData = new FormData();
        formData.append('tenDanhMuc', tenDanhMuc.val());
        $.ajax({
            type: "POST",
            url: "/admin/validate-danh-muc",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    $('#popupCofirm').modal('show')
                    popupConfirm(
                        'Xác nhận lưu thông tin danh muc ?',
                        SaveData
                    )
                }
            },
            error: function (error) {
                console.log(error.responseJSON.errors);
                var arrayErrors = [];
                $.each(error.responseJSON.errors, function (prefix, val) {
                    $('#' + prefix).addClass("is-invalid");
                    $('#' + prefix + "Error").text(val);
                    arrayErrors.push(prefix);
                })
                $('#' + arrayErrors[0]).focus();
            }
        });
    })
}

function UpdateDanhMuc(e) {
    e.preventDefault()
    var formData = new FormData();
    formData.append('tenDanhMuc', $('#tenDanhMucEdit').val());
    $.ajax({
        type: "POST",
        url: "/admin/update-danh-muc/" + $('#btnAgree').data('ma-danh-muc'),
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == 200) {
                $('#popupCofirm').modal('hide')
                toastr["success"](response.message, 'Thành công');
            } else if (response.status == 500) {
                console.log(response.message)
            }
        },
        error: function (error) {
            toastr["success"](error, 'Lỗi');
        }
    });
}

function ValidateUpdateDanhMuc(){
    $('#btnUpdateDanhMuc').on('click', function () {
        var formData = new FormData();
        formData.append('tenDanhMuc', $('#tenDanhMucEdit').val());
        $.ajax({
            type: "POST",
            url: "/admin/validate-danh-muc",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    $('#popupCofirm').modal('show')
                    $('#btnAgree').attr('data-ma-danh-muc', $('#btnUpdateDanhMuc').data('ma-danh-muc'))
                    popupConfirm(
                        'Xác nhận cập nhật thông tin danh mục ?',
                        UpdateDanhMuc
                    )
                }
            },
            error: function (error) {
                console.log(error);
                var arrayErrors = [];
                $.each(error.responseJSON.errors, function (prefix, val) {
                    $('#' + prefix+ "Edit").addClass("is-invalid");
                    $('#' + prefix+ "Edit" + "Error").text(val);
                    arrayErrors.push(prefix+ "Edit");
                })
                $('#' + arrayErrors[0]).focus();
            }
        });
    })
}

$(document).ready(function () {
    validateDanhMuc()
    ValidateUpdateDanhMuc()
    Validator({
        rules:{
            '#tenDanhMuc': {
                required: {
                    message: 'Tên danh mục không được để trống'
                }
            }
        }
    })
    Validator({
        rules:{
            '#tenDanhMucEdit': {
                required: {
                    message: 'Tên danh mục không được để trống'
                }
            }
        }
    })
})
