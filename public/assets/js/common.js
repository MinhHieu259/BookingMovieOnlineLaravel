//Set csrf cho ajax
function ajaxSetting() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function formatCurrency(number) {
    // Chuyển đổi số thành chuỗi và loại bỏ dấu chấm phẩy nếu có
    var strNumber = String(number).replace(',', '');

    // Tách phần nguyên và phần thập phân của số
    var parts = strNumber.split('.');
    var integerPart = parts[0];
    var decimalPart = parts.length > 1 ? parts[1] : '';

    // Tạo mảng chứa các chuỗi con của phần nguyên, mỗi chuỗi con có độ dài tối đa là 3
    var integerPartsArray = [];
    while (integerPart.length > 3) {
        integerPartsArray.unshift(integerPart.slice(-3));
        integerPart = integerPart.slice(0, -3);
    }
    integerPartsArray.unshift(integerPart);

    // Ghép các chuỗi con của phần nguyên lại với nhau và thêm dấu phân cách hàng ngàn
    var formattedIntegerPart = integerPartsArray.join(',');

    // Nếu phần thập phân rỗng hoặc độ dài tối đa là 0, trả về chuỗi phần nguyên đã được định dạng
    if (decimalPart.length === 0 || decimalPart.length > 2) {
        return formattedIntegerPart;
    }

    // Nếu phần thập phân có độ dài tối đa là 2, thêm dấu chấm và phần thập phân vào cuối chuỗi
    return formattedIntegerPart + '.' + decimalPart.padEnd(2, '0');
}

$(document).ready(function () {
    ajaxSetting()
    formatCurrency()
})

