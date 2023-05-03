function clickDate() {
    $('.btn-date-choose-in-ticket').click(function () {
        $('#dates .btn-date-choose-in-ticket').removeClass('active')
        $(this).addClass('active')


    })
}

$(document).ready(function () {
    clickDate()
})
