
function getListChairs(){
    $.ajax({
        type: "GET",
        url: "/admin/get-list-ghe/"+window.location.href.split('/').pop(),
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

let listSeatSelected = []
function clickSeat(){
    $('.seat').on('click', function() {
        console.log('hihi')
        if(!$(this).hasClass("occupied")){
            $(this).toggleClass('selected')
            addOrRemove(listSeatSelected, $(this).data('name'))
        }
        console.log(listSeatSelected)
    })
}

function hoverSeat() {
    $('#areaChair .seat').on('mouseover', function() {
        let seatName = $(this).data('name');
        $(this).append(`<div class="seat-name">${seatName}</div>`);
    }).on('mouseout', function() {
        $(this).find('.seat-name').remove();
    });
}

function addOrRemove(array, value) {
    var index = array.indexOf(value);

    if (index === -1) {
        array.push(value);
    } else {
        array.splice(index, 1);
    }
}

$(document).ready(function (){
    getListChairs()
    clickSeat()
})



