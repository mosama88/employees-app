<!-- Basic modal -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">أضافة قسم</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.departments.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group mb-3">
                        <label>أسم النيابة</label>
                        <input type="text" name="branch" class="form-control" id="inputName" placeholder="Name">
                    </div>

                    <select name="address_id" class="form-control select2">

                    <option disabled selected="">افتح قائمة التحديد</option>
                        @foreach($addresses as $address)
                            <option value="{{$address->id}}">{{$address->city}}</option>
                        @endforeach
                    </select>

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
