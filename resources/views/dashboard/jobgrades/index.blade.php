@extends('dashboard.layouts.master')

@section('title', 'الدرجات الوظيفية')
@section('page-title', 'الدرجات الوظيفية')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
@endsection
@section('current-page', 'الدرجات الوظيفية')
@section('content')
    <div class="col-xl-12">
        <div class="card">
    @include('dashboard.messages_alert')
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-sm-6 col-md-3 mb-4">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
                            <i class="fas fa-plus-square"></i>
                            أضافة درجه وظيفية
                        </a>
                    </div>
                    @include('dashboard.jobgrades.add')
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الدرجه الوظيفية</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jobgrades as $jobgrade)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$jobgrade->name}}</td>
                                    <td>
                                        {{-- Edit --}}
                                        <a class="modal-effect btn btn-outline-info btn-sm" data-effect="effect-scale" data-toggle="modal"
                                           href="#edit{{ $jobgrade->id }}"><i class="fas fa-edit"></i></a>
                                        @include('dashboard.jobgrades.edit')






                                        {{--Delete--}}
                                        <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale" data-toggle="modal"
                                           href="#delete{{ $jobgrade->id }}">
                                            <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                    @include('dashboard.jobgrades.delete')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>




        <!--Internal  Datepicker js -->
        <script src="{{asset('dashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <script>
            var date = $('.fc-datepicker').datepicker({
                dateFormat: 'yy-mm-dd'
            }).val();
        </script>

@endsection

