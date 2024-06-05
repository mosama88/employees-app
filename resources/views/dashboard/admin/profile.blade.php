@extends('dashboard.layouts.master')

@section('title', 'صفحتى')
@section('page-title', 'صفحتى')
@section('page-link-back')
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
    </li>
@endsection

@section('current-page', 'صفحتى')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')


    <div class="row row-sm">



        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        تعديل بياناتى الشخصية
                    </div>
                    <p class="mg-b-20"></p>
                    <div id="wizard3">
                        <h3 class="mb-3">بياناتى</h3>
                        <section>
                            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')
                                {{-- Name Input --}}
                                <div class="col-12">
                                    <div class="control-group form-group">
                                        <label for="exampleInputEmail1">الأسم</label>
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="form-control" placeholder="الأسم" required autofocus autocomplete="name">
                                    </div>
                                    {{-- Email Input --}}
                                    <div class="control-group form-group">
                                        <label for="exampleInputEmail1">البريد الالكترونى</label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control" placeholder="البريد الالكترونى">
                                    </div>

                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                        <div>
                                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                {{ __('Your email address is unverified.') }}

                                                <button form="send-verification"
                                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>

                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                    <x-primary-button>{{ __('حفظ') }}</x-primary-button>

                                    @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                    @endif

                            </form>
                        </section>
                        <h3 class="mb-3">كلمة المرور</h3>
                        <section>
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                {{-- Old Password Input --}}
                                <div class="col-12">
                                    <div class="control-group form-group">
                                        <label for="exampleInputEmail1">كلمة المرور الحالية</label>
                                        <input type="password" name="current_password" class="form-control"
                                            placeholder="كلمة المرور الحالية" required autofocus autocomplete="name">
                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    </div>

                                    {{-- New Password Input --}}
                                    <div class="control-group form-group">
                                        <label for="exampleInputEmail1">كلمة المرور الجديده</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="كلمة المرور الجديده" required autofocus autocomplete="name">
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>

                                    {{-- Confirm Password Input --}}
                                    <div class="control-group form-group">
                                        <label for="exampleInputEmail1">تأكيد كلمة المرور</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="تأكيد كلمة المرور" required autofocus autocomplete="name">
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <x-primary-button>{{ __('حفظ') }}</x-primary-button>

                                    @if (session('status') === 'password-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                    @endif
                            </form>
                        </section>
                        <h3>حذف الحساب</h3>
                        <section>
                            <div class="col-sm-12 col-md-6 my-4 mx-auto">
                                <a class="modal-effect btn btn-danger btn-block" data-effect="effect-scale"
                                    data-toggle="modal" href="#modaldemo8">
                                    <i class="fas fa-user-times ml-2"></i>
                                    حذف الحساب
                                </a>
                            </div>
                            @include('dashboard.admin.delete')
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
@endsection
@section('scripts')
    <!--Internal  Select2 js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/select2/js/select2.min.js"></script>

    <!-- Internal Jquery.steps js -->
    <script src="{{ asset('dashboard') }}/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/plugins/parsleyjs/parsley.min.js"></script>

    <!-- Sticky js -->
    <script src="{{ asset('dashboard') }}/assets/js/sticky.js"></script>

    <!--Internal  Form-wizard js -->
    <script src="{{ asset('dashboard') }}/assets/js/form-wizard.js"></script>
@endsection
