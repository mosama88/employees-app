<form wire:submit.prevent="submit" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <div class="form-group col-6">
            <label for="exampleInputaddress">أختر الموظف</label>
            <select wire:model="formData.employee_id" class="form-control select2 @error('formData.employee_id') is-invalid @enderror">
                <option disabled selected="">افتح قائمة التحديد</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
            @error('formData.employee_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="exampleInputaddress">نوع الأجازه</label>
            <select wire:model="formData.type" class="form-control select2-no-search @error('formData.type') is-invalid @enderror" id="selectFormgrade" aria-label="Default select example" tabindex="-1">
                <option disabled selected="">افتح قائمة التحديد</option>
                <option value="satisfying">مرضى</option>
                <option value="emergency">عارضه</option>
                <option value="regular">إعتيادى</option>
                <option value="Annual">سنوى</option>
                <option value="mission">مأمورية</option>
            </select>
            @error('formData.type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="form-group col-6">
            <label for="exampleInputto">من يوم</label>
            <input wire:model="formData.start" class="form-control fc-datepicker @error('formData.start') is-invalid @enderror" placeholder="MM/DD/YYYY" type="text">
            @error('formData.start')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group col-6">
            <label for="exampleInputto">إلى يوم</label>
            <input wire:model="formData.to" class="form-control fc-datepicker @error('formData.to') is-invalid @enderror" placeholder="MM/DD/YYYY" type="text">
            @error('formData.to')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="form-group col-6">
            <label for="examplenotes">ملاحظات</label>
            <textarea wire:model="formData.notes" class="form-control" id="examplenotes" placeholder="أدخل ملاحظاتك" rows="3"></textarea>
        </div>

        {{-- Image Inputs --}}
        <div class="form-group col-6">
            <label for="example-text-input" class=" col-form-label">المرفقات</label>
            <input wire:model="formData.file" class="form-control @error('formData.file') is-invalid @enderror" accept="file/*" name="file" type="file" id="example-text-input" onchange="loadFile(event)">
            <img class="rounded-circle avatar-xl my-3" id="output" />
            @error('formData.file')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    {{-- Submit --}}
    <div class="col-12 mb-4 text-center">
        <button class="btn btn-outline-success" type="submit">تاكيد البيانات</button>
        <a href="{{ route('dashboard.vacations.index') }}" class="btn btn-outline-dark mx-2">رجوع</a>
    </div>
</form>
