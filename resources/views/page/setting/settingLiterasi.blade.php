@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Literasi & Edukasi')
@section('toolbartitle')
    <span>
        <a href="{{ url('/setting') }}" style="color: #54CC58">Setting</a>
        &emsp;/&emsp;Literasi & Edukasi
    </span>
@endsection
@section('content')

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Card-->
        <div class="card">

            <!--begin::Header-->
            <div class="card-header">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Literasi & Edukasi</span>
                    {{-- <span class="text-gray-400 fw-semibold fs-6">Atur semua kebutuhan Akun Anda di sini</span> --}}
                </h3>
                <!--end::Title-->
            </div>
            <!--end::Header-->
            <!--begin::Card body-->
            <!--begin::Card body-->
            <div class="card-body py-10" id="loader">
                <div class="row">
                    <div class="col-md-2">
                        <a href="#" class="btn btn-sm btn-primary w-100">Tambah</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-row-dashed table-row-gray-200 align-middle gs-3 gy-5">
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-150px">JUDUL</th>
                                <th class="min-w-500px">ISI</th>
                                <th class="min-w-100px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        Berita Empat
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                    Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat Berita Empat.
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        BPR Satu
                                    </span>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        <i>20 Aug 2022<i>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        Berita Tiga
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                    Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga Berita Tiga.
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        BPR Satu
                                    </span>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        <i>20 Aug 2022<i>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        Berita Dua
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                    Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua Berita Dua.
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        BPR Satu
                                    </span>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        <i>20 Aug 2022<i>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        Berita Satu
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                    Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu Berita Satu.
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        BPR Satu
                                    </span>
                                    <span class="text-muted fw-bold d-block fs-6">
                                        <i>20 Aug 2022<i>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

@endsection

@section('script')


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