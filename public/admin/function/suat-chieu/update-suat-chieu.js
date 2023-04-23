function initPhongList() {
    $.ajax({
        type: "GET",
        url: "/admin/get-list-room/" + $('#cumRap').val(),
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $('#phongChieu').append('<option value="">---Chọn phòng ---</option>');
                console.log(response.rooms)
                $.each(response.rooms, function (index, room) {
                    $('#phongChieu').append('<option value="' + room.maPhong + '">' + room.tenPhong + '</option>');
                });
                $('#phongChieu').val($('#maPhong').val())
            }
        },
    })
}

function selectCumRap() {
    $('#cumRap').on('change', function () {
        $('#phongChieu').html('')
        if ($(this).val() != '') {
            $.ajax({
                type: "GET",
                url: "/admin/get-list-room/" + $(this).val(),
                contentType: 'application/json',
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {
                        $('#phongChieu').append('<option value="">---Chọn phòng ---</option>');
                        console.log(response.rooms)
                        $.each(response.rooms, function (index, room) {
                            $('#phongChieu').append('<option value="' + room.maPhong + '">' + room.tenPhong + '</option>');
                        });

                    }
                },
            })
        }
    })
}

function btnUpdateSuatChieu() {
    $('#btnSaveSuatChieu').click(function () {
        var formData = new FormData();
        formData.append('ngayChieu', $('#ngayChieu').val());
        formData.append('gioChieu', $('#gioChieu').val());
        $.ajax({
            type: "POST",
            url: "/admin/validate-update-suat-chieu",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    popupConfirm(
                        'Xác nhận lưu thông tin suất chiếu ?',
                        function (e) {
                            e.preventDefault()
                            $.ajax({
                                type: "POST",
                                url: "/admin/update-suat-chieu/" + window.location.href.split('/').pop(),
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    if (response.status == 200) {
                                        $('#popupCofirm').modal('hide')
                                        toastr["success"](response.message, 'Thành công');
                                        console.log(response)
                                    } else if (response.status == 500) {
                                        $('#popupCofirm').modal('hide')
                                        toastr["error"](response.message, 'Lỗi');
                                    }
                                },
                                error: function (error) {
                                    toastr["success"](error, 'Lỗi');
                                }
                            })
                        }
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
    initPhongList()
    selectCumRap()
    btnUpdateSuatChieu()
})
