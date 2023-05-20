function CancelBookTicket() {
    $('#btnHuyDatVe').click(function (){
        $('#popupConfirmCancelTicket').modal('show')
    })
    $('#btnHuyCancelTicket').click(function (){
        $('#popupConfirmCancelTicket').modal('hide')
    })
    $('#btnConfirmCancelTicket').click(function (){
        $.ajax({
            type: "POST",
            url: "/huy-mua-ve/"+window.location.href.split('/').pop(),
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    $('#popupConfirmCancelTicket').modal('hide')
                }
            }
        });
    })
}

$(document).ready(function (){
    CancelBookTicket()
})
