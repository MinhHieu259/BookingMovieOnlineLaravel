//Set csrf cho ajax
function ajaxSetting() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function popupConfirm(title, method) {
    console.log(method)
    $('#popupCofirm').modal('show')
    $('.modal-title').text(title)
    $('#btnAgree').on('click', function (e){
       method(e)
    })
    $('#popupCofirm').on('hidden.bs.modal', () => {
        $('#btnAgree').off('click')
        $('#btnRefuse').off('click')
    })
    $('#btnRefuse').on('click', () => {
        $('#popupCofirm').modal('hide')
        // $('#btnAgree').off('click', method)
        // $('#btnRefuse').off('click')
    })
}


// function validateInput(id, validation) {
//     var input = $('#' + id);
//     var value = input.val();
//     var message = '';
//
//     if (validation.required && value.trim() === '') {
//         message = validation.required;
//     }
//     else if (validation.min && value.length < validation.min.length) {
//         message = validation.min.message;
//     }
//     else if (validation.max && value.length > validation.max) {
//         message = validation.max;
//     }
//
//     if (message !== '') {
//         input.addClass('is-invalid');
//         $('#' + id + 'Error').text(message);
//     } else {
//         input.removeClass('is-invalid');
//         $('#' + id + 'Error').text('');
//     }
// }

function Validator(options) {
    console.log(options.rules)
    $.each(options.rules, function (key, value) {
        console.log(value)
        $(key).on("blur", function() {
            var isValid = true;
            if (isValid && value.required && $(key).val().trim() === "") {
                $(key).addClass("is-invalid");
                $(key + "Error").text(value.required.message);
                isValid = false;
            } else {
                $(key).removeClass("is-invalid");
                $(key + "Error").text("");
            }

            if (isValid && value.min && $(key).val().length < value.min.length) {
                $(key).addClass("is-invalid");
                $(key + "Error").text(value.min.message);
                isValid = false;
            } else if (isValid) {
                $(key).removeClass("is-invalid");
                $(key + "Error").text("");
            }

            if (isValid && value.max && $(key).val().length > value.max.length) {
                $(key).addClass("is-invalid");
                $(key + "Error").text(value.max.message);
                isValid = false;
                $(key).maxLength = value.max.length
            } else if (isValid) {
                $(key).removeClass("is-invalid");
                $(key + "Error").text("");
            }
        });
    });
}


$(document).ready(function () {
    ajaxSetting()
    //popupConfirm()
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
})

