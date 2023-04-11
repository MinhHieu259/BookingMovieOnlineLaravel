var tenDoAn = $('#tenDoAn')
var gia = $('#gia')
var maChiTietRap = $('#maChiTietRap')


function SaveData(e) {
    e.preventDefault()
    var formData = new FormData();
    formData.append('tenDoAn', tenDoAn.val());
    formData.append('gia', gia.val());
    formData.append('maChiTietRap', maChiTietRap.val());
    $.ajax({
        type: "POST",
        url: "save-do-an",
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
function validateDoAn() {
    $('#btnSaveDoAn').click(() => {
        var formData = new FormData();
        formData.append('tenDoAn', tenDoAn.val());
        formData.append('gia', gia.val());
        formData.append('maChiTietRap', maChiTietRap.val());
        $.ajax({
            type: "POST",
            url: "validate-do-an",
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
                        'Xác nhận lưu thông tin đồ ăn ?',
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

$(document).ready(function () {
    validateDoAn()
})
