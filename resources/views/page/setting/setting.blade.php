@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Setting')
@section('toolbartitle', 'Setting')
@section('content')

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">

                <!--begin::Header-->
                <div class="card-header">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Setting</span>
                        <span class="text-gray-400 fw-semibold fs-6">Atur semua kebutuhan Akun Anda di sini</span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <!--begin::Card body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col col-lg-2">
                            <!--begin:::Tabs-->
                            <ul class="nav nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">
                                <!--begin:::Tab item-->
                                <li class="nav-item mt-10" style="padding-left: 12px">
                                    <a class="nav-link text-active-primary pb-8 mb-4 active" data-bs-toggle="tab"
                                        href="#kt_ecommerce_settings_general">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
                                        <span class="svg-icon svg-icon-2 me-2">
                                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path fill="currentColor"
                                                    d="M224 256c-70.7 0-128-57.3-128-128S153.3 0 224 0s128 57.3 128 128s-57.3 128-128 128zm-45.7 48h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5c0-26.5-21.5-48-48.1-48s-48.1 21.5-48.1 48s21.5 48 48.1 48s48.1-21.5 48.1-48z" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->General
                                    </a>
                                </li>
                                <!--end:::Tab item-->
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-8 mb-4" data-bs-toggle="tab"
                                        href="#kt_ecommerce_settings_password">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm004.svg-->
                                        <span class="svg-icon svg-icon-2 me-2">
                                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512">
                                                <path fill="currentColor"
                                                    d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zm40-176c-22.1 0-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40s-17.9 40-40 40z" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <span class="fs-5"> Ganti Password</span>
                                    </a>
                                </li>
                                <!--end:::Tab item-->
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-8 mb-4" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm004.svg-->
                                        <span class="svg-icon svg-icon-2 me-2">
                                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512">
                                                <path fill="currentColor"
                                                    d="M160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96C43 32 0 75 0 128V384c0 53 43 96 96 96h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H96c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32h64zM504.5 273.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H192c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32H320v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Keluar
                                    </a>
                                </li>
                                <!--end:::Tab item-->

                            </ul>
                            <!--end:::Tabs-->
                        </div>
                        <div class="col">
                            <!--begin:::Tab content-->
                            <div class="tab-content" id="myTabContent">
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade show active" id="kt_ecommerce_settings_general" role="tabpanel">
                                    <!--begin::Form-->
                                    <form id="kt_ecommerce_settings_general_form" class="form" action="#">
                                        <!--begin::Heading-->
                                        <div class="row mb-7">
                                            <div class="col-md-9 offset-md-3">
                                                <h2>Atur Akun</h2>
                                                <span class="text-muted fs-6">Atur Akun Anda Disini</span>
                                            </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Nama Akun</span>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="meta_title" value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Email Akun</span>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid"
                                                    name="meta_title" value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Action buttons-->
                                        <div class="row py-5">
                                            <div class="col-md-9 offset-md-3">
                                                <div class="d-flex">

                                                    <!--begin::Button-->
                                                    <button type="submit" data-kt-ecommerce-settings-type="submit"
                                                        class="btn btn-success">
                                                        <span class="indicator-label">Edit Akun</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Action buttons-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end:::Tab pane-->
                                <!--begin:::Tab pane-->
                                <div class="tab-pane fade" id="kt_ecommerce_settings_password" role="tabpanel">
                                    <!--begin::Form-->
                                    <form id="kt_ecommerce_settings_general_store" class="form" action="#">
                                        <!--begin::Heading-->
                                        <div class="row mb-7">
                                            <div class="col-md-9 offset-md-3">
                                                <h2>Ganti Password</h2>
                                                <span class="text-muted fs-6">Ganti Password Anda Disini</span>
                                            </div>
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Password Lama</span>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    name="meta_title" value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Email Akun</span>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid"
                                                    name="meta_title" value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Password Baru</span>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid"
                                                    name="meta_title" value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row fv-row mb-7">
                                            <div class="col-md-3 text-md-end">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Konfirmasi Password Baru</span>
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="col-md-9">
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid"
                                                    name="meta_title" value="" />
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Action buttons-->
                                        <div class="row py-5">
                                            <div class="col-md-9 offset-md-3">
                                                <div class="d-flex">
                                                    <!--begin::Button-->
                                                    <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                                        class="btn btn-light me-3">Batal</button>
                                                    <!--end::Button-->
                                                    <!--begin::Button-->
                                                    <button type="submit" data-kt-ecommerce-settings-type="submit"
                                                        class="btn btn-success">
                                                        <span class="indicator-label">Konfirmasi</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                    <!--end::Button-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Action buttons-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end:::Tab pane-->

                            </div>
                            <!--end:::Tab content-->
                        </div>
                    </div>



                </div>
                <!--end::Card body-->
                <!--end::Card header-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center d-block"">
                    <div class="modal-title " id="exampleModalLabel">
                        <div class="h2 fw-bolder py-8">
                            Anda Yakin Keluar Dari Tabersa
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex flex-column">
                    <button type="button" class="w-100 btn btn-success ">
                    <a href="{{ url('/') }}" class="text-light fw-bold">
                        Konfirmasi
                    </a>
                    </button><br>
                    <button type="button" class="px-8 btn btn-primary-outline fw-bold" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--begin::Vendor Stylesheets(used by this page)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used by this page)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="assets/js/custom/apps/ecommerce/catalog/save-product.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
@endsection
