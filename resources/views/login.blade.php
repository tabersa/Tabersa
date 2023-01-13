<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>Tabersa | Login</title>
    <meta charset="utf-8" />
    <!-- Jquery -->
    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <!-- Jquery DataTables -->
    <script type="text/javascript" language="javascript"
        src="http:////cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap dataTables Javascript -->
    <script type="text/javascript" language="javascript"
        src="http://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!--end::Global Stylesheets Bundle-->
    <link rel="icon" href="{{ asset('assets/media/tabersa/logodaun.png') }}">
    
</head>

<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    @include('sweetalert::alert')

    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-color: white;
            }

            [data-theme="dark"] body {
                background-color: black;
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-center flex-column flex-column-fluid flex-lg-row">
            <div class="d-flex flex-center w-lg-8 p-8">
                <!--begin::Card-->
                <div class="card rounded-3 w-md-500px shadow-lg">
                    <!--begin::Card body-->
                    <div class="card-body p-10 px-10">
                        <!--begin::Form-->
                        <form method="POST" action="/masuk" class="form w-100" novalidate="novalidate"
                            id="kt_sign_in_form">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <img src="{{ asset('assets/media/tabersa/logohorizontal.png') }}" alt=""
                                    height="90" width="auto">
                                <!--end::Title-->
                            </div>
                            
                            <div class="fv-row mb-3">
                                <!--begin::Email-->
                                <span class="fw-bold"> Tenant</span>
                                <input id="tenant" type="text"
                                    class=" bg-transparent mt-4 form-control @error('tenant') is-invalid @enderror"
                                    name="tenant" value="601687" required autofocus />
                                <!--end::Email-->
                            </div>
                            <div class="fv-row mb-3">
                                <!--begin::Email-->
                                <span class="fw-bold"> Username</span>
                                <input id="username" type="text"
                                    class=" bg-transparent mt-4 form-control @error('username') is-invalid @enderror"
                                    name="username" value="bpr.demo" required
                                    autofocus />
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-14">
                                <!--begin::Password-->
                                <span class="fw-bold">Password</span>
                                <input id="password" type="password"
                                    class="bg-transparent mt-4 form-control @error('password') is-invalid @enderror"
                                    name="password" value="Taber54!" required autocomplete="current-password" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->

                            <!--begin::Submit button-->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn p-4"
                                    style="background-color: #54CC58
                                ">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label fw-bold text-light">Login</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->

                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

                <!--begin::Footer-->
                <div id="kt_app_footer" class="app-footer fixed-bottom">
                    <!--begin::Footer container-->
                    <div
                        class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-center py-3">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1 text-center">
                            <span class="fw-semibold me-1">Copyright &copy; 2022</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="fw-bold text-dark text-hover-primary">Tabersa. </a>
                            <span class="fw-semibold me-1">All rights reserved.</span>
                        </div>
                        <!--end::Copyright-->
                    </div>
                    <!--end::Footer container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
