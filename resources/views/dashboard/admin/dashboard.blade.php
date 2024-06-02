@extends('dashboard.layouts.master')
@section('title', 'لوحة التحكم')
@section('content')
@section('page-title', 'لوحة التحكم')
<div class="container-fluid">
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back!</h2>
                <p class="mg-b-0">Sales monitoring dashboard template.</p>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->

    <!-- row -->
    <div class="row row-sm mx-auto">
        <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12 ">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الموظفين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <a class="btn btn-outline btn-block text-center text-white"
                                href="{{ route('dashboard.employees.create') }}">
                                <i class="fas fa-plus-square"></i>
                                أضافة موظف
                            </a>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
  
        <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 ">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الأجازات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <a class="btn btn-outline btn-block text-center text-white"
                                href="{{ route('dashboard.vacations.create') }}">
                                <i class="fas fa-plus-square"></i>
                                أضافة أجازه
                            </a>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
  
    </div>
    <!-- row closed -->



    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-8 col-md-12 col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">الموظفين بالأداره</h3>
                    <p class="tx-12 mb-0 text-muted">A customer is an individual or business that purchases the goods
                        service has evolved to include real-time</p>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ asset('dashboard') }}/assets/img/faces/3.jpg" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-0">
                                            <h5 class="mb-1 tx-15">Samantha Melon</h5>
                                            <p class="mb-0 tx-13 text-muted">User ID: #1234 <span
                                                    class="text-success ml-2">Paid</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark1" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ asset('dashboard') }}/assets/img/faces/11.jpg" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Jimmy Changa</h5>
                                            <p class="mb-0 tx-13 text-muted">User ID: #1234 <span
                                                    class="text-danger ml-2">Pending</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark2" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ asset('dashboard') }}/assets/img/faces/17.jpg" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Gabe Lackmen</h5>
                                            <p class="mb-0 tx-13 text-muted">User ID: #1234<span
                                                    class="text-danger ml-2">Pending</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark3" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ asset('dashboard') }}/assets/img/faces/15.jpg" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Manuel Labor</h5>
                                            <p class="mb-0 tx-13 text-muted">User ID: #1234<span
                                                    class="text-success ml-2">Paid</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark4" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle ml-3 my-auto"
                                    src="{{ asset('dashboard') }}/assets/img/faces/6.jpg" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Sharon Needles</h5>
                                            <p class="b-0 tx-13 text-muted mb-0">User ID: #1234<span
                                                    class="text-success ml-2">Paid</span></p>
                                        </div>
                                        <span class="mr-auto wd-45p fs-16 mt-2">
                                            <div id="spark5" class="wd-100p"></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row close -->

    <!-- row opened -->
    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-4 col-xl-4">
            <div class="card card-dashboard-eight pb-2">
                <h6 class="card-title">Your Top Countries</h6><span class="d-block mg-b-10 text-muted tx-12">Sales
                    performance revenue based by country</span>
                <div class="list-group">
                    <div class="list-group-item border-top-0">
                        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                        <p>United States</p><span>$1,671.10</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                        <p>Netherlands</p><span>$1,064.75</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                        <p>United Kingdom</p><span>$1,055.98</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                        <p>Canada</p><span>$1,045.49</span>
                    </div>
                    <div class="list-group-item">
                        <i class="flag-icon flag-icon-in flag-icon-squared"></i>
                        <p>India</p><span>$1,930.12</span>
                    </div>
                    <div class="list-group-item border-bottom-0 mb-0">
                        <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                        <p>Australia</p><span>$1,042.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-8 col-xl-8">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-1">Your Most Recent Earnings</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span>
                <div class="table-responsive country-table">
                    <table
                        class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                            <tr>
                                <th class="wd-lg-25p">Date</th>
                                <th class="wd-lg-25p tx-right">Sales Count</th>
                                <th class="wd-lg-25p tx-right">Earnings</th>
                                <th class="wd-lg-25p tx-right">Tax Witheld</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>05 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">34</td>
                                <td class="tx-right tx-medium tx-inverse">$658.20</td>
                                <td class="tx-right tx-medium tx-danger">-$45.10</td>
                            </tr>
                            <tr>
                                <td>06 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">26</td>
                                <td class="tx-right tx-medium tx-inverse">$453.25</td>
                                <td class="tx-right tx-medium tx-danger">-$15.02</td>
                            </tr>
                            <tr>
                                <td>07 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">34</td>
                                <td class="tx-right tx-medium tx-inverse">$653.12</td>
                                <td class="tx-right tx-medium tx-danger">-$13.45</td>
                            </tr>
                            <tr>
                                <td>08 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">45</td>
                                <td class="tx-right tx-medium tx-inverse">$546.47</td>
                                <td class="tx-right tx-medium tx-danger">-$24.22</td>
                            </tr>
                            <tr>
                                <td>09 Dec 2019</td>
                                <td class="tx-right tx-medium tx-inverse">31</td>
                                <td class="tx-right tx-medium tx-inverse">$425.72</td>
                                <td class="tx-right tx-medium tx-danger">-$25.01</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>

@endsection
