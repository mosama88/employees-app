@extends('dashboard.layouts.master')
@section('title', 'طلب أجازة')
@section('page-title', 'طلب أجازة')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.employees.index') }}">طلب أجازة</a>
    </li>
@endsection
@section('current-page', 'طلب أجازة')
@section('css')
    <link href="{{ asset('dashboard/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection

@section('content')
    @include('dashboard.messages_alert')

    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1 text-center">طلب أجازه</h4>
                </div>
                <div class="card-body pt-0">


                    <form id="vacationForm" action="{{ route('dashboard.vacations.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        {{-- Success Message --}}
                        <div id="successMessage" class="alert alert-primary d-none" role="alert">
                            تم أضافة أجازة الموظف بنجاح <a href="{{ route('dashboard.vacations.index') }}"
                                class="alert-link">أضغط هنا لمشاهدة الأضافة</a>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputaddress">أختر الموظف</label>
                                <select name="employee_id"
                                    class="form-control select2 @error('employee_id') is-invalid @enderror">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                <div id="employee_id-error" class="error-message alert alert-danger d-none"></div>

                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputaddress">نوع الأجازه</label>
                                <select name="type"
                                    class="form-control select2-no-search @error('type') is-invalid @enderror"
                                    id="selectFormgrade" aria-label="Default select example" tabindex="-1">
                                    <option value="" selected="" disabled> -- افتح قائمة التحديد --</option>
                                    <option value="satisfying">مرضى</option>
                                    <option value="emergency">عارضه</option>
                                    <option value="regular">إعتيادى</option>
                                    <option value="Annual">سنوى</option>
                                    <option value="mission">مأمورية</option>
                                </select>
                                <div id="type-error" class="error-message alert alert-danger d-none"></div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputto">من يوم</label>
                                <input name="start"
                                    class="form-control fc-datepicker @error('start') is-invalid @enderror"
                                    placeholder="MM/DD/YYYY" type="date">
                                <div id="start-error" class="error-message alert alert-danger d-none"></div>

                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputto">إلى يوم</label>
                                <input name="to" class="form-control fc-datepicker @error('to') is-invalid @enderror"
                                    placeholder="MM/DD/YYYY" type="date">
                                <div id="to-error" class="error-message alert alert-danger d-none"></div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="examplenotes">ملاحظات</label>
                                <textarea name="notes" class="form-control" id="examplenotes" placeholder="أدخل ملاحظاتك" rows="3"></textarea>
                                <div id="notes-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Image Inputs --}}
                            <div class="form-group col-6">
                                <label for="example-text-input" class=" col-form-label">المرفقات</label>
                                <input class="form-control" accept="image/*" name="photo" value="{{ old('photo') }}"
                                    type="file" id="example-text-input" onchange="loadFile(event)">
                                <img class="rounded-circle avatar-xl my-3" id="output" />
                                <div id="photo-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>
                        <div id="photo-error" class="error-message alert alert-danger d-none"></div>


                        <div class="form-group col-6">
                            <label for="exampleInputaddress">القائم بأعماله</label>
                            <select name="acting"
                                class="form-control select2 @error('acting') is-invalid @enderror">
                                <option disabled selected="">افتح قائمة التحديد</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                            <div id="acting-error" class="error-message alert alert-danger d-none"></div>

                        </div>

                </div>
                {{-- Submit --}}
                <div class="col-12 mb-4 text-center">
                    <button class="btn btn-outline-success" type="submit">تاكيد البيانات</button>
                    <a href="{{ route('dashboard.vacations.index') }}" class="btn btn-outline-dark mx-2">رجوع</a>
                </div>
            </div>
            </form>

        </div>
    </div>
    </div>
    </div>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection

@section('scripts')



    <!-- Internal Select2.min js -->
    <script src="{{ asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>


    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

    <!-- Ionicons js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

    <!--Internal  pickerjs js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/pickerjs/picker.min.js"></script>



    <!--Internal  Form-elements js-->
    <script src="{{ asset('dashboard') }}/assets/js/advanced-form-elements.js"></script>

    <!--Internal Sumoselect js-->
    <script src="{{ asset('dashboard') }}/assets/plugins/sumoselect/jquery.sumoselect.js"></script>

    <!-- Internal  js-->

    <!--Internal  Datepicker js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>


    <!--Internal  jquery.maskedinput js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/spectrum-colorpicker/spectrum.js"></script>



    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

    <script src="{{ asset('dashboard/assets/js/projects/add-vacation.js') }}"></script>

@endsection














{{-- @section('scripts')
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


@endsection --}}
