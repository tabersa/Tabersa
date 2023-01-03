<?php 
    if (Session::has('token')) { ?>
<!DOCTYPE html>

<html lang="en">
@include('dashboard.layout.headhtml')
@include('sweetalert::alert')


<body>

    <div id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
        data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
        data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
        data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
        <!--begin::Theme mode setup on page load-->
        <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
            <!--begin::Page-->
            <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                <!--begin::Header-->
                @include('dashboard.layout.header')
                <!--end::Header-->
                <!--begin::Wrapper-->
                <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper" style="margin-top: 8">

                    @include('dashboard.layout.toolbar')

                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

                        @include('dashboard.layout.sidebar')

                        @yield('content')

                        @include('dashboard.layout.footer')

                    </div>
                    <!--begin::Main-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
    </div>

    @yield('script')

    @include('dashboard.layout.script')
</body>
<!--end::Body-->

</html>
<?php } else {
        Alert::error('Error', 'Username atau Kata Sandi Anda Salah');
        return redirect()->route('/');
    }
?>
