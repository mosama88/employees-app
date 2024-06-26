
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

    <!-- Title -->
    <title> Valex -  Premium dashboard ui bootstrap rwd admin html5 template </title>

    <!--- Favicon --->
    <link rel="icon"   href="{{asset('dashboard')}}/assets/img/brand/favicon.png" type="image/x-icon"/>

    <!--- Icons css --->
    <link   href="{{asset('dashboard')}}/assets/css/icons.css" rel="stylesheet">

    <!--- Right-sidemenu css --->
    <link   href="{{asset('dashboard')}}/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- Sidemenu css -->
    <link rel="stylesheet"   href="{{asset('dashboard')}}/assets/css-rtl/sidemenu.css">

    <!--- Custom Scroll bar --->
    <link   href="{{asset('dashboard')}}/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

    <!--- Style css --->
    <link   href="{{asset('dashboard')}}/assets/css-rtl/style.css" rel="stylesheet">

    <!--- Skinmodes css --->
    <link   href="{{asset('dashboard')}}/assets/css-rtl/skin-modes.css" rel="stylesheet">

    <!--- Darktheme css --->
    <link   href="{{asset('dashboard')}}/assets/css-rtl/style-dark.css" rel="stylesheet">

    <!-- Sidemenu-respoansive-tabs css -->
    <link   href="{{asset('dashboard')}}/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css" rel="stylesheet">

    <!--- Animations css --->
    <link   href="{{asset('dashboard')}}/assets/css/animate.css" rel="stylesheet">

</head>
<body class="main-body app sidebar-mini">

<!-- Loader -->
<div id="global-loader">
    <img   src="{{asset('dashboard')}}/assets/img/loader.svg" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->

<!-- Page -->
<div class="page">

    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img   src="{{asset('dashboard')}}/assets/img/media/login.png" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="index.html"><img   src="{{asset('dashboard')}}/assets/img/brand/favicon.png" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 mr-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
                                    <div class="main-signup-header">
                                        <h2 class="text-primary">بدء التسجيل</h2>
                                        <h5 class="font-weight-normal mb-4">الاشتراك مجاني ولا يستغرق سوى دقيقة واحدة.</h5>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label>الأسم</label>
                                                <input class="form-control" name="name" placeholder="أدخل أسمك" type="text">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                            </div>
                                            <div class="form-group">
                                                <label>البريد الالكترونى</label>
                                                <input class="form-control" name="email" placeholder="أدخل البريد الالكترونى" type="text">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <label>كلمة المرور</label>
                                                <input class="form-control" name="password" placeholder="أدخل كلمة المرور" type="password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="form-group">
                                                <label>تأكيد كلمة المرور</label>
                                                <input class="form-control" name="password_confirmation" placeholder="أدخل كلمة المرور" type="password">
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>
                                            <button class="btn btn-main-primary btn-block">إنشاء حساب</button>
                                            <div class="row row-xs">
                                                <div class="col-sm-6">
                                                    <button class="btn btn-block"><i class="fab fa-facebook-f"></i> اشترك بواسطة حساب فيسبوك</button>
                                                </div>
                                                <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                    <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> الاشتراك بواسطة حساب تويتر</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="main-signup-footer mt-5">
                                            <p>هل لديك حساب؟ <a href="{{ route('login') }}">الدخول</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>

</div>
<!-- End Page -->

<!--- JQuery min js --->
<script   src="{{asset('dashboard')}}/assets/plugins/jquery/jquery.min.js"></script>

<!--- Bootstrap Bundle js --->
<script   src="{{asset('dashboard')}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--- Ionicons js --->
<script   src="{{asset('dashboard')}}/assets/plugins/ionicons/ionicons.js"></script>

<!--- JQuery sparkline js --->
<script   src="{{asset('dashboard')}}/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>


<!--- Moment js --->
<script   src="{{asset('dashboard')}}/assets/plugins/moment/moment.js"></script>

<!--- Eva-icons js --->
<script   src="{{asset('dashboard')}}/assets/js/eva-icons.min.js"></script>

<!--- Rating js --->
<script   src="{{asset('dashboard')}}/assets/plugins/rating/jquery.rating-stars.js"></script>
<script   src="{{asset('dashboard')}}/assets/plugins/rating/jquery.barrating.js"></script>

<!--- Custom js --->
<script   src="{{asset('dashboard')}}/assets/js/custom.js"></script>

</body>
</html>
