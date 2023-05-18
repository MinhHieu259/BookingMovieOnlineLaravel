function GetListOrder(dataStatus) {
    switch (dataStatus){
        case 'yes':
            $.ajax({
                type: "GET",
                url: "/danh-sach-order/"+dataStatus,
                contentType: 'application/json',
                dataType: "json",
                success: function (response) {
                    var rapInfor = JSON.parse($('#rapInfor').val())
                    var listOrder = $('.list-group')
                    listOrder.empty()
                    response.data.forEach(function (order){
                        var tinhTrang = order.trangThai == '1' ? 'Chưa dùng' : 'Đã dùng'
                        var itemOrder = '<a href="/chi-tiet-mua-ve/'+order.maLichSu+'" class="list-group-item list-group-item-action">\n' +
                            '                    <span class="row">\n' +
                            '                        <span class="col-md-2">\n' +
                            '                            <img width="50" src="'+rapInfor.anhDaiDien+'" alt="Hello">\n' +
                            '                        </span>\n' +
                            '                        <span class="col-md-10">\n' +
                            '                            <h4>'+order.tenPhim+'</h4>\n' +
                            '                            <h5>'+order.ngayChieu+' - '+order.gioChieu+'</h5>\n' +
                            '                            <h7 style="color: grey">'+tinhTrang+'</h7>\n' +
                            '                        </span>\n' +
                            '                    </span>\n' +
                            '                </a>'

                        listOrder.append(itemOrder);
                    })
                },
            })
            break
        case 'no':
            $.ajax({
                type: "GET",
                url: "/danh-sach-order/"+dataStatus,
                contentType: 'application/json',
                dataType: "json",
                success: function (response) {
                    var rapInfor = JSON.parse($('#rapInfor').val())
                    var listOrder = $('.list-group')
                    listOrder.empty()
                    response.data.forEach(function (order){
                        var tinhTrang = order.trangThai == '1' ? 'Chưa dùng' : 'Đã dùng'
                        var itemOrder = '<a href="/chi-tiet-mua-ve/'+order.maLichSu+'" class="list-group-item list-group-item-action">\n' +
                            '                    <span class="row">\n' +
                            '                        <span class="col-md-2">\n' +
                            '                            <img width="50" src="'+rapInfor.anhDaiDien+'" alt="Hello">\n' +
                            '                        </span>\n' +
                            '                        <span class="col-md-10">\n' +
                            '                            <h4>'+order.tenPhim+'</h4>\n' +
                            '                            <h5>'+order.ngayChieu+' - '+order.gioChieu+'</h5>\n' +
                            '                            <h7 style="color: grey">'+tinhTrang+'</h7>\n' +
                            '                        </span>\n' +
                            '                    </span>\n' +
                            '                </a>'

                        listOrder.append(itemOrder);
                    })
                },
            })
            break
    }
}
function ClickTabStatus() {
    $('.tab-title').click(function (){
        $('.tab-title').removeClass('active')
        $(this).addClass('active')

        let dataStatus = $(this).data('status')
        GetListOrder(dataStatus)
    })
}

function GetListAuto() {
    $.ajax({
        type: "GET",
        url: "/danh-sach-order/yes",
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response.data)
            var rapInfor = JSON.parse($('#rapInfor').val())
            var listOrder = $('.list-group')
            listOrder.empty()
            response.data.forEach(function (order){
                var tinhTrang = order.trangThai == '1' ? 'Chưa dùng' : 'Đã dùng'
                var itemOrder = '<a href="/chi-tiet-mua-ve/'+order.maLichSu+'" class="list-group-item list-group-item-action">\n' +
                    '                    <span class="row">\n' +
                    '                        <span class="col-md-2">\n' +
                    '                            <img width="50" src="'+rapInfor.anhDaiDien+'" alt="Hello">\n' +
                    '                        </span>\n' +
                    '                        <span class="col-md-10">\n' +
                    '                            <h4>'+order.tenPhim+'</h4>\n' +
                    '                            <h5>'+order.ngayChieu+' - '+order.gioChieu+'</h5>\n' +
                    '                            <h7 style="color: grey">'+tinhTrang+'</h7>\n' +
                    '                        </span>\n' +
                    '                    </span>\n' +
                    '                </a>'

                listOrder.append(itemOrder);
            })
        },
    })
}

$(document).ready(function (){
    ClickTabStatus()
    GetListAuto()
})
