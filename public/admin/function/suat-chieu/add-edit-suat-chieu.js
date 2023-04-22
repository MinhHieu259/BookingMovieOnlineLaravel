function selectCumRap() {
    $('#cumRap').on('change', function () {
        $('#phongChieu').html('')
        if ($(this).val() != ''){
            $.ajax({
                type: "GET",
                url: "/admin/get-list-room/"+$(this).val(),
                contentType: 'application/json',
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {
                        $('#phongChieu').append('<option value="">---Chọn phòng ---</option>');
                       console.log(response.rooms)
                        $.each(response.rooms, function(index, room) {
                            $('#phongChieu').append('<option value="' + room.maPhong + '">' + room.tenPhong + '</option>');
                        });

                    }
                },
            })
        }
    })
}

$(document).ready(function () {
    selectCumRap()
})
