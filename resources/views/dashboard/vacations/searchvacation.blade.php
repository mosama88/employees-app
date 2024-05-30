
@extends('dashboard.layouts.master')
@section('title', 'الأجازات')
@section('current-page', 'الأجازات')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('dashboard.messages_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6 col-md-3 mb-4">
                            <a class="btn btn-outline-primary btn-block" href="{{ route('dashboard.vacations.create') }}">
                                <i class="fas fa-plus-square"></i>
                                أضافة أجازه
                            </a>
                        </div>
                    </div>
                    {{-- Success Message --}}
                    <div id="successMessage" class="alert alert-solid-success d-none" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span></button>
                        <strong>Well done!</strong> تم حذف الأجازه بنجاح
                    </div>

                    <div class="card-body p-2">
                        <div class="input-group col-6 my-4">
                            <input type="text" name='search' class="form-control" placeholder="Search ...">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="button">Search</button>
                            </span>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="vacationTable" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">أسم الموظف</th>
                                    <th class="border-bottom-0">نوع الأجازه</th>
                                    <th class="border-bottom-0">من</th>
                                    <th class="border-bottom-0">إلى</th>
                                    <th class="border-bottom-0">عدد الايام</th>
                                    <th class="border-bottom-0">القائم بأعماله</th>
                                    <th class="border-bottom-0">حالة الأجازه</th>
                                    <th class="border-bottom-0">ملاحظات</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacations as $vacation)
                                    <tr id="vacationRow{{ $loop->iteration }}">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            @foreach ($vacation->vacationEmployee as $employee)
                                                {{ $employee->name }}
                                            @endforeach
                                        </td>
                                        <td>{{ $vacation->typeVaction() }}</td>
                                        <td>{{ $vacation->start }}</td>
                                        <td>{{ $vacation->to }}</td>
                                        <td>{{ $vacation->calculateTotalDaysExcludingFridays() }}</td>
                                        <td>{{ $vacation->employee->name }}</td>
                                        <td>
                                            @if ($vacation->status == '1')
                                                <span class="badge badge-success">موافق</span>
                                            @else
                                                <span class="badge badge-danger">غير موافق</span>
                                            @endif
                                            <div class="{{ $vacation->status == '1' ? 'success' : 'danger' }} ml-1">
                                            </div>
                                        </td>
                                        <td>{{ $vacation->notes }}</td>
                                        <td>
                                            <!-- Edit -->
                                            <a class="btn btn-outline-info btn-sm"
                                                href="{{ route('dashboard.vacations.edit', $vacation->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- Print -->
                                            @if ($vacation->status == '1')
                                                <a class="btn btn-outline-primary btn-sm"
                                                    href="{{ route('dashboard.vacation-print', $vacation->id) }}">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            @endif
                                            <!-- Delete -->
                                            <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete{{ $vacation->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            @include('dashboard.vacations.delete', [
                                                'vacation' => $vacation,
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
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
        // Delete
        function deleteVacation(vacationId) {
            let form = document.getElementById('deleteVacationForm' + vacationId);
            let formData = new FormData(form);
            let actionUrl = "{{ route('dashboard.vacations.destroy', '') }}/" + vacationId;

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
                        // Hide the delete modal after successful deletion
                        $('#delete' + vacationId).modal('hide');

                        // Remove the deleted vacation row from the table
                        let row = document.getElementById('vacationRow' + vacationId);
                        if (row) {
                            row.remove();
                        }

                        // Show the success message
                        let successMessage = $('#successMessage');
                        successMessage.removeClass('d-none');

                        // Hide the success message slowly after 3 seconds
                        setTimeout(() => {
                            successMessage.fadeOut('slow', function() {
                                successMessage.addClass('d-none')
                                    .show(); // Ensure it is hidden and reset for next time
                            });
                        }, 3000); // Adjust the duration as needed
                    } else {
                        console.error('Error deleting vacation: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the vacation.');
                });
        }
    </script>


@endsection
