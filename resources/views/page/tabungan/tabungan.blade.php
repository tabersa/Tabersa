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
                    <table class="table table-hover align-middle table-row-dashed fs-6 gy-5 table-tabungan">
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
                        <tbody>
                            @forelse ($datainfo as $datasaving)
                                <!--begin::Table row-->
                                <tr class="table-row" data-href="infotabungan/show/{{ $datasaving->id }}">
                                    <!--begin::Checkbox-->
                                    <td></td>
                                    <!--end::Checkbox-->
                                    <!--begin::User=-->
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-50px me-3">
                                            <img class="h-100 " src="{{ Avatar::create($datasaving->cifNumber)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex justify-content-start flex-column">
                                            <a class="fw-bold text-dark text-hover-primary d-block fs-5"
                                                href="infotabungan/{{ $datasaving->id }}/show">
                                                {{ $datasaving->cifNumber }}
                                            </a>
                                        </div>
                                        <!--begin::User details-->
                                    </td>
                                    <!--end::User=-->
                                    <!--begin::tgl regist=-->
                                    <td>
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class=" fw-semibold d-block fs-7">
                                                {{ $datasaving->savingProduct->productName }}
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
                                                {{ $datasaving->cif->fullName }}
                                            </span>
                                            <span class="fw-semibold d-block fs-8">
                                                {{ $datasaving->cif->cifNumber }}
                                            </span>
                                        </div>
                                    </td>
                                    <!--end::identitas=-->
                                    <!--begin::no.seluler=-->
                                    <td> <span class="mb-1 fs-6">
                                            {{ date('d F Y', strtotime(substr($datasaving->openDate, 0, 10))) }}
                                        </span></td>
                                    <!--end::no.seluler=-->
                                    <!--begin::email-->
                                    <td class="text-center">
                                        @if ($datasaving->status === 1)
                                            <a href="#" class="btn btn-success btn-sm "
                                                >
                                                <span class="fw-bold bg-success ">
                                                    Active
                                                </span>
                                            </a>
                                        @elseif ($datasaving->status === 2)
                                        <a href="#" class="btn btn-danger btn-sm "
                                            >
                                            <span class="fw-bold  ">
                                                Reject
                                            </span>
                                        </a>
                                        @else
                                            <a href="#" class="btn btn-sm btn-warning">
                                                <span class="fw-bold text-hover-dark">
                                                    Pending
                                                </span>
                                            </a>
                                        @endif

                                    </td>
                                    <!--begin::email-->
                                    <!--begin::Action=-->
                                    <td></td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                            @empty
                                <span>Data Kosong</span>
                            @endforelse

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
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

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
