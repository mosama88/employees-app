<!-- Basic modal -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">أضافة درجه وظيفية</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="addJobGradeForm" autocomplete="off">
                    @csrf
                    <div class="form-group mb-3">
                        <label>أسم الدرجه الوظيفية</label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="أدخل أسم الدرجه الوظيفية">
                    </div>

                    <div class="form-group mb-3">
                        <label>أسم الوظيفه</label>
                        <select name="job_id" value="{{old('job_id')}}" class="form-control select2 @error('job_id') is-invalid @enderror">
                        <option disabled selected="">افتح قائمة التحديد</option>
                            @foreach($jobs as $job)
                                <option value="{{$job->id}}">{{$job->name}}</option>
                            @endforeach
                        </select>
                            @error('job_id')
                            <div class="alert alert-danger p-1">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="button" onclick="addJobGrade()">تأكيد البيانات</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



