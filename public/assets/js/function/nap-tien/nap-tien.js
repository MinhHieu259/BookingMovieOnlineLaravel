function btnNapNgay() {
    $('#btnNapNgay').click(function (){
        let typeNap = $('input[name="typeNapTien"]:checked').val()
        if (typeNap == 'momo'){
            window.location.href = '/init-nap-tien-momo?tienNap='+$('#soTienNap').data('tiennap')
        } else if ((typeNap == 'banking')) {

        } else {
            $('#popupMessageNoChooseNap').modal('show')
        }
    })
}

$(document).ready(function () {
    btnNapNgay()
})
