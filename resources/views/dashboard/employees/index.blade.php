@extends('dashboard.layouts.master')
@section('title', 'بيانات الموظفين')
@section('page-title', 'بيانات الموظفين')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
@endsection


<!-- Internal Data table css -->
<link href="{{asset('dashboard')}}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="{{asset('dashboard')}}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
<link href="{{asset('dashboard')}}/assets/plugins/datatable/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="{{asset('dashboard')}}/assets/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{asset('dashboard')}}/assets/plugins/datatable/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="{{asset('dashboard')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet">

<!--  Right-sidemenu css -->
<link href="{{asset('dashboard')}}/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

<!-- Sidemenu css -->
<link rel="stylesheet" href="{{asset('dashboard')}}/assets/css-rtl/sidemenu.css">

<!--  Custom Scroll bar-->
<link href="{asset{('dasboard')}}/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

<!--- Style css-->
<link href="{asset{('dasboard')}}/assets/css-rtl/style.css" rel="stylesheet">
<link href="{asset{('dasboard')}}/assets/css-rtl/style-dark.css" rel="stylesheet">

<!---Skinmodes css-->
<link href="{asset{('dasboard')}}/assets/css-rtl/skin-modes.css" rel="stylesheet" />

<!--- Animations css-->
<link href="{asset{('dasboard')}}/assets/css/animate.css" rel="stylesheet">



@section('current-page', 'بيانات الموظفين')
@section('content')
    @include('dashboard.messages_alert')
    <div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-sm-6 col-md-3 mb-4">
                        <a class="btn btn-outline-primary btn-block" href="{{route('dashboard.employees.create')}}">
                            <i class="fas fa-plus-square"></i>
                            أضافة موظف
                        </a>
                    </div>
                </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">الصورة</th>
                                <th class="border-bottom-0">أسم الموظف</th>
                                <th class="border-bottom-0">الهاتف</th>
                                <th class="border-bottom-0">تاريخ التعيين</th>
                                <th class="border-bottom-0">أستلام العمل بالادارة</th>
                                <th class="border-bottom-0">الدرجه</th>
                                <th class="border-bottom-0">المحافظة</th>
                                <th class="border-bottom-0">القسم</th>
                                <th class="border-bottom-0">الحضور</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td class="text-center">
                                        @if ($employee->image)
                                            <img class="img-thumbnail rounded me-2" alt="200x200" style="width: 50px; height:50px"
                                                 src="{{ asset('dashboard/assets/images/uploads/employees/' . $employee->image->filename) }}"
                                                 data-holder-rendered="true">
                                        @else
                                            <img class="img-thumbnail rounded me-2" alt="200x200" style="width: 50px; height:50px"
                                                 src="{{ asset('dashboard/assets/img/employees-default.png') }}" data-holder-rendered="true">
                                        @endif
                                    </td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->hiring_date}}</td>
                                    <td>{{$employee->start_from}}</td>
                                    <td>{{$employee->jobgrade->name}}</td>
                                    <td>{{$employee->address->city}}</td>
                                    <td>{{$employee->department->branch}}</td>
                                    <td>
                                        @foreach ($employee->employeeAppointments as $appointment)
                                                {{ $appointment->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{-- Edit --}}
                                        <a class="btn btn-outline-info btn-sm" href="{{route('dashboard.employees.edit',$employee->id)}}"><i class="fas fa-edit"></i></a>
                                        {{--Delete--}}
                                        <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale" data-toggle="modal"
                                           href="#delete{{ $employee->id }}">
                                            <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    @include('dashboard.employees.delete')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
    </div>
    </div>

        <div class="main-navbar-backdrop"></div>


@section('scripts')

<!-- Internal Data tables -->
<script src="{{ asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>

<!--Internal  Datatable js -->
<script src="{{ asset('dashboard/assets/js/table-data.js') }}"></script>
@endsection
@endsection
