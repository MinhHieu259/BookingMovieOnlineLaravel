function validationCumRap()
{
    var tenRap = $('#tenRap')
    var diaChi = $('#diaChi')
    var map = $('#map')
    var motaRap = $('#motaRap')
    var tinhForRap = $('#tinh')

    function SaveCumRap(e) {
        e.preventDefault()
        var formData = new FormData();
        formData.append('tenRap', tenRap.val());
        formData.append('diaChi', diaChi.val());
        formData.append('map', map.val());
        formData.append('motaRap', motaRap.val());
        formData.append('tinh', tinhForRap.val());
        $.ajax({
            type: "POST",
            url: "save-cum-rap",
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

    $('#btnSaveCumRap').on('click', function () {
        var formData = new FormData();
        formData.append('tenRap', tenRap.val());
        formData.append('diaChi', diaChi.val());
        formData.append('map', map.val());
        formData.append('motaRap', motaRap.val());
        formData.append('tinh', tinhForRap.val());
        $.ajax({
            type: "POST",
            url: "validate-cum-rap",
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
                        'Xác nhận lưu thông tin cụm rạp ?',
                            SaveCumRap
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
    validationCumRap()
})
