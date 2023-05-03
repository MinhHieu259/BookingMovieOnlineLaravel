function clickDate() {
    $('.btn-date-choose-in-ticket').click(function () {
        $('#dates .btn-date-choose-in-ticket').removeClass('active')
        $(this).addClass('active')
        let dateActive = $('#dates a.active').data('date')
        let provinceId = $('#provinces').val()
        let slug = window.location.href.split('/').pop()
        $.ajax({
            type: "GET",
            url: `/get-show-time/${provinceId}/${dateActive}/${slug}`,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                console.log(response)
                renderShowTime(response)
            },
        })

    })

    $('#provinces').on('change', function (){
        let dateActive = $('#dates a.active').data('date')
        let provinceId = $('#provinces').val()
        let slug = window.location.href.split('/').pop()
        $.ajax({
            type: "GET",
            url: `/get-show-time/${provinceId}/${dateActive}/${slug}`,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                console.log(response)
                renderShowTime(response)
            },
        })
    })
}

function renderShowTime(response){
    if (response.results.length > 0) {
        var html = ''
        var htmlTime = ''
        $(response.results).each(function (key, value) {
            console.log(value)
            $(value.suatChieu).each(function (key, value) {
                htmlTime += ' <a href="/mua-ve/'+value.tenPhong+'" class="btn btn-sm btn-showtime btn-outline-dark is-ticketing">\n' +
                    '                                                            <span class="time">'+value.gioChieu+'</span>\n' +
                    '                                                        </a>'
            })

            html += '                                        <div class="list-group-item btn-select-cinema ticketing-cinema-tracking ticketing-cinema ticketing-cinema-126701" data-cineplex="beta-cineplex" data-cinema="beta-cineplex-dan-phuong" data-cinema-id="126701" data-toggle="collapse" data-target="#showtime-cinema-' + value.maCTRap + '" aria-expanded="true">\n' +
                '                                            <h4 class="text-body mb-0 name font-weight-normal">\n' +
                '                                                ' + value.tenRap + '\n' +
                '                                            </h4>\n' +
                '                                            <div class="cinema mt-0 collapse" id="showtime-cinema-' + value.maCTRap + '" style="">\n' +
                '                                                <p class="small text-muted mb-3">\n' +
                '                                                    ' + value.diaChi + '' +
                '                                                    <a href="/rap/beta-cineplex-dan-phuong/">Thông tin rạp</a>\n' +
                '                                                    -\n' +
                '                                                    <a href="https://maps.google.com/?q=Beta Đan Phượng" target="_blank">Bản đồ</a>\n' +
                '                                                    -\n' +
                '                                                    <a href="#" data-toggle="modal" data-target="#ticketModal" data-name="Beta Đan Phượng" data-ticket-image="https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/full/5c219e8046e21026086857.jpg">Giá vé</a>\n' +
                '                                                </p>\n' +
                '                                                <div class="showtimes loaded">\n' +
                '                                                    <div class="mb-1">\n' +
                htmlTime +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>\n';
            htmlTime = ''
        })
        $('#area-suat-chieu').html(
            ' <a href="#" class="list-group-item bg-light btn-select-cineplex sponsored-cineplex-tracking sponsored-cineplex sponsored-cineplex-18789 collapsed" data-toggle="collapse" data-target="#collapseExample" aria-controls="collapseExample"><div class="row align-items-center">\n' +
            '                                    <div class="col-auto">\n' +
            '                                        <div class="avatar avatar-sm">\n' +
            '                                            <img width="50" src="/' + response.rap.anhDaiDien + '" alt="' + response.rap.tenRap + '" class="avatar-img rounded">\n' +
            '                                        </div>\n' +
            '                                    </div>\n' +
            '                                    <div class="col ml-n2">\n' +
            '                                        <h4 class="text-body mb-1 name">' + response.rap.tenRap + '</h4>\n' +
            '                                        <p class="small text-muted mb-0">' + response.results.length + ' rạp' + '</p>\n' +
            '                                    </div>\n' +
            '                                    <div class="col-auto">\n' +
            '                                        <span class="text-muted h3"><i class="fe fe-chevron-right"></i></span>\n' +
            '                                    </div></div></a>' +
            '<div class="collapse" id="collapseExample">\n' +
            '                                <div class="card card-body" style="width: 100%">'+
            ' <div class="list-group collapse show" id="showtime-cineplex-18789">' +
            html
            +
            '</div>'+
            '</div>'+
            '</div>'
        )
    } else {
        $('#area-suat-chieu').html(
            '<div class="alert alert-light">Hiện tại không có lịch chiếu</div>'
        )
    }
}

function autoLoad() {
    let dateActive = $('#dates a.active').data('date')
    let provinceId = $('#provinces').val()
    let slug = window.location.href.split('/').pop()
    $.ajax({
        type: "GET",
        url: `/get-show-time/${provinceId}/${dateActive}/${slug}`,
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response)
            renderShowTime(response)
        },
    })
}

$(document).ready(function () {
    autoLoad()
    clickDate()
})
