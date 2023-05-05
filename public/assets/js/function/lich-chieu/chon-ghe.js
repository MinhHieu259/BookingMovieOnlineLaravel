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
                        var seatHtml = `<div class="seat ${item.status} ${item.type && item.type}" data-name=${item.name}></div>`;
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

function clickSeat(){
    $('.seat').on('click', function () {
        if ($(this).hasClass("occupied")) {
            return;
        }

        if ($(this).hasClass("selected")) {
            // Deselect the seat
            $(this).removeClass('selected');
            countSelectedSeats--;
            removeSeat(listSeatSelected, $(this).data('name'));
        } else {
            // Check if the maximum number of seats has been reached
            if (countSelectedSeats >= 10) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Bạn có thể đạt tối đa 10 ghế',
                });
                return;
            }
            // Select the seat
            $(this).addClass('selected');
            countSelectedSeats++;
            addOrRemove(listSeatSelected, $(this).data('name'));
        }

        console.log(listSeatSelected);
        $('.ticketing-seats').html('<h1 style="font-size: 20px">' + listSeatSelected.join(', ') + '</h1>');
    });
}

function addOrRemove(arr, item) {
    let index = arr.indexOf(item);
    if (index > -1) {
        arr.splice(index, 1);
    } else {
        arr.push(item);
    }
}

function removeSeat(arr, item) {
    let index = arr.indexOf(item);
    if (index > -1) {
        arr.splice(index, 1);
    }
}

function hoverSeat() {
    $('#areaChair .seat').on('mouseenter', function () {
        let seatName = $(this).data('name');
        $(this).append(`<div class="seat-name" data-name="${seatName}">${seatName}</div>`);
    }).on('mouseleave', function () {
        $(this).find('.seat-name').remove();
    });
}

// function addOrRemove(array, value) {
//     var index = array.indexOf(value);
//
//     if (index === -1) {
//         array.push(value);
//     } else {
//         array.splice(index, 1);
//     }
// }

$(document).ready(function () {
    getListChairs()
    clickSeat()
})
