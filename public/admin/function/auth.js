$(document).ready(function (){
    LogoutAdmin();
})

function LogoutAdmin() {
    $('#logoutadmin').on('click', function (e) {
       e.preventDefault()
        $.ajax({
            type: "POST",
            url: "logout-admin",
            success: function (response) {
                window.location.href = response.redirect;
            },
            error: function(xhr) {
                // Xử lý lỗi
                console.log(xhr.responseText);
            }
        })
    })
}
