<div id="kt_app_toolbar" class="app-toolbar">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Breadcrumb-->
            <ol class="breadcrumb breadcrumb-dot fs-6 fw-bold my-0 mb-3">
                <li>
                    <a href="{{ url('dashboard') }}" class="fw-bold text-hover-primary" style="color: #54CC58">Home</a>
                </li>
                <li>
                    <span >&emsp;/&emsp;</span>
                </li>
                <li>@yield('toolbartitle')</li>
            </ol>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Toolbar container-->
</div>