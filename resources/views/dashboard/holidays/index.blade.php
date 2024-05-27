@extends('dashboard.layouts.master')

    @section('title', 'العطلات الرسميه')
        @section('page-title', 'العطلات الرسميه')
        @section('page-link-back')
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
            </li>
        @endsection
        @section('current-page', 'العطلات الرسميه')
@section('content')
                @include('dashboard.messages_alert')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                <div class="col-sm-6 col-md-3 mb-4">
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
                        <i class="fas fa-plus-square"></i>
                        أضافة عطلة رسمية
                    </a>
                </div>
                            @include('dashboard.holidays.add')
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mg-b-0 text-md-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>أسم العطلة</th>
                            <th>من</th>
                            <th>إلى</th>
                            <th>عدد الأيام</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($holidays as $holiday)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$holiday->name}}</td>
                                <td>{{$holiday->from}}</td>
                                <td>{{$holiday->to}}</td>
                                <td>
                                    {{ $holiday->calculateTotalDaysExcludingFridays() }}
                                </td>
                            <td>
                                {{-- Edit --}}
                                <a class="modal-effect btn btn-outline-info btn-sm" data-effect="effect-scale" data-toggle="modal"
                                   href="#edit{{ $holiday->id }}"><i class="fas fa-edit"></i></a>
                                @include('dashboard.holidays.edit')

                                    {{--Delete--}}
                                <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale" data-toggle="modal"
                                   href="#delete{{ $holiday->id }}">
                                <i class="fas fa-trash-alt"></i></a>
                            </td>
                                @include('dashboard.holidays.delete')
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


<script>
    function deleteHoliday(holidayId) {
    let form = document.getElementById('deleteHolidayForm' + holidayId);
    let formData = new FormData(form);
    let actionUrl = "{{ route('dashboard.holidays.destroy', '') }}/" + holidayId;

    fetch(actionUrl, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Optionally, remove the deleted holiday row from the table or update the UI as needed
            document.getElementById('delete' + holidayId).remove();
        } else {
            console.error('Error deleting holiday: ' + data.message);
        }
        $('#delete' + holidayId).modal('hide');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the holiday.');
        $('#delete' + holidayId).modal('hide');
    });
}

</script>

@endsection
