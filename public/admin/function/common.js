
//Set csrf cho ajax
function ajaxSetting() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function popupConfirm(title, method) {
    $('#popup-confirm-title').text(title)
    $('#btnAgree').on('click', method)
    $('#btnRefuse').on('click', () => {
        $('#popupCofirm').modal('hide')
        $('#btnAgree').off('click', method)
        $('#btnRefuse').off('click')
    })
}

$(document).ready(function() {
    ajaxSetting()
    popupConfirm()
})

