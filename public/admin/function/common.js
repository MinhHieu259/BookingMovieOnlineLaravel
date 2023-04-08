
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
    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $('.select2').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    });
})

