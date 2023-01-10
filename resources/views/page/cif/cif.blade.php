@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Customer Information Page')
@section('toolbartitle', 'Customer Information Page')
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
                        <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Customer Information Page</span>
                        <span class="text-gray-400 fw-semibold fs-6 divider">Periksa Data Customer Anda Disini</span>
                    </h3>
                    <!--end::Title-->

                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-hover table-row-dashed fs-6 gy-5 table-cif">
                        <!--begin::Table head-->

                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bold fs-7 text-uppercase gs-0">
                                {{-- <th class="min-fit">No</th> --}}
                                <th class="min-w-125px text-center">NASABAH</th>
                                <th class="min-w-125px text-center">TANGGAL REGISTER</th>
                                <th class="min-w-125px text-center">IDENTITAS</th>
                                <th class="min-w-125px text-center">NO. SELULER</th>
                                <th class="min-w-125px text-center">EMAIL</th>
                                <th class="text-center min-w-100px">STATUS</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold">
                            <!--begin::Table row-->
                            @forelse ($cif->data as $datacif)
                                <tr class="table-row"data-href="infocif/show/{{ $datacif->id }}">
                                    {{-- <td class="d-flex align-items-center">{{1}}</td> --}}
                                    <!--begin::User=-->
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-5">
                                                <span class="symbol-label bg-light">
                                                    <img class="h-100 " src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90)->toBase64() }}" />
                                                </span>
                                            </div>

                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        @if ($datacif->cifNumber == null)
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark text-start fw-bold mb-1 fs-6">{{ $datacif->fullName }}</span>
                                            <span class="text-dark text-start fw-semibold d-block fs-7">CIF is Null</span>
                                        </div>
                                        @else
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark text-start fw-bold mb-1 fs-6">{{ $datacif->fullName }}</span>
                                            <span class="text-dark text-start fw-semibold d-block fs-7">CIF
                                                {{ $datacif->cifNumber }}</span>

                                        </div>
                                        @endif
                                        
                                    </td>
                                    <!--end::User=-->
                                    <!--begin::tgl regist=-->

                                    <td>
                                        {{ date('d F Y', strtotime(substr($datacif->createdOn, 0, 10))) }}
                                    </td>
                                    <!--end::tgl regist=-->
                                    <!--begin::identitas=-->
                                    <td>
                                        <span class="text-dark fw-bold  d-block mb-1 fs-4">KTP</span>
                                        <span class="d-block fs-7">{{ $datacif->identityNumber }}</span>
                                    </td>
                                    <!--end::identitas=-->
                                    <!--begin::no.seluler=-->
                                    <td>{{ $datacif->mobileNumber }}</td>
                                    <!--end::no.seluler=-->
                                    <!--begin::email-->
                                    <td>{{ $datacif->emailAddress }}</td>
                                    <!--begin::email-->
                                    <!--begin::Action=-->
                                    <td class="text-center">
                                        @if ($datacif->status === 1)
                                            <span class="badge badge-success fs-7 fw-bold py-3 px-8">Verified</span>
                                        @elseif ($datacif->status === 2)
                                            <span class="badge badge-danger fs-7 fw-bold py-3 px-8">Reject</span>
                                        @else
                                            <span class="badge badge-secondary fs-7 fw-bold py-3 px-8">Unverified</span>
                                        @endif

                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    @empty
                        <span>Data Kosong</span>
                        @endforelse

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
            $('.table-cif').DataTable({
                "dom": "< <'pull-left'f><t><' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>> >"
            });
        });
    </script>

    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used by this page)-->
    {{-- <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
    <script src="assets/js/custom/apps/user-management/users/list/export-users.js"></script>
    <script src="assets/js/custom/apps/user-management/users/list/add.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
@endsection
