
var images = [];

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
            console.log(images)
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

            var deleteButtonHtml = '<button class="btn btn-danger btn-delete-image"  data-index="' + index + '">Xóa</button>';

            var imgHtml = '<img width="500" src="' + url + '" alt="Image preview">';

            var imageContainerHtml = '<div class="image-container">' + imgHtml + deleteButtonHtml + '</div>';
            $("#image-preview-container").append(imageContainerHtml);
        });
    });
}

function addFilm() {
    $('#btnSaveFilm').click(function () {
        console.log($('#dienVien').val())
        console.log(images)
    })
}

$(document).ready(function () {
    uploadImage()
    addFilm()
})
