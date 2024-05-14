@extends('dashboard.layouts.master')
@section('title', 'أضافة موظف')

@section('page-title', 'أضافة موظف')

@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('dashboard.employees.index') }}">الموظفين</a>
    </li>
@endsection
@section('current-page', 'أضافة موظف')
@section('content')

    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1 text-center">أدخل بيانات الموظف</h4>
                </div>
                <div class="card-body pt-0">
                    <form action="{{route('dashboard.employees.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">أسم الموظف</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="أدخل الأسم">
                                @error('name')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="selectFormgrade">الدرجه الوظيفية</label>
                                <select name="job_grades_id" value="{{old('job_grades_id')}}" class="form-control select2-no-search @error('job_grades_id') is-invalid @enderror" id="selectFormgrade"
                                        aria-label="Default select example" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')" tabindex="-1">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach($jobgrades as $jobgrade)
                                        <option value="{{$jobgrade->id}}">{{$jobgrade->name}}</option>
                                    @endforeach
                                </select>
                                @error('job_grades_id')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">الهاتف</label>
                                <input type="tel" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" name="phone" id="exampleInputEmail1" placeholder="01111111">
                                @error('phone')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputPassword1">هاتف أخر</label>
                                <input type="tel" value="{{old('alter_phone')}}" class="form-control @error('alter_phone') is-invalid @enderror" name="alter_phone" id="exampleInputPassword1" placeholder="01111111">
                                @error('alter_phone')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-6">
                                <label for="hiring_date">تاريخ التعيين</label>
                                <input class="form-control @error('hiring_date') is-invalid @enderror" name="hiring_date" type="date" value="2020-08-04" id="example-date-input">
                                @error('hiring_date')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group col-6">
                                <label for="start_from">بداية أستلام العمل بالادارة</label>
                                <input class="form-control @error('start_from') is-invalid @enderror" name="start_from" type="date" value="2020-08-04" id="example-date-input">
                                @error('start_from')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputaddress">المحافظة</label>
                                <select name="address_id" value="{{old('address_id')}}" class="form-control select2 @error('address_id') is-invalid @enderror">
                                    <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach($addresses as $address)
                                        <option value="{{$address->id}}">{{$address->city}}</option>
                                    @endforeach
                                </select>
                                @error('address_id')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputdepartment">النيابة التابع لها</label>
                                <select name="department_id" value="{{old('department_id')}}" class="form-control select2 @error('department_id') is-invalid @enderror">
                                <option disabled selected="">افتح قائمة التحديد</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->branch}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <div class="alert alert-danger p-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Image Inputs --}}
                            <label for="example-text-input" class="col-sm-2 col-form-label">صورة الموظف</label>
                            <div class="form-group">
                                <input class="form-control @error('photo') is-invalid @enderror" accept="image/*" name="photo" type="file"
                                       id="example-text-input" onchange="loadFile(event)">
                                <img class="rounded-circle avatar-xl my-3" id="output" />
                                @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 mb-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Internal Select2 js-->
    <script src="{{('dashboard/assets/plugins/select2/js/select2.min.js')}}"></script>


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
    <script src="{{asset('dashboard/assets/plugins/select2/js/select2.min.js')}}"></script>

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
