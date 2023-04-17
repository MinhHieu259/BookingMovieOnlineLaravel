
var images = [];
var tenPhim = $('#tenPhim')
var Trailer = $('#Trailer')
var moTa = $('#moTa')
var ngayKhoiChieu = $('#ngayKhoiChieu')
var danhMucPhim = $('#danhMuc')
var giaVe = $('#giaVe')
var dienVien = $('#dienVien')
var nhaSanXuat = $('#nhaSanXuat')
var daoDien = $('#daoDien')

function uploadImage() {

    // Lắng nghe sự kiện click vào nút thêm hình ảnh
    $("#btn-upload-image").on("click", function () {
        // Mở file dialog để người dùng chọn hình ảnh
        $("#image-film").click();
    });

    // Lắng nghe sự kiện chọn hình ảnh
    $("#image-film").on("change", function () {
        // Lặp qua từng tập tin và thêm vào mảng hình ảnh
        $.each(this.files, function (index, file) {
            // Tạo một đối tượng URL để tạo đường dẫn tạm thời đến hình ảnh
            images.push(file);
        });
        $("#image-preview-container").html('');
        $.each(images, function (index, image) {
            // Tạo một đối tượng URL để tạo đường dẫn tạm thời đến hình ảnh
            var url = URL.createObjectURL(image);

            var deleteButtonHtml = '<button class="btn btn-danger btn-delete-image"  data-index="' + index + '">Xóa</button>';

            var imgHtml = '<img width="500" src="' + url + '" alt="Image preview">';

            var imageContainerHtml = '<div class="image-container">' + imgHtml + deleteButtonHtml + '</div>';
            $("#image-preview-container").append(imageContainerHtml);
        });
    });

    $("#image-preview-container").on("click", ".btn-delete-image", function () {
        var index = $(this).data('index');
        // Xóa đường dẫn đến hình ảnh khỏi mảng
        images.splice(index, 1);
        // Xóa thẻ <img> và thẻ <button> khỏi DOM
        $(this).closest(".image-container").remove();
        console.log(images);
        $("#image-preview-container").html('');
        $.each(images, function (index, image) {
            // Tạo một đối tượng URL để tạo đường dẫn tạm thời đến hình ảnh
            var url = URL.createObjectURL(image);

            var deleteButtonHtml = '<button class="btn btn-danger btn-delete-image" data-index="' + index + '">Xóa</button>';

            var imgHtml = '<img width="300" src="' + url + '" alt="Image Film">';

            var imageContainerHtml = '<div class="image-container">' + imgHtml + deleteButtonHtml + '</div>';
            $("#image-preview-container").append(imageContainerHtml);
        });
    });
}

function insertFilm(e)
{
    e.preventDefault()
    var formData = new FormData();
    formData.append('tenPhim', tenPhim.val());
    formData.append('Trailer', Trailer.val());
    formData.append('moTa', moTa.val());
    formData.append('ngayKhoiChieu', ngayKhoiChieu.val());
    formData.append('danhMuc', danhMucPhim.val());
    formData.append('giaVe', giaVe.val());
    formData.append('dienVien', dienVien.val());
    formData.append('nhaSanXuat', nhaSanXuat.val());
    formData.append('daoDien', daoDien.val());
    for (var i = 0; i < images.length; i++) {
        formData.append('hinhAnh[]', images[i]);
    }
    $.ajax({
        type: "POST",
        url: "insert-phim",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response)
            if (response.status == 200) {
                $('#popupCofirm').modal('hide')
                toastr["success"](response.message, 'Thành công');
            } else if (response.status == 500) {
                console.log(response.message)
            }
        },
        error: function (error) {
            toastr["success"](error, 'Lỗi');
        }
    });
}

function validatePhim() {
    $('#btnSaveFilm').click(() => {
        var formData = new FormData();
        formData.append('tenPhim', tenPhim.val());
        formData.append('Trailer', Trailer.val());
        formData.append('moTa', moTa.val());
        formData.append('ngayKhoiChieu', ngayKhoiChieu.val());
        formData.append('danhMuc', danhMucPhim.val());
        formData.append('giaVe', giaVe.val());
        formData.append('dienVien', dienVien.val());
        formData.append('nhaSanXuat', nhaSanXuat.val());
        formData.append('daoDien', daoDien.val());
        $.ajax({
            type: "POST",
            url: "/admin/validate-phim",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('input').removeClass('is-invalid')
                $('textarea').removeClass('is-invalid')
                $('.input-error').text('')
            },
            success: function (response) {
                if (response.status == 200) {
                    $('#popupCofirm').modal('show')
                    popupConfirm(
                        'Xác nhận lưu thông tin phim ?',
                        insertFilm
                    )
                }
            },
            error: function (error) {
                console.log(error.responseJSON.errors);
                var arrayErrors = [];
                $.each(error.responseJSON.errors, function (prefix, val) {
                    $('#' + prefix).addClass("is-invalid");
                    $('#' + prefix + "Error").text(val);
                    arrayErrors.push(prefix);
                })
                $('#' + arrayErrors[0]).focus();
            }
        });
    })
}


$(document).ready(function () {
    uploadImage()
    validatePhim()
})
