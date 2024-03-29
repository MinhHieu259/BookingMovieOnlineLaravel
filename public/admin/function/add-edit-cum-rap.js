function addEditCumRap(){
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
                } else if (response.status == 500 || response.status == 400) {
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

    function UpdateCumRap(e) {
        e.preventDefault()
        var formData = new FormData();
        formData.append('tenRap', tenRap.val());
        formData.append('diaChi', diaChi.val());
        formData.append('map', map.val());
        formData.append('motaRap', motaRap.val());
        formData.append('tinh', tinhForRap.val());
        $.ajax({
            type: "POST",
            url: "/admin/update-cum-rap/" + $('#btnAgree').data('ma-cum'),
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

    $('#btnUpdateCumRap').on('click', function () {
        var formData = new FormData();
        formData.append('tenRap', tenRap.val());
        formData.append('diaChi', diaChi.val());
        formData.append('map', map.val());
        formData.append('motaRap', motaRap.val());
        formData.append('tinh', tinhForRap.val());
        $.ajax({
            type: "POST",
            url: "/admin/validate-cum-rap",
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
                    $('#btnAgree').attr('data-ma-cum', $('#btnUpdateCumRap').data('ma-cum'))
                    popupConfirm(
                        'Xác nhận cập nhật thông tin cụm rạp ?',
                        UpdateCumRap
                    )
                }
            },
            error: function (error) {
                console.log(error);
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
    addEditCumRap()
    Validator({
        rules:{
            '#tenRap': {
                required: {
                    message: 'Tên danh mục không được để trống'
                }
            },
            '#diaChi': {
                required: {
                    message: 'Địa chỉ không được để trống'
                }
            },
            '#map': {
                required: {
                    message: 'Địa chỉ bản đồ không được để trống'
                }
            }
        }
    })
})
