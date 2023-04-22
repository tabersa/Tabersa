@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | CIF')


@section('content')

<div id="kt_app_content" class="content d-flex flex-column flex-column-fluid">
    <!--begin::Content container-->
    
        <div id="kt_app_content_container" class="container-fluid">
            <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold mb-10">
                @section('toolbartitle', 'Customer Information Page')
            </ol>
            <!--begin::Row-->
            <div class="row gy-0 gx-10">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Tables widget 14-->
                    <div class="card shadow-lg">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column text-uppercase">
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Customer Information
                                    Page</span>
                                <span class="text-gray-400 fw-semibold fs-6 divider">Periksa Data Customer Anda
                                    Disini</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                {{-- datatable = table-tabungan --}}
                                <table class="table table-hover table-striped table-row-dashed table-row-gray-200 align-middle  gs-3 gy-5 ">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="fw-bolder text-bold text-uppercase">
                                        <th class="min-w-125px text-start">NASABAH</th>
                                        <th class="min-w-125px text-start">TGL REGISTER</th>
                                        <th class="min-w-125px text-start">IDENTITAS</th>
                                        <th class="min-w-125px text-start">NO. SELULER</th>
                                        <th class="min-w-125px text-start">EMAIL</th>
                                        <th class="text-center min-w-100px">STATUS</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                    <!--begin::Table row-->
                                    @forelse ($cif->data as $datacif)
                                        <tr class="table-row" data-href="infocif/cif/{{ $datacif->id }}">
                                            {{-- <td class="d-flex align-items-center">{{1}}</td> --}}
                                            <!--begin::User=-->
                                            <td class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-5">
                                                        <span class="symbol-label bg-light">
                                                            {{-- <img class="h-100 " src="{{ Avatar::create($datacif->fullName)->setBackground('#001122') }}" /> --}}

                                                            <img class="h-100 "
                                                                src="{{ Avatar::create($datacif->fullName)->setTheme('tabersa')->setShape('square')->toBase64() }}" />
                                                        </span>
                                                    </div>

                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::User details-->
                                                @if ($datacif->status === 2)
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span
                                                        class="text-dark text-start fw-bold mb-1 fs-6">{{ $datacif->fullName }}</span>
                                                    <span class="text-danger text-start fw-semibold d-block fs-7">DATA CIF DITOLAK</span>
                                                </div>
                                                @elseif ($datacif->cifNumber == null)
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span
                                                        class="text-dark text-start fw-bold mb-1 fs-6">{{ $datacif->fullName }}</span>
                                                    <span class="text-dark text-start fw-semibold d-block fs-7">CIF is
                                                        Null</span>
                                                </div>
                                                @else
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span
                                                            class="text-dark text-start fw-bold mb-1 fs-6">{{ $datacif->fullName }}</span>
                                                        <span class="text-dark text-start fw-semibold d-block fs-7">CIF
                                                            {{ $datacif->cifNumber }}</span>

                                                    </div>
                                                @endif

                                            </td>
                                            <!--end::User=-->
                                            <!--begin::tgl regist=-->

                                            <td class="text-start">
                                                {{ date('d F Y', strtotime(substr($datacif->createdOn, 0, 10))) }}
                                            </td>
                                            <!--end::tgl regist=-->
                                            <!--begin::identitas=-->
                                            <td class="text-start">
                                                <span class="text-dark fw-bold  d-block mb-1 fs-4">KTP</span>
                                                <span class="d-block fs-7">{{ $datacif->identityNumber }}</span>
                                            </td>
                                            <!--end::identitas=-->
                                            <!--begin::no.seluler=-->
                                            <td class="text-start">{{ $datacif->mobileNumber }}</td>
                                            <!--end::no.seluler=-->
                                            <!--begin::email-->
                                            <td class="text-start">{{ $datacif->emailAddress }}</td>
                                            <!--begin::email-->
                                            <!--begin::Action=-->
                                            <td class="text-center">
                                                @if ($datacif->status === 1)
                                                    <span class="badge badge-success ">Verified</span>
                                                @elseif ($datacif->status === 2)
                                                    <span class="badge badge-danger ">Reject</span>
                                                @else
                                                    <span class="badge badge-secondary ">Unverified</span>
                                                @endif

                                            </td>
                                            <!--end::Action=-->
                                        </tr>
                                        <!--end::Table row-->

                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                Data Kosong
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            </div>
                            <div id="kt_scrolltop" class="scrolltop mb-10" data-kt-scrolltop="true">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                <span class="svg-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end: Card Body-->
                        <div class="card-footer border-top p-9">

                        </div>
                    </div>

                </div>
                <!--end::Tables widget 14-->
            </div>
            <!--end::Col-->

        </div>
    
    <!--end::Row-->

</div>
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
                "dom": "< <'pull-left'f><t> >"
                // <' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>>
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

