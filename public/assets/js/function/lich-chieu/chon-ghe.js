function getListChairs() {
    $.ajax({
        type: "GET",
        url: "/get-list-ghe/" + window.location.href.split('/').pop(),
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response.chairs)
            if (response.status == 200) {
                response.chairs.forEach(function (seat) {
                    var rowHtml = '<div class="row style-seat">' +
                        '<span class="rowName">' + seat.row + '</span>';

                    seat.seats.forEach((item) => {
                        var seatHtml = `<div class="seat style-seat ${item.status} ${item.type && item.type}" data-name=${item.name}
                            data-price="${item.price}" data-type="${item.type}"></div>`;
                        rowHtml += seatHtml;
                    });

                    rowHtml += '</div>';

                    $("#areaChair").append(rowHtml);
                });
                hoverSeat()
                clickSeat()
            }
        },
    })
}

let listSeatSelected = [];
let countSelectedSeats = 0;
let totalBill = 0;
let seatSimpleDouble = {
    singleSeats: [],
    doubleSeats: []
};

function renderSeatFromArray(arr) {
    let seatListElem = $('.ticketing-seats');
    if (arr.length > 0) {
        let seatListStrings = arr.map(seat => seat.seatName).join(', ');
        seatListElem.html('<span style="font-size: 15px">' + seatListStrings + '</span>');
    } else {
        seatListElem.empty();
    }
}

function renderDataPayView(seatArray, arrayFood) {
    // Khởi tạo object để lưu trữ số lượng ghế
    let seatCounts = {
        single: 0,
        double: 0
    };

// Tính tổng số lượng ghế
    seatArray.singleSeats.forEach(function (seat) {
        seatCounts.single += 1;
    });

    seatArray.doubleSeats.forEach(function (seat) {
        seatCounts.double += 1;
    });

// Tạo ra các phần tử của bảng
    let tableRows = [];
    let priceFilm = $('#giaVeHidden').val()
    if (seatCounts.single > 0) {
        tableRows.push(`
        <tr>
            <td>Ghế đơn</td>
            <td class="text-center">${seatCounts.single}</td>
            <td class="text-right">${formatCurrency(priceFilm * seatCounts.single)} đ</td>
        </tr>
    `);
    }

    if (seatCounts.double > 0) {
        tableRows.push(`
        <tr>
            <td>Ghế đôi</td>
            <td class="text-center">${seatCounts.double}</td>
            <td class="text-right">${formatCurrency(priceFilm * 2 * seatCounts.double)} đ</td>
        </tr>
    `);
    }

    if (arrayFood.length > 0) {
        let foodRows = '';
        arrayFood.forEach(item => {
            const foodPrice = item.gia * item.quantity;
            foodRows += `
            <tr>
                <td>${item.tenDoAn}</td>
                <td class="text-center">${item.quantity}</td>
                <td class="text-right">${formatCurrency(foodPrice)} đ</td>
            </tr>
        `;
        });
        tableRows.push(foodRows);
    }

// Tạo ra phần tử tổng của bảng

    tableRows.push(`
    <tr>
        <td colspan="2">Tổng</td>
        <td class="text-right">${formatCurrency(totalBill)} đ</td>
    </tr>
`);

// Render ra giao diện HTML
    $("#body-table-pay").html(tableRows.join(""));
}

function addSeatSimpleDouble(arr, seatType, seatName, seatPrice) {
    var newSeat = {
        name: seatName,
        price: seatPrice
    };

    // Thêm ghế vào đối tượng tương ứng
    if (seatType === '') {
        arr.singleSeats.push(newSeat);
    } else if (seatType === 'double') {
        arr.doubleSeats.push(newSeat);
    }

}

function removeSeatDouble(arrs, seatName) {
    arrs.singleSeats = arrs.singleSeats.filter(function (seat) {
        return seat.name !== seatName;
    })

    arrs.doubleSeats = arrs.doubleSeats.filter(function (seat) {
        return seat.name !== seatName;
    })
    let seatSimpleDouble = {
        singleSeats: arrs.singleSeats,
        doubleSeats: arrs.doubleSeats
    };
    return seatSimpleDouble;
}

