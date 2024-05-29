@extends('dashboard.layouts.master')
@section('title', 'تعديل طلب أجازة')

@section('page-title', 'تعديل طلب أجازة')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.vacations.index') }}">تعديل طلب أجازة</a>
    </li>
@endsection
@section('current-page', 'تعديل طلب أجازة')
@section('css')
    <link href="{{ asset('dashboard/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection
@section('content')
    {{--    @include('dashboard.messages_alert') --}}

    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1 text-center"> تعديل طلب أجازه</h4>
                </div>
                <div class="card-body pt-0">
                    @if ($vacation->image)
                        <img class="img-thumbnail rounded me-2" alt="200x200" style="width: 200px; height:200px"
                            src="{{ asset('dashboard/assets/images/uploads/vacations/' . $vacation->image->filename) }}"
                            data-holder-rendered="true">
                    @else
                        <img class="img-thumbnail rounded me-2" alt="200x200" style="width: 200px; height:200px"
                            src="{{ asset('dashboard/assets/img/employees-default.png') }}" data-holder-rendered="true">
                    @endif
                    <form action="{{ route('dashboard.vacations.update', 'test') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $vacation->id }}">

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputaddress">أختر الموظف</label>
                                <select name="employee_id"
                                    class="form-control select2 @error('employee_id') is-invalid @enderror">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $vacation->vacationEmployee->contains($employee->id) ? 'selected' : '' }}>
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputaddress">نوع الأجازه</label>
                                <select name="type"
                                    class="form-control select2-no-search @error('type') is-invalid @enderror"
                                    id="selectFormgrade" aria-label="Default select example" tabindex="-1">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    <option value="satisfying"{{ $vacation->type === 'satisfying' ? 'selected' : '' }}>مرضى
                                    </option>
                                    <option value="emergency"{{ $vacation->type === 'emergency' ? 'selected' : '' }}>عارضه
                                    </option>
                                    <option value="regular"{{ $vacation->type === 'regular' ? 'selected' : '' }}>إعتيادى
                                    </option>
                                    <option value="Annual"{{ $vacation->type === 'Annual' ? 'selected' : '' }}>سنوى
                                    </option>
                                    <option value="mission"{{ $vacation->type === 'mission' ? 'selected' : '' }}>مأمورية
                                    </option>
                                </select>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputto">من يوم</label>
                                <input class="form-control fc-datepicker @error('file') is-invalid @enderror" name="start"
                                    value="{{ $vacation->start }}" placeholder="MM/DD/YYYY" type="text">
                                @error('start')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputto">إلى يوم</label>
                                <input class="form-control fc-datepicker @error('file') is-invalid @enderror" name="to"
                                    value="{{ $vacation->to }}" placeholder="MM/DD/YYYY" type="text">
                                @error('to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="examplenotes">ملاحظات</label>
                                <textarea class="form-control" id="examplenotes" name="notes" placeholder="أدخل ملاحظاتك" rows="3">{{ $vacation->notes }}</textarea>
                            </div>


                            {{-- <div class="form-group col-6">
                                <label for="exampleInputaddress">القائم بأعماله</label>
                                <select name="acting_employee_id" id="exampleInputaddress"
                                    class="form-control select2 @error('acting_employee_id') is-invalid @enderror">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}"
                                        {{ $vacation->actingEmployeeVacations->contains($employee->id) ? 'selected' : '' }}>
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                                </select>
                                @error('acting_employee_id')
                                    <div id="acting_employee_id-error" class="error-message alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                        </div>
                        {{-- Image Inputs --}}
                        <div class="form-group col-6">
                            <label for="example-text-input" class=" col-form-label">المرفقات</label>
                            <input class="form-control @error('photo') is-invalid @enderror" accept="photo/*" name="photo"
                                type="file" id="example-text-input" onchange="loadFile(event)">
                            <img class="rounded-circle avatar-xl my-3" id="output" />
                            @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

                {{-- Submit --}}
                <div class="col-12 mb-4 text-center">
                    <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                    <a href="{{ route('dashboard.vacations.index') }}" class="btn btn-outline-dark mx-2">رجوع</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Internal Select2 js-->
    <script src="{{ 'dashboard/assets/plugins/select2/js/select2.min.js' }}"></script>


    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>


@section('scripts')
    <!-- Internal Select2.min js -->
    <script src="{{ asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>

    <!--Internal  Datepicker js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>


    <!--Internal  jquery.maskedinput js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/spectrum-colorpicker/spectrum.js"></script>

    <!-- Internal Select2.min js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/select2/js/select2.min.js"></script>

    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

    <!-- Ionicons js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

    <!--Internal  pickerjs js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/pickerjs/picker.min.js"></script>

    <!-- Internal form-elements js -->
    <script src="{{ asset('dashboard') }}/assets/js/form-elements.js"></script>


@endsection
@endsection
