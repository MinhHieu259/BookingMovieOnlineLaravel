function ClickSelection() {
    $('.btn-choose-genre').click(function (){
        $('.btn-choose-genre').removeClass('active')
        $(this).addClass('active')
        $('.genre-dropdown a').text($(this).data('genre'))
    })
}
$(document).ready(function (){
    ClickSelection()
})
