
function SearchOrder() {
    $('#trangThai').on('change', function (){
        var dataTableSearch = {
            'trangThai': $(this).val(),
            'ngayDat': $('#ngayDat').val()
        };
        $.ajax({
            type: "GET",
            url: "/admin/tim-kiem-order",
            data: dataTableSearch,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                console.log(response)
                // if (response.status == 200) {
                //     $('#table-search').DataTable().clear();
                //     $('#table-search').DataTable().rows.add(response.data);
                //     $('#table-search').DataTable().draw();
                // }
            },
        })
    })

    $('#ngayDat').on('blur', function (){
        var dataTableSearch = {
            'trangThai': $('#trangThai').val(),
            'ngayDat': $('#ngayDat').val()
        };
        $.ajax({
            type: "GET",
            url: "/admin/tim-kiem-order",
            data: dataTableSearch,
            contentType: 'application/json',
            dataType: "json",
            success: function (response) {
                console.log(response)
                // if (response.status == 200) {
                //     $('#table-search').DataTable().clear();
                //     $('#table-search').DataTable().rows.add(response.data);
                //     $('#table-search').DataTable().draw();
                // }
            },
        })
    })
}

function SeachAuto(){
    var dataTableSearch = {
        'trangThai': $('#trangThai').val(),
        'ngayDat': $('#ngayDat').val()
    };
    $.ajax({
        type: "GET",
        url: "/admin/tim-kiem-order",
        data: dataTableSearch,
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            console.log(response)
            // if (response.status == 200) {
            //     $('#table-search').DataTable().clear();
            //     $('#table-search').DataTable().rows.add(response.data);
            //     $('#table-search').DataTable().draw();
            // }
        },
    })
}


$(document).ready(function () {
    SeachAuto()
    SearchOrder()
})
