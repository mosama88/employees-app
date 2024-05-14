<!-- Basic modal -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">أضافة عطلة رسمية</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.holidays.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group mb-3">
                        <label>أسم العطلة</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
                    </div>
                    <div class="form-group mb-3">
                        <label>من</label>
                        <input class="form-control fc-datepicker" type="date" name="from" placeholder="YYYY-DD-MM"
                       type="text" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>إلى</label>
                        <input class="form-control fc-datepicker" type="date" name="to" placeholder="YYYY-DD-MM"
                               type="text" required>
                    </div>

            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit" type="button">تأكيد البيانات</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Basic modal -->



