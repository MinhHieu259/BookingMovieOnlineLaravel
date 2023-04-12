function initTableCumRap() {
    var maCumDelete = ''
    $('#table-cum-rap-in-phong').DataTable({
        "processing": true,
        "columns": [
            {data: "maChiTietRap"},
            {data: "tenRap"},
            {data: "diaChi"}
        ],
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
}

function initDataTableCumRap() {
    $.ajax({
        type: "GET",
        url: "get-list-cum-rap",
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $('#table-cum-rap-in-phong').DataTable().clear();
                $('#table-cum-rap-in-phong').DataTable().rows.add(response.data);
                $('#table-cum-rap-in-phong').DataTable().draw();
            }
        },
    })
}

function clickRowDataTable() {
    $('#table-cum-rap-in-phong tbody').on('dblclick', 'tr', function () {
        if ($('#table-cum-rap-in-phong').DataTable().data().count() != 0) {
            var maCumRap = $(this).find('td:first').text();
            window.location.href = `danh-sach-phong/${maCumRap}`;
        } else {
            return false;
        }
    });
}

$(document).ready(function () {
    initTableCumRap()
    initDataTableCumRap()
    clickRowDataTable()
})
