<!-- Basic modal -->
<div class="modal" id="edit{{ $department->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل بيانات الدرجه الوظيفية</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.departments.update', 'test') }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$department->id}}">

                    <div class="form-group mb-3">
                        <label>أسم النيابة</label>
                        <input type="text" name="branch" value="{{$department->branch}}" class="form-control" id="inputName" placeholder="أسم النيابة">
                    </div>
                    <div class="form-group mb-3">
                    <label>محافظة</label>
                    <select name="address_id" class="form-control select2">
                        <option disabled selected="">افتح قائمة التحديد</option>
                        @foreach($addresses as $address)
                            <option value="{{$address->id}}"{{$address->id == $department->address_id ? 'selected':"" }}>{{$address->city}}</option>
                        @endforeach
                    </select>
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