function clickSeat() {
    $('#areaChair .seat').on('click', function () {
        if ($(this).hasClass("occupied")) {
            return;
        }

        if ($(this).hasClass("selected")) {
            $(this).removeClass('selected');
            countSelectedSeats--;
            $(this).text('')
            let seatName = $(this).data('name');
            let seatPrice = $(this).data('price');
            removeSeat(listSeatSelected, seatName, seatPrice);
            seatSimpleDouble = removeSeatDouble(seatSimpleDouble, seatName);
            checkQuantitySeat()
        } else {
            // Check if the maximum number of seats has been reached
            if (countSelectedSeats >= 5) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Thông báo',
                    text: 'Bạn có thể đạt tối đa 5 ghế trong một lần mua',
                });
                return;
            }
            // Select the seat
            $(this).addClass('selected');
            countSelectedSeats++;
            let seatName = $(this).data('name');
            let seatPrice = $(this).data('price');
            let seatType = $(this).data('type');
            $(this).text(seatName)
            addOrRemove(listSeatSelected, seatName, seatPrice, seatType);
            addSeatSimpleDouble(seatSimpleDouble, seatType, seatName, seatPrice)
            checkQuantitySeat()
        }

        renderSeatFromArray(listSeatSelected)
        renderDataPayView(seatSimpleDouble, arrayFood)
    });
}

function addOrRemove(arr, item, price, seatType) {
    let index = arr.findIndex(function (seat) {
        return seat.seatName === item;
    });
    if (index > -1) {
        arr.splice(index, 1);
        totalBill -= price * $('#giaVeHidden').val()
        $('.ticketing-total-amount').text(formatCurrency(totalBill) + ' đ')
    } else {
        arr.push({
            seatName: item,
            seatPrice: price,
            seatType: seatType
        });
        totalBill += price * $('#giaVeHidden').val()
        $('.ticketing-total-amount').text(formatCurrency(totalBill) + ' đ')
    }
}

function removeSeat(arr, item, price) {
    let index = arr.findIndex(function (seat) {
        return seat.seatName === item;
    });
    if (index > -1) {
        arr.splice(index, 1);
        totalBill -= price * $('#giaVeHidden').val()
        $('.ticketing-total-amount').text(formatCurrency(totalBill) + ' đ')
    }
}

function hoverSeat() {
    $('#areaChair .seat').on('mouseenter', function () {
        let seatName = $(this).data('name');
        $(this).text(seatName);
    }).on('mouseleave', function () {
        if (!$(this).hasClass('selected')) {
            $(this).text('');
        }
    });
}

let countdownTimer = {
    timeLeft: 300 // 300 giây = 5 phút
};

function countdown() {
    setInterval(updateTime, 1000);
}

function updateTime() {
    const minutes = Math.floor(countdownTimer.timeLeft / 60);
    let seconds = countdownTimer.timeLeft % 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    document.querySelector('.countdown-timer').innerHTML = `${minutes}:${seconds}`;
    if (countdownTimer.timeLeft === 0) {
        clearInterval(countdownTimer);
        $('.countdown-timer').html('00:00')
        $('.countdown-timer').css('color', 'red')
        $('#popupMessageTimeOut').modal('show')
        $('#btnAgreeBack').click(function () {
            window.location.href = "/";
        })
    } else {
        countdownTimer.timeLeft--;
    }
}

function checkQuantitySeat() {
    if (listSeatSelected.length <= 0) {
        $('#btnContinue').prop('disabled', true)
        $('#foodIcon').off('click').addClass('disabled')
        $('#payIcon').off('click').addClass('disabled')
    } else {
        $('#btnContinue').prop('disabled', false)
        $('#foodIcon').removeClass('disabled').click(function () {
            $('#myTab button[data-target="#food"]').tab('show')
            $('.ticketing-step div').removeClass('active-red')
            $('#foodIcon div').addClass('active-red')
        })
        $('#payIcon').removeClass('disabled').click(function () {
            $('#myTab button[data-target="#pay"]').tab('show')
            $('.ticketing-step div').removeClass('active-red')
            $('#payIcon div').addClass('active-red')
        })
    }
    $('#seatIcon').click(function () {
        $('#myTab button[data-target="#seat"]').tab('show')
        $('.ticketing-step div').removeClass('active-red')
        $('#seatIcon div').addClass('active-red')
    })
}

