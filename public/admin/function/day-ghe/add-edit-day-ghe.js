var btnAddRowGhe = $('#btnAddGhe')
let arrayDelete = []
let formData;
function addRowDayGhe() {
    btnAddRowGhe.on('click', function (e) {
        e.preventDefault()
        var rowCount = $('#table-input-day-ghe tr').length
        var newRow = '<tr>' +
            '<input type="hidden" value="1" name="maDayGhe[]">'+
            '<td class="td-table-input text-right"><span class="mr-3">' + rowCount + '</span></td>' +
            '<td class="td-table-input"><input class="form-control input-in-table" name="tenDayGhe[]" type="text"></td>' +
            '<td class="td-table-input"><input class="form-control input-in-table" style="text-align: right !important;" name="soGheMoiDay[]" type="text"></td>' +
            ' <td style="padding: 0px; text-align: center;"><button data-ma-day-ghe="1" style="margin-top: 3%" class="btn btn-danger btn-sm btn-delete-dayghe">X</button></td>'
        '</tr>'

        $('#table-input-day-ghe tbody').append(newRow)
    })

    $(document).on('click', '.btn-delete-dayghe', function () {
        $(this).closest('tr').remove();
        if ($(this).data('ma-day-ghe') != '1'){
            arrayDelete.push($(this).data('ma-day-ghe'))
        }
        console.log(arrayDelete)
    });
}

function GetListDayGhe() {
    $.ajax({
        type: "GET",
        url: "/admin/get-danh-sach-day-ghe/" + window.location.href.split('/').pop(),
        contentType: 'application/json',
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                $('#table-input-day-ghe tbody').empty()
                console.log(response)
                $.each(response.dayGhe, function (index, dayGhe){
                    var rowCount = $('#table-input-day-ghe tr').length
                    var newRow = '<tr>' +
                        '<input type="hidden" value="'+dayGhe.maDayGhe+'" name="maDayGhe[]">'+
                        '<td class="td-table-input text-right"><span class="mr-3">' + rowCount + '</span></td>' +
                        '<td class="td-table-input"><input class="form-control input-in-table" name="tenDayGhe[]" type="text" value="'+dayGhe.tenDayGhe+'"></td>' +
                        '<td class="td-table-input"><input class="form-control input-in-table" style="text-align: right !important;" name="soGheMoiDay[]" type="text" value="'+dayGhe.soGheMoiDay+'"></td>' +
                        ' <td style="padding: 0px; text-align: center;"><button data-ma-day-ghe="'+dayGhe.maDayGhe+'" style="margin-top: 3%" class="btn btn-danger btn-sm btn-delete-dayghe">X</button></td>'
                    '</tr>'
                    $('#table-input-day-ghe tbody').append(newRow)
                })
            }
        },
    })
}
function serializeFormToFormData(formId) {
    let form = $('#' + formId);
    let serializedArray = form.serializeArray();

    let formData = new FormData();

    $.each(serializedArray, function(index, field) {
        formData.append(field.name, field.value);
    });

    return formData;
}

function logFormData(formData) {
    console.log(Object.fromEntries(formData.entries()))
}


function serializeFormToFormData(formId) {
    let form = $('#' + formId);
    let serializedArray = form.serializeArray();

    let formData = new FormData();

    $.each(serializedArray, function(index, field) {
            formData.append(field.name, field.value);
    });

    return formData;
}

function logFormData(formData) {
    console.log(Object.fromEntries(formData.entries()))
}


function SaveDayGhe() {
    $('#form-add-day-ghe').submit(function (e) {
        e.preventDefault()
        console.log('them ne')
        // Lấy danh sách các input trong các row
        var inputs = $('#form-add-day-ghe input[name="tenDayGhe[]"], #form-add-day-ghe input[name="soGheMoiDay[]"], #form-add-day-ghe input[name="maDayGhe[]"]');

// Lọc ra các input không có dữ liệu
        var nonEmptyInputs = inputs.filter(function () {
            return this.value.trim() !== '';
        });

// Kiểm tra nếu không có input nào có dữ liệu thì bỏ qua
//         if (nonEmptyInputs.length === 0) {
//             console.log('khong co du lieu')
//             return;
//         }
        formData = serializeFormToFormData('form-add-day-ghe')
        formData.append('arrayDelete', JSON.stringify(arrayDelete))
        $.ajax({
            url: '/admin/them-moi-day-ghe/' + window.location.href.split('/').pop(),
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 200) {
                    toastr["success"](response.message, 'Thành công');
                    GetListDayGhe()
                }else {
                    toastr["error"]('Lỗi rồi, thử lại', 'Lỗi');
                }
            },
            error: function (err) {
                toastr["error"]('Lỗi rồi, thử lại', 'Lỗi');
            }
        });
    })
}

$(document).ready(function () {
    addRowDayGhe()
    SaveDayGhe()
})
