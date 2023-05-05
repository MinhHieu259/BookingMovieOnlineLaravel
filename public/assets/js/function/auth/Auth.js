function LoginInPopup() {
    $('#btnLoginPopup').click(function () {
        var formData = new FormData();
        formData.append('username', $('#username').val());
        formData.append('password', $('#password').val());
        $.ajax({
            type: "POST",
            url: "/do-dang-nhap-modal",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    $('#popupLogin').modal('hide')
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Thành công',
                    //     text: response.message,
                    // }).then(function () {
                    //     window.location.href = '/'
                    // });
                    location.reload();
                    // $('.area-right-nav').html('')
                    // $('.area-right-nav').append(' <div class="row">' +
                    //     ' <a\n' +
                    //     '                  href="#"\n' +
                    //     '                  class="province-logo-nav"\n' +
                    //     '                  data-toggle="modal"\n' +
                    //     '                  data-target="#modelProvince"\n' +
                    //     '              >\n' +
                    //     '                  <i class="fa-solid fa-map-location-dot"></i>\n' +
                    //     '              </a>' +
                    //     '      <div class="dropdown show">\n' +
                    //     '                      <!-- Toggle -->\n' +
                    //     '                      <a href="#" class="avatar avatar-sm" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">\n' +
                    //     '                         <img width="20" src="assets/images/user/no-avatar.png" alt="imageUser" class="avatar-img rounded-circle">\n' +
                    //     '                      </a>\n' +
                    //     '\n' +
                    //     '                      <!-- Menu -->\n' +
                    //     '                      <div class="dropdown-menu dropdown-menu-right" style="left: -145px !important;">\n' +
                    //     '                          <a href="/user/profile/'+username+'" class="dropdown-item">Quản lý tài khoản</a>\n' +
                    //     '                          <hr class="dropdown-divider">\n' +
                    //     '                          <a href="/user/diary" class="dropdown-item">Tủ phim</a>\n' +
                    //     '                          <a href="/nap-tien/" class="dropdown-item">Nạp tiền</a>\n' +
                    //     '                          <a href="/user/orders" class="dropdown-item">Lịch sử mua vé</a>\n' +
                    //     '                          <hr class="dropdown-divider">\n' +
                    //     '                          <button id="btnLogout" class="dropdown-item">Đăng xuất</button>\n' +
                    //     '                      </div>\n' +
                    //     '                  </div>' +
                    //     '  </div>')
                } else if (response.status == 500) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi',
                        text: response.message,
                    });

                } else if (response.status == 422) {
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

// function logOut(){
//     console.log($('#btnLogout'))
//     $('#btnLogout').click(function (){
//         console.log('hihi')
//     })
// }

$(document).ready(function () {
    LoginInPopup()
    // logOut()
})
