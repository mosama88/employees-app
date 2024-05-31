@extends('dashboard.layouts.master')
@section('title', 'الأجازات')
@section('page-title', 'الأجازات')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
@endsection
@section('current-page', 'الأجازات')
@section('css')
    <link href="{{ asset('dashboard/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection

@php
    $currentYear = date('Y');
    $startYear = $currentYear - 5; // Adjust the number of previous years you want to display
@endphp
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
                                    أجازات {{ $employee->name }} لسنة 
                                <div class="btn-group dropdown mr-5">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-block" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" aria-expanded="false">أختر السنه <i class="icon ion-ios-arrow-down tx-11 mg-l-3"></i></button>
                                    <button type="button" class="btn btn-primary" id="selectedYear">{{ $currentYear }}</button>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate">
                                        @for ($year = $currentYear; $year >= $startYear; $year--)
                                            <a class="dropdown-item" href="#" onclick="setActiveYear({{ $year }})">{{ $year }}</a>
                                        @endfor
                                    </div>
                                </div> </h3>
              
                            <section>
                             
        
    
                                <div class="table-responsive mg-t-20">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                {{-- emergency --}}
                                                <td>عارضه</td>
                                                <td class="text-right">
                                                    @php
                                                        $totalSatisfyingDays = 0;
                                                        foreach ($vacations as $vacation) {
                                                            if ($vacation->type === 'emergency') {
                                                                $totalSatisfyingDays += $vacation->calculateTotalDaysExcludingFridays();
                                                            }
                                                        }
                                                        echo $totalSatisfyingDays;
                                                    @endphp
    
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- regular --}}
                                                <td><span>إعتيادى</span></td>
                                                <td class="text-right">
                                                    @php
                                                        $totalSatisfyingDays = 0;
                                                        foreach ($vacations as $vacation) {
                                                            if ($vacation->type === 'regular') {
                                                                $totalSatisfyingDays += $vacation->calculateTotalDaysExcludingFridays();
                                                            }
                                                        }
                                                        echo $totalSatisfyingDays;
                                                    @endphp
                                                </td>
                                            </tr>
    
                                            <tr>
                                                {{-- Annual --}}
                                                <td>سنوى</td>
                                                <td class="text-right">
                                                    @php
                                                        $totalSatisfyingDays = 0;
                                                        foreach ($vacations as $vacation) {
                                                            if ($vacation->type === 'Annual') {
                                                                $totalSatisfyingDays += $vacation->calculateTotalDaysExcludingFridays();
                                                            }
                                                        }
                                                        echo $totalSatisfyingDays;
                                                    @endphp
                                                </td>
                                            </tr>
    
                                            <tr>
                                                {{-- satisfying --}}
                                                <td>مرضى</td>
                                                <td class="text-right">
                                                    @php
                                                        $totalSatisfyingDays = 0;
                                                        foreach ($vacations as $vacation) {
                                                            if ($vacation->type === 'satisfying') {
                                                                $totalSatisfyingDays += $vacation->calculateTotalDaysExcludingFridays();
                                                            }
                                                        }
                                                        echo $totalSatisfyingDays;
                                                    @endphp
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                
                    </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table key-buttons text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نوع الأجازه</th>
                                        <th>من</th>
                                        <th>إلى</th>
                                        <th>القائم بأعماله</th>
                                        <th>عدد الأيام</th>
                                        <th>حالة الاجازه</th>
                                        <th>المرفقات</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vacations as $index => $vacation)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $vacation->typeVaction() }}</td>
                                            <td>{{ $vacation->start }}</td>
                                            <td>{{ $vacation->to }}</td>
                                            <td>{{$vacation->employee->name }}</td>
                                            <td>{{ $vacation->calculateTotalDaysExcludingFridays() }}</td>
                                            <td>
                                                @if(isset($vacation) && $vacation->status == 'pending')
                                                <span class="badge badge-info">معلق</span>
                                            @elseif(isset($vacation) && $vacation->status == 'approve')
                                                <span class="badge badge-success">موافق</span>
                                            @elseif(isset($vacation) && $vacation->status == 'reject')
                                                <span class="badge badge-danger">مرفوض</span>
                                            @endif
                                            
                                            <td>
                                                @if ($vacation->image)                                    
                                                    <a class="btn btn-outline-primary btn-sm" href="{{ asset('dashboard/assets/images/uploads/vacations/' . $vacation->image->filename) }}" download>
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                @else
                                                    لا يوجد مرفقات
                                                @endif
                                            </td>
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
    @endsection

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

    <script>
        function setActiveYear(year) {
            document.getElementById('selectedYear').textContent = year;
        }
    </script>
@endsection







