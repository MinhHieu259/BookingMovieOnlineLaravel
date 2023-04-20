var btnAddRowGhe = $('#btnAddGhe')
function addRowDayGhe(){
    btnAddRowGhe.on('click', function (e){
        e.preventDefault()
        var rowCount = $('#table-input-day-ghe tr').length
        var newRow = '<tr>'+
            '<td class="td-table-input text-right"><span class="mr-3">'+rowCount+'</span></td>'+
            '<td class="td-table-input"><input class="form-control input-in-table" name="tenDayGhe[]" type="text"></td>'+
            '<td class="td-table-input"><input class="form-control input-in-table" name="soGheMoiDay[]" type="text"></td>'+
            ' <td style="padding: 0px; text-align: center;"><button style="margin-top: 3%" class="btn btn-danger btn-sm btn-delete-dayghe">X</button></td>'
            '</tr>'

        $('#table-input-day-ghe tbody').append(newRow)
    })

    $(document).on('click', '.btn-delete-dayghe', function() {
        $(this).closest('tr').remove();
    });
}

function SaveDayGhe(){
    $('#form-add-day-ghe').submit(function (e){
        e.preventDefault()
        console.log('them ne')
        // Lấy danh sách các input trong các row
        var inputs = $('#form-add-day-ghe input[name="tenDayGhe[]"], #form-add-day-ghe input[name="soGheMoiDay[]"]');

// Lọc ra các input không có dữ liệu
        var nonEmptyInputs = inputs.filter(function() {
            return this.value.trim() !== '';
        });

// Kiểm tra nếu không có input nào có dữ liệu thì bỏ qua
//         if (nonEmptyInputs.length === 0) {
//             console.log('khong co du lieu')
//             return;
//         }
        $.ajax({
            url: '/admin/them-moi-day-ghe/'+window.location.href.split('/').pop(),
            type: 'post',
            data: nonEmptyInputs,
            success: function(response) {
                if (response.status == 200) {
                    toastr["success"](response.message, 'Thành công');
                    // var rows = '';
                    // $.each($('#add-row-form input[name="name[]"]'), function() {
                    //     rows += '<tr>';
                    //     rows += '<td>' + $(this).val() + '</td>';
                    //     rows += '<td>' + $(this).siblings('input[name="email[]"]').val() + '</td>';
                    //     rows += '</tr>';
                    // });
                    //$('#table tbody').append(rows);
                }
            },
            error: function (err){
                toastr["danger"]('Lỗi rồi, thử lại', 'Thành công');
            }
        });
    })
}

$(document).ready(function (){
    addRowDayGhe()
    SaveDayGhe()
})
