<div class="modal" tabindex="-1" role="dialog" id="popupAddPhong" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nhập thông tin phòng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tenPhong">Tên phòng</label>
                            <input type="text" class="form-control" id="tenPhong" placeholder="Nhập tên phòng" autocomplete="off">
                            <span class="text-danger input-error" id="tenPhongError"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAgreeAddPhong" class="btn btn-primary">Lưu thông tin</button>
                <button type="button" id="btnBackAddPhong" class="btn btn-secondary" data-dismiss="modal">Trở về</button>
            </div>
        </div>
    </div>
</div>
