@extends('dashboard.layouts.master')
@section('title', 'الأجازات')
@section('current-page', 'الأجازات')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>

@endsection

@section('content')







<div class="container-fluid">
    {{-- Start Row --}}
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="col-12 ">
                    <div class="col-sm-12 col-md-12 col-xl-12">

<!-- row -->
<div class="row row-sm">
    <div class="col-md-12 col-xl-12">
        <div class=" main-content-body-invoice" id="print">
            <div class="card card-invoice">
                <div class="card-body">
                    <div class="invoice-header">
                        <h1 class="invoice-title">فاتوره خدمه مفرده</h1>
                        <div class="billed-from">
                            <h6>فاتوره خدمه مفرده</h6>
                            <p>201 المهندسين<br>
                                Tel No: 0111111111<br>
                                Email: Admin@gmail.com</p>
                        </div><!-- billed-from -->
                    </div><!-- invoice-header -->
                    <div class="row mg-t-20">

                        <div class="col-md">
                            <label class="tx-gray-600">معلومات الفاتوره</label>
                            <p class="invoice-info-row"><span>تاريخ الفاتوره</span> <span></span></p>
                            <p class="invoice-info-row"><span>الدكتور</span> <span></span></p>
                            <p class="invoice-info-row"><span>القسم</span> <span></span></p>
                        </div>
                    </div>
                    <div class="table-responsive mg-t-40">
                        <table class="table table-invoice border text-md-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-20p">#</th>
                                <th class="wd-40p">اسم الخدمه</th>
                                <th class="tx-center">سعر الخدمه</th>
                                <th class="tx-right">نوع الفاتوره</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td class="tx-12"></td>
                                <td class="tx-center"></td>
                                <td class="tx-right"></td>
                            </tr>
                            <tr>
                                <td class="valign-middle" colspan="2" rowspan="4">
                                    <div class="invoice-notes">
                                        <label class="main-content-label tx-13"></label>
                                    </div><!-- invoice-notes -->
                                </td>
                                <td class="tx-right">الاجمالي</td>
                                <td class="tx-right" colspan="2"> </td>
                            </tr>
                            <tr>
                                <td class="tx-right">قيمة الخصم</td>
                                <td class="tx-right" colspan="2"></td>
                            </tr>
                            <tr>
                                <td class="tx-right">نسبة الضريبة</td>
                                <td class="tx-right" colspan="2">% </td>
                            </tr>
                            <tr>
                                <td class="tx-right tx-uppercase tx-bold tx-inverse">الاجمالي شامل الضريبه</td>
                                <td class="tx-right" colspan="2">
                                    <h4 class="tx-primary tx-bold"></h4>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr class="mg-b-40">
                    <a href="#" class="btn btn-danger float-left mt-3 mr-2" id="print_Button" onclick="printDiv()">
                        <i class="mdi mdi-printer ml-1"></i>طباعه
                    </a>
                </div>
            </div>
        </div>
    </div><!-- COL-END -->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>









@endsection
@section('scripts')
    <!-- main-content closed -->
    <!--Internal  Chart.bundle js -->
    <script src="{{asset('dashboard')}}/assets/libs/chart.js/Chart.bundle.min.js"></script>

    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
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
