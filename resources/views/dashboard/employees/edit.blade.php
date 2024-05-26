@extends('dashboard.layouts.master')
@section('title', 'تعديل بيانات الموظف')
@section('css')
    <!---Internal Fancy uploader css-->
    <link href="{{ asset('dashboard') }}/assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />

    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/plugins/sumoselect/sumoselect-rtl.css">

    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/plugins/telephoneinput/telephoneinput-rtl.css">

    <!--- Animations css-->
    <link href="{{ asset('dashboard') }}/assets/css/animate.css" rel="stylesheet">
@endsection

@section('page-title', 'تعديل بيانات الموظف')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.employees.index') }}">الموظفين</a>
    </li>
@endsection
@section('current-page', 'تعديل بيانات الموظف')
@section('content')

    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1 text-center">تعديل بيانات <strong
                            style="color: #0a47ff">{{ $employee->name }}</strong></h4>
                    @if ($employee->image)
                        <img class="img-thumbnail rounded me-2" alt="200x200" style="width: 200px; height:200px"
                            src="{{ asset('dashboard/assets/images/uploads/employees/' . $employee->image->filename) }}"
                            data-holder-rendered="true">
                    @else
                        <img class="img-thumbnail rounded me-2" alt="200x200" style="width: 200px; height:200px"
                            src="{{ asset('dashboard/assets/img/employees-default.png') }}" data-holder-rendered="true">
                    @endif
                </div>
                <div class="card-body pt-0">
                    <form id="employeeForm" action="{{ route('dashboard.employees.update', 'test') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        {{-- Success Message --}}
                        <div id="successMessage" class="alert alert-primary d-none" role="alert">
                            تم تعديل بيانات <span class="alert-link">{{ $employee->name }}</span> بنجاح <a href="{{ route('dashboard.employees.index') }}"
                                class="alert-link">أضغط هنا لمشاهدة التعديل</a>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                {{-- Name Inputs --}}
                                <label for="exampleInputEmail1">أسم الموظف</label>
                                <input type="text" name="name" value="{{ $employee->name }}" class="form-control"
                                placeholder="أدخل الأسم">
                                    <div id="name-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Appointments Inputs --}}
                            <div class="form-group col-6">
                                <label for="exampleInputappoint">المواعيد</label>
                                <select multiple="multiple" class="testselect2"
                                    name="appointments[]">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    @foreach ($appointments as $appointment)
                                        @php $check = []; @endphp
                                        @foreach ($employee->employeeAppointments as $key => $appointmentEMP)
                                            @php
                                                $check[] = $appointmentEMP->id;
                                            @endphp
                                        @endforeach
                                        <option value="{{ $appointment->id }}"
                                            {{ in_array($appointment->id, $check) ? 'selected' : '' }}>
                                            {{ $appointment->name }}</option>
                                    @endforeach
                                </select>
                                <div id="appointments-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                {{-- phone Inputs --}}
                                <label for="exampleInputEmail1">الهاتف</label>
                                <input type="tel" class="form-control" value="{{ $employee->phone }}" name="phone"
                                    id="exampleInputEmail1" placeholder="01111111">
                                    <div id="phone-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                            <div class="form-group col-6">
                                {{-- alter_phone Inputs --}}
                                <label for="exampleInputPassword1">هاتف أخر</label>
                                <input type="tel" class="form-control" value="{{ $employee->alter_phone }}"
                                    name="alter_phone" id="exampleInputPassword1" placeholder="01111111">
                                    <div id="alter_phone-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- hiring_date Inputs --}}
                            <div class="form-group col-6">
                                <label for="hiring_date">تاريخ التعيين</label>
                                <input class="form-control fc-datepicker"
                                    value="{{ $employee->hiring_date }}" name="hiring_date" placeholder="MM/DD/YYYY"
                                    type="date">
                                    <div id="hiring_date-error" class="error-message alert alert-danger d-none"></div>
                            </div>


                            {{-- start_from Inputs --}}
                            <div class="form-group col-6">
                                <label for="start_from">بداية أستلام العمل بالادارة</label>
                                <input class="form-control fc-datepicker"
                                    value="{{ $employee->start_from }}" name="start_from" placeholder="MM/DD/YYYY"
                                    type="date">
                                    <div id="start_from-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                {{-- Address Inputs --}}
                                <label for="exampleInputaddress">المحافظة</label>
                                <select name="address_id" value="{{ old('address_id') }}"
                                    class="form-control select2">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach ($addresses as $address)
                                        <option
                                            value="{{ $address->id }}"{{ $address->id == $employee->address_id ? 'selected' : '' }}>
                                            {{ $address->city }}</option>
                                    @endforeach
                                </select>
                                <div id="address_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            <div class="form-group col-6">
                                <label for="exampleInputdepartment">النيابة التابع لها</label>
                                <select id="department_id-error" name="department_id" value="{{ old('department_id') }}"
                                    class="form-control select2">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach ($departments as $department)
                                        <option
                                            value="{{ $department->id }}"{{ $department->id == $employee->department_id ? 'selected' : '' }}>
                                            {{ $department->branch }}</option>
                                    @endforeach
                                </select>
                                <div id="department_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                {{-- job_grades_id Inputs --}}
                                <label for="selectFormgrade">الدرجه الوظيفية</label>
                                <select name="job_grades_id" value="{{ old('job_grades_id') }}"
                                    class="form-control select2">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach ($jobgrades as $jobgrade)
                                        <option
                                            value="{{ $jobgrade->id }}"{{ $jobgrade->id == $employee->job_grades_id ? 'selected' : '' }}>
                                            {{ $jobgrade->name }}</option>
                                    @endforeach
                                </select>
                                <div id="job_grades_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>


                            {{-- Image Inputs --}}
                            <div class="form-group col-6">
                                <label for="example-text-input">تغيير صورة الموظف</label>
                                <input class="form-control" accept="image/*"
                                    name="photo" value="{{ old('photo') }}" type="file" id="example-text-input"
                                    onchange="loadFile(event)">
                                <img class="rounded-circle avatar-xl my-3" id="output" />
                                <div id="photo-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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

    <script src="{{ asset('dashboard/assets/js/projects/add-employee.js') }}"></script>

@endsection
@endsection
