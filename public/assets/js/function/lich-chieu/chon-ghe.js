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
                            data-price="${item.price}"></div>`;
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
            $(this).text(seatName)
            addOrRemove(listSeatSelected, seatName, seatPrice);
            checkQuantitySeat()
        }

        console.log(listSeatSelected);
        $('.ticketing-seats').html('<h1 style="font-size: 20px">' + listSeatSelected.join(', ') + '</h1>');
    });
}

function addOrRemove(arr, item, price) {
    let index = arr.indexOf(item);
    if (index > -1) {
        arr.splice(index, 1);
        totalBill -= price * $('#giaVeHidden').val()
        $('.ticketing-total-amount').text(totalBill+' đ')
    } else {
        arr.push(item);
        totalBill += price * $('#giaVeHidden').val()
        $('.ticketing-total-amount').text(totalBill+' đ')
    }
}

function removeSeat(arr, item, price) {
    let index = arr.indexOf(item);
    if (index > -1) {
        arr.splice(index, 1);
        totalBill -= price * $('#giaVeHidden').val()
        $('.ticketing-total-amount').text(totalBill+' đ')
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
    $('#btnContinue').click(function (){
        var position = $('.active-red span').text()
        if (position == 'Chọn ghế'){
            $('#myTab button[data-target="#food"]').tab('show');
            $('.ticketing-step div').removeClass('active-red')
            $('#foodIcon div').addClass('active-red')
        } else if (position == 'Bắp nước'){
            $('#myTab button[data-target="#pay"]').tab('show');
            $('.ticketing-step div').removeClass('active-red')
            $('#payIcon div').addClass('active-red')
        } else {
            // window.location.href = "/";
            console.log($('input[name="payType"]:checked').val())
        }
    })
}


$(document).ready(function () {
    getListChairs()
    clickSeat()
    countdown()
    checkQuantitySeat()
    checkPageBtnContinue()
})
