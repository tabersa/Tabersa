@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Tabungan')
@section('toolbartitle', 'Tabungan')

@section('content')



    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Header-->
                <div class="card-header divider">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Tabungan</span>
                        <span class="text-gray-400 fw-semibold fs-6">Periksa Tabungan Anda Disini</span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 table-tabungan">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-1px pe-2">
                                </th>
                                <th class="min-w-125px ">No. Rekening / Virtual Account</th>
                                <th class="min-w-125px">Produk</th>
                                <th class="min-w-125px">Nasabah</th>
                                <th class="min-w-125px">Tanggal Register</th>
                                <th class="min-w-125px text-center">Status</th>
                                <th class="min-w-0px"></th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="">
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::Checkbox-->
                                <td></td>
                                <!--end::Checkbox-->
                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="symbol symbol-50px me-3">
                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}" class=""
                                            alt="" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a class="fw-bold text-dark text-hover-primary d-block fs-5"
                                            href="{{ url('/infotabungan') }}">
                                            1289321085095
                                        </a>
                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class=" fw-semibold d-block fs-7">
                                            Tabersa
                                        </span>
                                        <span class=" fw-semibold d-block fs-7">
                                            Tabungan BPR
                                        </span>
                                    </div>
                                </td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="fw-bold mb-1 fs-6">
                                            Donny Sidarta
                                        </span>
                                        <span class="fw-semibold d-block fs-8">
                                            1213213123123124124
                                        </span>
                                    </div>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td> <span class="fw-bold mb-1 fs-6">
                                        16 Jan 2022
                                    </span></td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td class="text-center"> <a href="#" class="btn btn-sm btn-active-color-primary"
                                        style="background-color: #ECFAFF;">
                                        <span class="fw-bold text-hover-dark" style="color: #27BFEF">
                                            Active
                                        </span>
                                    </a>
                                </td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td></td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::Checkbox-->
                                <td></td>
                                <!--end::Checkbox-->
                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-3">
                                            <img src="{{ asset('assets/media/stock/600x600/img-42.jpg') }}" class=""
                                                alt="" />
                                        </div>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a class="fw-bold d-block fs-5 text-dark text-hover-primary"
                                                href="{{ url('/infotabungan') }}">
                                                85771313
                                            </a>
                                        </div>
                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class=" fw-semibold d-block fs-7">
                                            BCA
                                        </span>
                                        <span class=" fw-semibold d-block fs-7">
                                            Tabungan VA
                                        </span>
                                    </div>
                                </td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <span class="fw-bold mb-1 fs-6">
                                            Anna Josepin
                                        </span>
                                        <span class="fw-semibold d-block fs-8">
                                            131313141414
                                        </span>
                                    </div>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>
                                    <span class="fw-bold mb-1 fs-6">
                                        19 Jan 2022
                                    </span>
                                </td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-active-color-primary"
                                        style="background-color: #DCF9DD">
                                        <span class="fw-bold text-hover-dark" style="color: #54CC58">
                                            Verified
                                        </span>
                                    </a>
                                </td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td></td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('.table-tabungan').DataTable({
                "dom": "< <'pull-left'f><t><' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>> >"
            });
        });
    </script>

    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/js/custom/apps/user-management/users/list/export-users.js"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

@endsection
