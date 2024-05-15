@extends('dashboard.layouts.master')
@section('title', 'الأجازات')
@section('page-title', 'الأجازات')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
@endsection
@section('current-page', 'الأجازات')


<!-- Internal Data table css -->
<link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
<link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="{{ asset('dashboard') }}/assets/plugins/select2/css/select2.min.css" rel="stylesheet">

<!--  Right-sidemenu css -->
<link href="{{ asset('dashboard') }}/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

<!-- Sidemenu css -->
<link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css-rtl/sidemenu.css">

<!--  Custom Scroll bar-->
<link href="{asset{('dasboard')}}/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />

<!--- Style css-->
<link href="{asset{('dasboard')}}/assets/css-rtl/style.css" rel="stylesheet">
<link href="{asset{('dasboard')}}/assets/css-rtl/style-dark.css" rel="stylesheet">

<!---Skinmodes css-->
<link href="{asset{('dasboard')}}/assets/css-rtl/skin-modes.css" rel="stylesheet" />

<!--- Animations css-->
<link href="{asset{('dasboard')}}/assets/css/animate.css" rel="stylesheet">



@section('content')
    @include('dashboard.messages_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">


                        <div class="row">
                            <div class="col-4">
                            </div>
                            @if ($employee->image)
                                <img alt="Responsive image" class="img-thumbnail wd-100p wd-sm-200"
                                    src="{{ asset('dashboard/assets/images/uploads/employees/' . $employee->image->filename) }}"
                                    data-holder-rendered="true">
                            @else
                                <img alt="Responsive image" class="img-thumbnail wd-100p wd-sm-200"
                                    src="{{ asset('dashboard/assets/img/employees-default.png') }}"
                                    data-holder-rendered="true">
                            @endif
                        </div>
                        <div class="col-8">
                            <h3 style="color: blue; font-weight:900;font-size:25px" class="my-3 mx-auto mb-3">
                                {{ $employee->name }}</h3>
                            <section>
                                <div class="table-responsive mg-t-20">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                {{-- emergency --}}
                                                <td>عارضه</td>
                                                <td class="text-right">
                                                    @php
                                                        $totalDays = 0;
                                                        foreach ($vacations as $v) {
                                                            if ($v->type === 'emergency') {
                                                                $totalDays += $v->number_of_days;
                                                            }
                                                        }
                                                        echo $totalDays;
                                                    @endphp
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- regular --}}
                                                <td><span>إعتيادى</span></td>
                                                <td class="text-right text-muted">
                                                    @php
                                                        $totalDays = 0;
                                                        foreach ($vacations as $v) {
                                                            if ($v->type === 'regular') {
                                                                $totalDays += $v->number_of_days;
                                                            }
                                                        }
                                                        echo $totalDays;
                                                    @endphp
                                                </td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                {{-- Annual --}}
                                                <td>سنوى</td>
                                                <td class="text-right">
                                                    @php
                                                        $totalDays = 0;
                                                        foreach ($vacations as $vacation) {
                                                            if ($vacation->type === 'Annual') {
                                                                $totalDays += $vacation->number_of_days;
                                                            }
                                                        }
                                                        echo $totalDays;
                                                    @endphp
                                                </td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                {{-- satisfying --}}
                                                <td>مرضى</td>
                                                <<td class="text-right">
                                                    @php
                                                        $totalDays = 0;
                                                        foreach ($vacations as $vacation) {
                                                            if ($vacation->type === 'satisfying') {
                                                                $totalDays += $vacation->number_of_days;
                                                            }
                                                        }
                                                        echo $totalDays;
                                                    @endphp
                                                    </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>



                    <tbody>
                        @php
                            $totals = [];
                        @endphp
                        {{-- Loop through each vacation to calculate totals --}}
                        @foreach ($vacations as $vacation)
                            @php
                                // Initialize the total for this vacation type if it doesn't exist yet
                                if (!isset($totals[$vacation->type])) {
                                    $totals[$vacation->type] = 0;
                                }

                                // Add the number of days to the total for this vacation type
                                $totals[$vacation->type] += $vacation->number_of_days;
                            @endphp
                        @endforeach

                        {{-- Render table rows with vacation types and their totals --}}
                        @foreach ($totals as $type => $total)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $type }}</td>
                                <td>{{ $total }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نوع الأجازه</th>
                                        <th>من</th>
                                        <th>إلى</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vacations as $index => $vacation)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $vacation->typeVaction() }}</td>
                                            <td>{{ $vacation->start }}</td>
                                            <td>{{ $vacation->to }}</td>
                                            <td></td>
                                            <td></td>
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
