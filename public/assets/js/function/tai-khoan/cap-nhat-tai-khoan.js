function UpdateAccount() {
    $('#user_save').click(function (e) {
        e.preventDefault()
        var formData = new FormData();
        formData.append('hoVaTen', $('#hoVaTen').val());
        formData.append('soDienThoai', $('#soDienThoai').val());
        formData.append('user_avatar', $('#user_avatar')[0].files[0]);
        $.ajax({
            type: "POST",
            url: "cap-nhat-tai-khoan",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                console.log(response)
                if (response.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: response.message,
                    })
                    $('.avatar-nav').html('<img width="20" src="'+response.user.anhDaiDien+'" alt="imageUser" class="avatar-img rounded-circle">')
                } else if (response.status == 500) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: response.message,
                    })
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

function changeImage() {
    $('#user_avatar').on('change', () => {
        var file = $('#user_avatar').get(0).files[0]
        var reader = new FileReader()
        reader.onload = function (e) {
            // Thiết lập thuộc tính src của thẻ img để hiển thị hình ảnh đó
            var img = $('<img width="200" alt="ImageAvatar"\n' +
                '                                 class="avatar-img rounded-circle border border-4 border-body">')

            // Thiết lập thuộc tính src của thẻ img để hiển thị hình ảnh
            img.attr('src', e.target.result)

            // Thêm thẻ img vào div
            $('.header-avatar-top').html(img)

        };
        reader.readAsDataURL(file)
    })
}

$(document).ready(function () {
    changeImage()
    UpdateAccount()
})
