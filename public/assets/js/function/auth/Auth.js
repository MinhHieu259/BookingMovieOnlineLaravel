function LoginInPopup(){
    $('#btnLoginPopup').click(function (){
        var formData = new FormData();
        formData.append('username', $('#username').val());
        formData.append('password', $('#password').val());
        $.ajax({
            type: "POST",
            url: "do-dang-nhap-modal",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: response.message,
                    });
                    $('#popupLogin').modal('hide')
                } else if (response.status == 500) {
                    Swal.fire({
                        icon: 'danger',
                        title: 'Lỗi',
                        text: response.message,
                    });

                } else if (response.status == 422){
                    console.log(response)
                    var arrayErrors = [];
                    $.each(response.messages, function (prefix, val) {
                        $('#' + prefix).addClass("is-invalid");
                        $('#' + prefix + "Error").text(val);
                        arrayErrors.push(prefix);
                    })
                    $('#' + arrayErrors[0]).focus();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: response.message,
                    });
                }
            },
            error: function (error) {

            }
        });
    })
}

$(document).ready(function (){
    LoginInPopup()
})
