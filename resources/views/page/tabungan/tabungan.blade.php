@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Tabungan')
@section('toolbartitle', 'Tabungan')

@section('content')

    <!--begin::Content wrapper-->
    <div id="kt_app_content" class="content d-flex flex-column flex-column-fluid">
        <!--begin::Content container-->

        <div id="kt_app_content_container" class="container-fluid">
            {{-- <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold mb-10">
                
            </ol> --}}
        <!--begin::Row-->
        <div class="row gy-0 gx-10">
            <!--begin::Col-->
            <div class="col-xl-12">
                <!--begin::Tables widget 14-->
                <div class="card shadow-lg">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Tabungan</span>
                            <span class="text-gray-400 fw-semibold fs-6">Periksa Tabungan Anda Disini</span>
                        </h3>
                        <!--end::Title-->

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <table class="table table-hover align-middle table-row-dashed fs-6 gy-5 table-tabungan">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px ">No. Rekening / Virtual Account</th>
                                    <th class="min-w-125px">Tanggal Register</th>
                                    <th class="min-w-125px">Produk</th>
                                    <th class="min-w-125px">Nasabah</th>
                                    <th class="min-w-125px text-center">Status</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @forelse ($datainfo as $datasaving)
                                    <!--begin::Table row-->
                                    <tr class="table-row" data-href="infotabungan/show/{{ $datasaving->id }}">

                                        <!--begin::User=-->
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-50px me-3">
                                                <img class="h-100 "
                                                    src="{{ Avatar::create($datasaving->cif->fullName)->setTheme('tabersa')->setShape('square')->toBase64() }}" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex justify-content-start flex-column">

                                                @if ($datasaving->virtualAccountNumber == null && $datasaving->accountNumber == null)
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="text-danger text-start d-block fs-7">Account is
                                                            Pending</span>
                                                    </div>
                                                @elseif ($datasaving->virtualAccountNumber == null)
                                                    <span
                                                        class="text-dark text-start fw-bold mb-1 fs-7">{{ $datasaving->accountNumber }}</span>
                                                    <span class="text-dark text-start d-block fs-7">Virtual Account
                                                        Number Is Null</span>
                                                @else
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span
                                                            class="text-dark text-start fw-bold mb-1 fs-7">{{ $datasaving->accountNumber }}</span>
                                                        <span class="text-dark text-start fw-bold d-block fs-7">VA
                                                            {{ $datasaving->virtualAccountNumber }}</span>
                                                    </div>
                                                @endif

                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <!--end::User=-->
                                        <td class="text-start"> <span class="mb-1 fs-6">
                                                {{ date('d F Y', strtotime(substr($datasaving->openDate, 0, 10))) }}
                                            </span>
                                        </td>
                                        <!--begin::tgl regist=-->
                                        <td class="text-start">
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class=" fw-semibold d-block fs-7">
                                                    {{ $datasaving->savingProduct->productName }}
                                                </span>
                                                <span class=" fw-semibold d-block fs-7">
                                                    @foreach ($savingType->data as $list)
                                                        @if ($datasaving->savingAccountType == $list->value)
                                                            {{ $list->label }}
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>
                                        </td>
                                        <!--end::tgl regist=-->
                                        <!--begin::identitas=-->
                                        <td class="text-start">
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
                                        <!--begin::email-->
                                        <td class="text-center">
                                            @if ($datasaving->status === 1)
                                                <a href="#" class="badge badge-success  ">
                                                    <span class="fw-bold bg-success ">
                                                        Active
                                                    </span>
                                                </a>
                                            @elseif ($datasaving->status === 2)
                                                <a href="#" class="badge badge-danger  ">
                                                    <span class="fw-bold  ">
                                                        Reject
                                                    </span>
                                                </a>
                                            @else
                                                <a href="#" class="badge  badge-warning">
                                                    <span class="fw-bold text-hover-dark">
                                                        Pending
                                                    </span>
                                                </a>
                                            @endif

                                        </td>
                                    </tr>
                                    <!--end::Table row-->
                                @empty
                                    <span>Data Kosong</span>
                                @endforelse

                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end: Card Body-->
                    <div class="card-footer border-top p-9 mb-15">
                        
                    </div>
                </div>

            </div>
            <!--end::Tables widget 14-->
        </div>
        <!--end::Col-->

    </div>

    <!--end::Row-->

</div>
<!--end::Content wrapper-->

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
