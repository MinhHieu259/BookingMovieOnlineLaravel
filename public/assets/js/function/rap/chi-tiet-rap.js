let dateActive = $('#dates a.active').data('date')
let maRap = $('#maChiTietRap').val()
function getListFilm() {
    var dataSearch = {
        "dateActive" : dateActive,
        "maRap" : maRap
    }
    $.ajax({
        type: "GET",
        url: `/get-list-film-by-rap`,
        data: dataSearch,
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response)
            renderListFilm(response)
        },
    })
}
function calculateTime(showTime, dateShow) {
    const now = new Date();
    const currentHour = now.getHours();
    const currentMinute = now.getMinutes();
    const currentDay = now.getDate();
    const currentMonth = now.getMonth() + 1;
    const currentYear = now.getFullYear();

    const [hour, minute] = showTime.split(":");
    const showHour = parseInt(hour, 10);
    const showMinute = parseInt(minute, 10);

    const [showDay, showMonth, showYear] = dateShow.split("/");
    const showDayInt = parseInt(showDay, 10);
    const showMonthInt = parseInt(showMonth, 10);
    const showYearInt = parseInt(showYear, 10);

    if (currentYear < showYearInt) {
        // Ngày hiện tại nhỏ hơn năm trong suất chiếu
        return true;
    } else if (currentYear === showYearInt) {
        // Ngày hiện tại bằng năm trong suất chiếu
        if (currentMonth < showMonthInt) {
            // Ngày hiện tại nhỏ hơn tháng trong suất chiếu
            return true;
        } else if (currentMonth === showMonthInt) {
            // Ngày hiện tại bằng tháng trong suất chiếu
            if (currentDay < showDayInt) {
                // Ngày hiện tại nhỏ hơn ngày trong suất chiếu
                return true;
            } else if (currentDay === showDayInt) {
                // Ngày hiện tại bằng ngày trong suất chiếu
                if (currentHour < showHour || (currentHour === showHour && currentMinute < showMinute - 10)) {
                    // Giờ hiện tại nhỏ hơn giờ trong suất chiếu hoặc chênh lệch thời gian nhỏ hơn 10 phút
                    return true;
                }
            }
        }
    }

    return false;
}
function renderListFilm(response) {
    if (response.results.length > 0) {
        var html = ''
        var htmlTime = ''
        $(response.results).each(function (key, value) {
            console.log(value)
            $(value.suatChieu).each(function (key, value) {
                htmlTime += ' <a href="/chon-ghe/' + btoa(value.maSuatChieu)  + '" ' + (calculateTime(value.gioChieu, value.ngayChieu) ? '' : 'style="pointer-events: none;opacity: 0.5;cursor: not-allowed;"') + ' class="btn btn-sm btn-showtime btn-outline-dark is-ticketing">\n' +
                    '                                                            <span class="time">' + value.gioChieu + '</span>\n' +
                    '                                                        </a>'
            })

            html += `<div class="card card-sm mb-3" data-movie="sieu-lua-gap-sieu-lay" data-movie-id="16293"
            style="width: 100%;">
            <div class="card-body">
                <div class="row">
                    <div class="col-3 col-sm-2">
                        <a href="/phim/sieu-lua-gap-sieu-lay/">
                            <img src="/${value.hinhAnh}"
                                alt="Siêu Lừa Gặp Siêu Lầy" class="rounded img-fluid" />
                        </a>
                    </div>
                    <div class="col ml-n2">
                        <h4 class="card-title mb-1 name">
                            <a href="/phim/sieu-lua-gap-sieu-lay/">
                                ${value.tenPhim}
                            </a>
                        </h4>

                        <p class="card-text small text-muted mb-0">
                            ${value.gioiHanTuoi} · ${value.thoiLuong}'
                        </p>

                        <div class="mt-2">
                            <div class="mb-1">
                                <label class="small mb-2 font-weight-bold d-block text-dark">
                                    ${value.tenNgonNgu}
                                </label>
                                ${htmlTime}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
            htmlTime = ''
        })
        $('#area-list-films').html(
           html
        )
    } else {
        $('#area-list-films').html(
            '<div class="alert alert-light">Hiện tại không có lịch chiếu</div>'
        )
    }
}

function ClickDate(){
    $('.btn-date-choose-theater').click(function () {
        $('#dates .btn-date-choose-theater').removeClass('active')
        $(this).addClass('active')
        let dateActive = $('#dates a.active').data('date')
        var dataSearch = {
            "dateActive" : dateActive,
            "maRap" : maRap
        }
        $.ajax({
            type: "GET",
            url: `/get-list-film-by-rap`,
            data: dataSearch,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                console.log(response)
                renderListFilm(response)
            },
        })

    })
}
$(document).ready(function() {
    getListFilm()
    ClickDate()
})