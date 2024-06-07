<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('admin/dashboard') }}"><img
                src="{{ asset('dashboard') }}/assets/img/media/logo-Administrative-Prosecution.png" class="main-logo"
                alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('admin/dashboard') }}"><img
                src="{{ asset('dashboard') }}/assets/img/media/logo-Administrative-Prosecution.png"
                class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('admin/dashboard') }}"><img
                src="{{ asset('dashboard') }}/assets/img/media/logo-Administrative-Prosecution.png" class="logo-icon"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('admin/dashboard') }}"><img
                src="{{ asset('dashboard') }}/assets/img/media/logo-Administrative-Prosecution.png"
                class="logo-icon dark-theme" alt="logo"></a>
        <h5 class="my-auto tx-18">هيئة<span> النيابه</span>
            الأدارية</h5>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ asset('dashboard') }}/assets/img/login-user.png"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    @if (auth('admin')->check())
                        <h4 class="font-weight-semibold mt-3 mb-0">{{ auth('admin')->user()->name }}</h4>
                        <span class="mb-0 text-muted">مدير</span>
                    @else
                        <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                        <span class="mb-0 text-muted">مستخدم</span>
                    @endif
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">برنامج إدارة شئون الموظفين</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('dashboard.admin') }}"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"></path>
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z">
                        </path>
                    </svg><span class="side-menu__label">لوحة التحكم</span></a>
            </li>
            @if (auth('admin')->check())
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                            <path
                                d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                        </svg>

                        <span class="side-menu__label">الاعدادت العامه</span><i
                            class="angle fe fe-chevron-down"></i></a>
                    <ul class="slide-menu">
                        <li><a class="slide-item" href="{{ route('dashboard.holidays.index') }}">العطلات الرسمية</a>
                        </li>
                        <li><a class="slide-item" href="{{ route('dashboard.jobgrades.index') }}">الدرجات الوظيفيه</a>
                        </li>
                        <li><a class="slide-item" href="{{ route('dashboard.jobs.index') }}">المسمى الوظيفى</a>
                        </li>
                        <li><a class="slide-item" href="{{ route('dashboard.departments.index') }}">النيابات و
                                الأدارات</a></li>
                        <li><a class="slide-item" href="{{ route('dashboard.employees.index') }}">الموظفين</a></li>
                    </ul>

                </li>
            @endif


            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"
                            opacity=".3" />
                        <path
                            d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                    </svg>
                    <span class="side-menu__label">الأجازات</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('dashboard.vacations.index') }}">الأجازات</a></li>
                    <li><a class="slide-item" href="{{ route('dashboard.show.vacation') }}">أجازات الموظفين</a></li>
                </ul>
            </li>


        </ul>
    </div>
</aside>
