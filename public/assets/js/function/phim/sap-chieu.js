function ClickSelection() {
    $('.btn-choose-genre').click(function (){
        $('.btn-choose-genre').removeClass('active')
        $(this).addClass('active')
        $('.genre-dropdown a').text($(this).data('genre'))
        if ($('.genre-dropdown a').text() == 'Tất cả'){
            $('.genre-dropdown a').data('cate', '')
        } else {
            $('.genre-dropdown a').data('cate', $(this).data('cate'))
        }
        if ($('.language-dropdown a').text() == 'Tất cả'){
            $('.language-dropdown a').data('language', '')
        } else {
            $('.language-dropdown a').data('language', $(this).data('language'))
        }
        var dataSearch = {
            'danhMuc': $('.genre-dropdown .dropdown-toggle').data('cate'),
            'ngonNgu': $('.language-dropdown .dropdown-toggle').data('language')
        };
        console.log(dataSearch)
        $.ajax({
            type: "GET",
            url: "/get-list-sap-chieu",
            data: dataSearch,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                console.log(response)
                $('#contentFilmSapChieu').empty()
                response.films.forEach(function (film){
                    var filmElement = ` <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="${film.linkHinhAnh}"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px;font-size: 13px">${film.tenPhim}</h6>
                                <p class="date-show" style="margin-top: -7px;font-size: 10px">${film.ngayKhoiChieu}</p>
                            </div>
                        </div>
                    </div>`
                    $('#contentFilmSapChieu').append(filmElement)
                })
            },
        })
    })

    $('.btn-choose-language').click(function (){
        $('.btn-choose-language').removeClass('active')
        $(this).addClass('active')
        $('.language-dropdown .dropdown-toggle').text($(this).data('language'))
        if ($('.language-dropdown a').text() == 'Tất cả'){
            $('.language-dropdown a').data('language', '')
        } else {
            $('.language-dropdown a').data('language', $(this).data('language'))
        }
        if ($('.language-dropdown a').text() == 'Tất cả'){
            $('.language-dropdown a').data('language', '')
        } else {
            $('.language-dropdown a').data('language', $(this).data('language'))
        }
        var dataSearchLG = {
            'danhMuc': $('.genre-dropdown .dropdown-toggle').data(' cate'),
            'ngonNgu': $('.language-dropdown .dropdown-toggle').data(' language')
        };
        console.log(dataSearchLG)
        $.ajax({
            type: "GET",
            url: "/get-list-sap-chieu",
            data: dataSearchLG,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                console.log(response)
                $('#contentFilmSapChieu').empty()
                response.films.forEach(function (film){
                    var filmElement = ` <div class="col-md-2 card-wrap-dang-chieu">
                        <div class="card card-carousel card-dang-chieu">
                            <img
                                src="${film.linkHinhAnh}"
                                alt="anh"
                                class="card-img-top"
                            />
                            <div class="card-body">
                                <h6 style="margin-top: -15px;font-size: 13px">${film.tenPhim}</h6>
                                <p class="date-show" style="margin-top: -7px;font-size: 10px">${film.ngayKhoiChieu}</p>
                            </div>
                        </div>
                    </div>`
                    $('#contentFilmSapChieu').append(filmElement)
                })
            },
        })
    })
}
$(document).ready(function (){
    ClickSelection()
})
