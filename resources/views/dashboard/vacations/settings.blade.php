@extends('dashboard.layouts.master')
@section('title', 'إعدادات الاجازه')

@section('page-title', 'إعدادات الاجازه')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.vacations.index') }}">إعدادات الاجازه</a>
    </li>
@endsection
@section('current-page', 'إعدادات الاجازه')
@section('css')
    <link href="{{asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>

    <style>
        #vacationForm {
    display: none;
}

.hidden {
    display: none;
}
    </style>
@endsection
@section('content')
    {{--    @include('dashboard.messages_alert')--}}

    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1 text-center">إعدادات الاجازه</h4>
                </div>
                <div class="card-body pt-0">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="col-sm-6 col-md-3 mb-4">
                                <a id="requestVacationBtn" class="btn btn-outline-primary btn-block" href="#">
                                    <i class="fas fa-plus-square"></i>
                                    طلب إجازة
                                </a>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Joan Powell</td>
                                        <td>Associate Developer</td>
                                        <td>$450,870</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Gavin Gibson</td>
                                        <td>Account manager</td>
                                        <td>$230,540</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
            <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 hidden" id="vacationForm">
                <div class="card  box-shadow-0 ">
                    <div class="card-header">
                        <h4 class="card-title mb-1 text-center">طلب أجازه</h4>
                    </div>
                    <div class="card-body pt-0">
                    {{-- Setting Vacations Form --}}
                    <form>
                        {{-- Success Message --}}
                                <div id="successMessage" class="alert alert-primary d-none" role="alert">
                                    تم أضافة إعدادت الاجازه بنجاح <a href="{{ route('dashboard.employees.index') }}"
                                        class="alert-link">أضغط هنا لمشاهدة الأضافة</a>
                                </div>

                        <div class="row">
                            <div class="form-group col-6">
                                {{-- job_grades_id Inputs --}}
                                <label for="selectFormgrade">الدرجه الوظيفية</label>
                                <select name="job_grades_id" value="{{old('job_grades_id')}}"
                                        class="form-control select2 @error('job_grades_id') is-invalid @enderror">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach($jobGrades as $jobgrade)
                                        <option
                                            value="{{$jobgrade->id}}"{{ old('job_grades_id') == $jobgrade->id ? 'selected' : '' }}>{{$jobgrade->name}}</option>
                                    @endforeach
                                </select>
                                @error('job_grades_id')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- رصيد الأجازات --}}
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">عدد رصيد الأجازات</label>
                                <input type="text" name="name" value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="أدخل الأسم">
                                @error('name')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- رصيد العارضه --}}
                            <div class="form-group col-4">
                                <label for="exampleInputEmail1">عدد رصيد العارضه</label>
                                <input type="text" name="name" value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="أدخل الأسم">
                                @error('name')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-4">
                                <label for="exampleInputEmail1">عدد رصيد الأعتيادى</label>
                                <input type="text" name="name" value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="أدخل الأسم">
                                @error('name')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-4">
                                <label for="exampleInputEmail1">عدد رصيد المرضى</label>
                                <input type="text" name="name" value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="أدخل الأسم">
                                @error('name')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--End row -->

                        <div class="row">
                            {{-- رصيد العارضه --}}
                            <div class="form-group col-4">
                                <label for="exampleInputEmail1">عدد رصيد السنوى</label>
                                <input type="text" name="name" value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="أدخل الأسم">
                                @error('name')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><!--End row -->


                        {{-- Submit --}}
                        <div class="col-12 mb-4 text-center">
                            <input class="btn btn-outline-success" type="submit" value="تاكيد البيانات">
                            <a href="{{ route('dashboard.vacations.index') }}"
                               class="btn btn-outline-dark mx-2">رجوع</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
        <!-- Internal Select2.min js -->
        <script src="{{ asset('dashboard/assets/plugins/select2/js/select2.min.js') }}"></script>

        <!--Internal  Datepicker js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>


        <!--Internal  jquery.maskedinput js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/jquery.maskedinput/jquery.maskedinput.js"></script>

        <!--Internal  spectrum-colorpicker js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/spectrum-colorpicker/spectrum.js"></script>

        <!--Internal Ion.rangeSlider.min js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

        <!--Internal  jquery-simple-datetimepicker js -->
        <script
            src="{{ asset('dashboard') }}/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>

        <!-- Ionicons js -->
        <script
            src="{{ asset('dashboard') }}/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>

        <!--Internal  pickerjs js -->
        <script src="{{ asset('dashboard') }}/assets/plugins/pickerjs/picker.min.js"></script>

        <!-- Internal form-elements js -->
        {{--        <script src="{{ asset('dashboard') }}/assets/js/form-elements.js"></script>--}}


        <script>
            $(document).ready(function() {
    // Hide the form initially
    $('#vacationForm').hide();

    // Show the form when the "Request Vacation" button is clicked
    $('#requestVacationBtn').click(function() {
        $('#vacationForm').show();
    });
});
        </script>
    @endsection