function checkPageBtnContinue() {
    $('#btnContinue').click(function () {
        var position = $('.active-red span').text()
        if (position == 'Chọn ghế') {
            $('#myTab button[data-target="#food"]').tab('show');
            $('.ticketing-step div').removeClass('active-red')
            $('#foodIcon div').addClass('active-red')
        } else if (position == 'Bắp nước') {
            $('#myTab button[data-target="#pay"]').tab('show');
            $('.ticketing-step div').removeClass('active-red')
            $('#payIcon div').addClass('active-red')
        } else {
            // window.location.href = "/";
            let typePay = $('input[name="payType"]:checked').val()
            if (typePay == 'momo'){
                window.location.href = '/thanh-toan-momo?orderMoney=' + totalBill+'&foods='+encodeURIComponent(JSON.stringify(arrayFood))+
                    '&listSeats='+encodeURIComponent(JSON.stringify(listSeatSelected))+'&maPhim='+$('#maPhimHidden').val()+
                    '&maPhong='+$('#maPhongHidden').val()+'&maSuatChieu='+atob(window.location.href.split('/').pop())
            } else if (typePay == 'credit') {
                var formData = new FormData();
                formData.append('orderMoney', totalBill);
                formData.append('maPhim', $('#maPhimHidden').val());
                formData.append('maPhong', $('#maPhongHidden').val());
                formData.append('foods', JSON.stringify(arrayFood));
                formData.append('listSeats', JSON.stringify(listSeatSelected));
                $.ajax({
                    type: "POST",
                    url: "/thanh-toan-credit/"+atob(window.location.href.split('/').pop()),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        window.location.href = '/thong-tin-ve/'+response.maLichSu
                    },
                    error: function (error) {

                    }
                });
            } else {
                $('#popupMessageNoChoosePayment').modal('show')
            }
        }
    })
}

let arrayFood = []

function ChooseFood() {
    $('.btn-concession-quantity').click(function () {
        var input = $('#food_' + $(this).data('food'));
        var value = parseInt(input.val());
        var price = $(this).data('price');

        if ($(this).data('type') === 'plus') {
            if (value >= 9)
                return;
            value = value + 1;
            totalBill += price
            // Kiểm tra xem phần tử có trong mảng hay chưa
            const index = arrayFood.findIndex((item) => item.tenDoAn === input.data('ten'));

            if (index !== -1) {
                // Nếu đã có trong mảng, cập nhật quantity lên 1
                arrayFood[index].quantity += 1;
            } else {
                // Nếu chưa có trong mảng, thêm vào mảng
                arrayFood.push({
                    tenDoAn: input.data('ten'),
                    gia: price,
                    quantity: 1
                });
            }

            $('.ticketing-total-amount').text(formatCurrency(totalBill) + ' đ')
        } else {
            if (value > 0) {
                value = value - 1;
                totalBill -= price
                // Kiểm tra xem phần tử có trong mảng hay chưa
                const index = arrayFood.findIndex((item) => item.tenDoAn === input.data('ten'));
                if (index !== -1) {
                    // Nếu đã có trong mảng, cập nhật quantity - 1
                    arrayFood[index].quantity -= 1;
                } else {
                    // Nếu chưa có trong mảng
                    return;
                }
                $('.ticketing-total-amount').text(formatCurrency(totalBill) + ' đ')
            } else {
                return;
            }

        }

        input.val(value);
        arrayFood = arrayFood.filter(item => item.quantity !== 0);
        console.log(arrayFood)
        renderDataPayView(seatSimpleDouble, arrayFood)
        sessionStorage.setItem('arrayFood', JSON.stringify(arrayFood));
    })
}

$(document).ready(function () {
    getListChairs()
    clickSeat()
    countdown()
    checkQuantitySeat()
    checkPageBtnContinue()
    ChooseFood()
})
