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
                        <h1 class="invoice-title">إدارة التحول الرقمى</h1>
                        <div class="billed-from">
                            <h6>BootstrapDash, Inc.</h6>
                            <p>201 Something St., Something Town, YT 242, Country 6546<br>
                            Tel No: 324 445-4544<br>
                            Email: youremail@companyname.com</p>
                        </div><!-- billed-from -->
                    </div><!-- invoice-header -->
                    <div class="row mg-t-20">
                        <div class="col-md">
                            <label class="tx-gray-600">Billed To</label>
                            <div class="billed-to">
                                <h6>Juan Dela Cruz</h6>
                                <p>4033 Patterson Road, Staten Island, NY 10301<br>
                                Tel No: 324 445-4544<br>
                                Email: youremail@companyname.com</p>
                            </div>
                        </div>
                        <div class="col-md">
                            <label class="tx-gray-600">Invoice Information</label>
                            <p class="invoice-info-row"><span>Invoice No</span> <span>GHT-673-00</span></p>
                            <p class="invoice-info-row"><span>Project ID</span> <span>32334300</span></p>
                            <p class="invoice-info-row"><span>Issue Date:</span> <span>November 21, 2017</span></p>
                            <p class="invoice-info-row"><span>Due Date:</span> <span>November 30, 2017</span></p>
                        </div>
                    </div>
                    <div class="table-responsive mg-t-40">
                        <table class="table table-invoice border text-md-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="wd-20p">Type</th>
                                    <th class="wd-40p">Description</th>
                                    <th class="tx-center">QNTY</th>
                                    <th class="tx-right">Unit Price</th>
                                    <th class="tx-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Website Design</td>
                                    <td class="tx-12">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam...</td>
                                    <td class="tx-center">2</td>
                                    <td class="tx-right">$150.00</td>
                                    <td class="tx-right">$300.00</td>
                                </tr>
                                <tr>
                                    <td>Firefox Plugin</td>
                                    <td class="tx-12">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque...</td>
                                    <td class="tx-center">1</td>
                                    <td class="tx-right">$1,200.00</td>
                                    <td class="tx-right">$1,200.00</td>
                                </tr>
                                <tr>
                                    <td>iPhone App</td>
                                    <td class="tx-12">Et harum quidem rerum facilis est et expedita distinctio</td>
                                    <td class="tx-center">2</td>
                                    <td class="tx-right">$850.00</td>
                                    <td class="tx-right">$1,700.00</td>
                                </tr>
                                <tr>
                                    <td>Android App</td>
                                    <td class="tx-12">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut</td>
                                    <td class="tx-center">3</td>
                                    <td class="tx-right">$850.00</td>
                                    <td class="tx-right">$2,550.00</td>
                                </tr>
                                <tr>
                                    <td class="valign-middle" colspan="2" rowspan="4">
                                        <div class="invoice-notes">
                                            <label class="main-content-label tx-13">Notes</label>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div><!-- invoice-notes -->
                                    </td>
                                    <td class="tx-right">Sub-Total</td>
                                    <td class="tx-right" colspan="2">$5,750.00</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Tax (5%)</td>
                                    <td class="tx-right" colspan="2">$287.50</td>
                                </tr>
                                <tr>
                                    <td class="tx-right">Discount</td>
                                    <td class="tx-right" colspan="2">-$50.00</td>
                                </tr>
                                <tr>
                                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
                                    <td class="tx-right" colspan="2">
                                        <h4 class="tx-primary tx-bold">$5,987.50</h4>
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
