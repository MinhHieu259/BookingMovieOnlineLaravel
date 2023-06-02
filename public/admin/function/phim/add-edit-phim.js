
var images = [];
var tenPhim = $('#tenPhim')
var Trailer = $('#Trailer')
var moTa = $('#moTa')
var thoiLuong = $('#thoiLuong')
var gioiHanTuoi = $('#gioiHanTuoi')
var ngonNgu = $('#maNgonNgu')
var ngayKhoiChieu = $('#ngayKhoiChieu')
var danhMucPhim = $('#danhMuc')
var giaVe = $('#giaVe')
var dienVien = $('#dienVien')
var nhaSanXuat = $('#nhaSanXuat')
var daoDien = $('#daoDien')
var inputImageFilm = $('#image-film-edit')
var avatarPreview = $('#image-preview-container')
var buttonDelete = $('#delete-image-film')

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

            var imgHtml = '<img style="width:100px" src="' + url + '" alt="Image preview">';

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
    formData.append('thoiLuong', thoiLuong.val());
    formData.append('gioiHanTuoi', gioiHanTuoi.val());
    formData.append('maNgonNgu', ngonNgu.val());
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
                window.location.href = 'danh-sach-phim'
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
        formData.append('thoiLuong', thoiLuong.val());
        formData.append('gioiHanTuoi', gioiHanTuoi.val());
        formData.append('maNgonNgu', ngonNgu.val());
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

function updateImage(){
    inputImageFilm.on('change', () => {
        var file = inputImageFilm.get(0).files[0]
        var reader = new FileReader()
        reader.onload = function (e) {
            // Thiết lập thuộc tính src của thẻ img để hiển thị hình ảnh đó
            var img = $('<img>')
            img.css('margin-top', '20px')
            img.css('width', '200px')

            // Thiết lập thuộc tính src của thẻ img để hiển thị hình ảnh
            img.attr('src', e.target.result)

            // Thêm thẻ img vào div
            avatarPreview.html(img)

            //Show button delete
            buttonDelete.show()
        };
        reader.readAsDataURL(file)
    })

    //Click button delete
    buttonDelete.on('click', function (e) {
        e.preventDefault()
        avatarPreview.html('')
        // Xóa giá trị của thẻ input bằng cách thiết lập giá trị là rỗng
        inputImageFilm.val('')
        // Ẩn nút "Xóa"
        buttonDelete.hide()
    })

    $("#btn-upload-image-edit").on("click", function () {
        // Mở file dialog để người dùng chọn hình ảnh
        $("#image-film-edit").click();
    });
}

function updateFilm(e)
{
    e.preventDefault()
    var formData = new FormData();
    formData.append('tenPhim', $('#tenPhimEdit').val());
    formData.append('Trailer', $('#TrailerEdit').val());
    formData.append('moTa', $('#moTaEdit').val());
    formData.append('ngayKhoiChieu', $('#ngayKhoiChieuEdit').val());
    formData.append('danhMuc', $('#danhMucEdit').val());
    formData.append('giaVe', $('#giaVeEdit').val());
    formData.append('dienVien', $('#dienVienEdit').val());
    formData.append('nhaSanXuat', $('#nhaSanXuatEdit').val());
    formData.append('daoDien', $('#daoDienEdit').val());
    formData.append('hinhAnh', inputImageFilm[0].files[0]);
    formData.append('thoiLuong', $('#thoiLuongEdit').val());
    formData.append('gioiHanTuoi', $('#gioiHanTuoiEdit').val());
    formData.append('maNgonNgu', $('#maNgonNguEdit').val());
    $.ajax({
        type: "POST",
        url: "/admin/update-phim/"+window.location.href.split('/').pop(),
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

function validateUpdatePhim() {
    $('#btnUpdateFilm').click(() => {
        var formData = new FormData();
        formData.append('tenPhim', $('#tenPhimEdit').val());
        formData.append('Trailer', $('#TrailerEdit').val());
        formData.append('moTa', $('#moTaEdit').val());
        formData.append('ngayKhoiChieu', $('#ngayKhoiChieuEdit').val());
        formData.append('danhMuc', $('#danhMucEdit').val());
        formData.append('giaVe', $('#giaVeEdit').val());
        formData.append('dienVien', $('#dienVienEdit').val());
        formData.append('nhaSanXuat', $('#nhaSanXuatEdit').val());
        formData.append('daoDien', $('#daoDienEdit').val());
        formData.append('thoiLuong', $('#thoiLuongEdit').val());
        formData.append('gioiHanTuoi', $('#gioiHanTuoiEdit').val());
        formData.append('maNgonNgu', $('#maNgonNguEdit').val());
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
                        'Xác nhận cập nhật thông tin phim ?',
                        updateFilm
                    )
                }
            },
            error: function (error) {
                console.log(error.responseJSON.errors);
                var arrayErrors = [];
                $.each(error.responseJSON.errors, function (prefix, val) {
                    $('#' + prefix+'Edit').addClass("is-invalid");
                    $('#' + prefix+'Edit' + "Error").text(val);
                    arrayErrors.push(prefix);
                })
                $('#' + arrayErrors[0]+'Edit').focus();
            }
        });
    })
}


$(document).ready(function () {
    uploadImage()
    validatePhim()
    validateUpdatePhim()
    updateImage()
})
