
function validateRap() {
    var nameRap = $('#tenRap')
    var avatarRap = $('#avatarRap')
    var avatarPreview = $('#avatarPreview')
    var buttonDelete = $('#delete-image-preview')
    avatarRap.on('change', () => {
        var file = avatarRap.get(0).files[0]
        var reader = new FileReader()
        reader.onload = function(e) {
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
        avatarRap.val('')
        // Ẩn nút "Xóa"
        buttonDelete.hide()
    })
    function saveData(e){
        e.preventDefault()
        var formData = new FormData();
        formData.append('tenRap', nameRap.val());
        formData.append('anhDaiDien', avatarRap[0].files[0]);
        $.ajax({
            type: "POST",
            url: "save-data-rap",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.status == 200) {
                    console.log(response.message)
                    $('#popupCofirm').modal('hide')
                } else if(response.status == 500) {
                    console.log(response.message)
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    $('#btnSaveRap').on('click', (e) => {
        e.preventDefault()
        var formData = new FormData();
        formData.append('tenRap', nameRap.val());
        formData.append('anhDaiDien', avatarRap[0].files[0]);
        console.log(formData)
        $.ajax({
            type: "POST",
            url: "validate-data-rap",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if(response.status == 200) {
                    $('#popupCofirm').modal('show')
                    popupConfirm(
                        'Xác nhận lưu thông tin rạp ?',
                        saveData
                    )
                }
            },
            error: function (error) {
                console.log(error.responseJSON.errors);
                var arrayErrors = [];
                $.each(error.responseJSON.errors, function (prefix, val) {
                    $('#' + prefix).addClass("is-invalid");
                    $('#' + prefix+ "Error").text(val);
                    arrayErrors.push(prefix);
                })
                $('#' + arrayErrors[0]).focus();
            }
        });
    })
}

$(document).ready(function (){
    validateRap()
})
