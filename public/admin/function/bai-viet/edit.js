var tieuDe = $('#tieuDe')
var moTa = $('#moTa')
var avatarBaiViet = $('#avatarBaiViet')
var maPhim = $('#maPhim')
var editor = CKEDITOR.replace('noiDungBaiViet')
var avatarPreview = $('#avatarPreview')
var buttonDelete = $('#delete-image-preview')

function chooseImage() {
    avatarBaiViet.on('change', () => {
        var file = avatarBaiViet.get(0).files[0]
        var reader = new FileReader()
        reader.onload = function (e) {
            // Thiết lập thuộc tính src của thẻ img để hiển thị hình ảnh đó
            var img = $('<img>')
            img.css('margin-top', '20px')
            img.css('width', '500px')

            // Thiết lập thuộc tính src của thẻ img để hiển thị hình ảnh
            img.attr('src', e.target.result)

            // Thêm thẻ img vào div
            avatarPreview.html(img)

            //Show button delete
            buttonDelete.show()
        };
        reader.readAsDataURL(file)
    })

    //Click button delete
    buttonDelete.on('click', function (e) {
        e.preventDefault()
        avatarPreview.html('')
        // Xóa giá trị của thẻ input bằng cách thiết lập giá trị là rỗng
        avatarBaiViet.val('')
        // Ẩn nút "Xóa"
        buttonDelete.hide()
    })
}

function validatePost() {
    $('#btnSaveBaiViet').click(() => {
        var contentBaiViet = editor.getData();
        var formData = new FormData();
        formData.append('tieuDe', tieuDe.val());
        formData.append('moTa', moTa.val());
        formData.append('avatarBaiViet', avatarBaiViet[0].files[0]);
        formData.append('noiDungBaiViet', contentBaiViet);
        //formData.append('maPhim', maPhim.val());
        $.ajax({    
            type: "POST",
            url: "/admin/validate-bai-viet-update",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('textarea').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    popupConfirm(
                        'Xác nhận lưu thông tin bài viết ?',
                        function(e){
                            e.preventDefault()
                            $.ajax({
                                type: "POST",
                                url: "/admin/update-bai-viet/"+window.location.href.split('/').pop(),
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
                            })
                        }

                    )
                }
            },
            error: function (error) {
                console.log(error.responseJSON.errors);
                console.log('loi roi');
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
    chooseImage()
    validatePost();
});
