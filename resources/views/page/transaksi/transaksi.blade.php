@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Transaksi')
@section('toolbartitle', 'Transaksi')
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
                        <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Transaksi</span>
                        <span class="text-gray-400 fw-semibold fs-6">Periksa Histori Transaksi Anda Disini</span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-hover table-row-dashed fs-6 gy-5 table-transaksi">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-120px ">NASABAH</th>
                                <th class="min-w-140px">TANGGAL TRANSAKSI</th>
                                <th class="min-w-125px">TIPE</th>
                                <th class="min-w-130px">KETERANGAN</th>
                                <th class="min-w-100px">NOMINAL</th>
                                <th class="text-center min-w-100px">STATUS</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @forelse($transaksi->data as $datatransaksi)
                                <tr class="table-row" data-href="infotransaksi/{{ $datatransaksi->id }}/show">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-3">
                                                <img class="h-100 " src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
                                                
                                            </div>
                                            <span class="fw-bold fs-6">
                                                {{ $datacif->fullName }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-start">
                                        <span
                                            class=" fs-6">{{ date('d F Y', strtotime(substr($datatransaksi->transactionDate, 0, 10))) }}</span>
                                    </td>
                                    <td class="text-start">
                                        <span class=" fs-6">{{ $datatransaksi->invoiceNumber }}</span>
                                    </td>
                                    <td class="text-start">
                                        <span class=" fs-6">{{ $datatransaksi->description }}</span>
                                    </td>
                                    <td class="text-start">
                                        {{-- <div id="kt_table_widget_14_chart_1" class="h-50px mt-n8 pe-7" data-kt-chart-color="success"></div> --}}
                                        <span
                                            class=" fs-6">Rp.{{ number_format($datatransaksi->totalAmount, 2, ',', '.') }}</span>
                                    </td>
                                    <td class="text-start">

                                        @if ($datatransaksi->status === 0)
                                            <a href="#" class="btn btn-sm btn-block btn-active-color-light"
                                                style="background-color: #D1D8D3">
                                                <span class="text-hover-info fw-bold" style="color: #808A82">
                                                    Pending
                                                </span>
                                            </a>
                                        @elseif ($datatransaksi->status === 1)
                                            <a href="#" class="btn btn-sm btn-block btn-active-color-light"
                                                style="background-color: #ECFAFF">
                                                <span class="text-hover-info fw-bold" style="color: ##27BFEF">
                                                    Approved
                                                </span>
                                            </a>
                                        @elseif ($datatransaksi->status === 2)
                                            <a href="#" class="btn btn-sm btn-block btn-active-color-light"
                                                style="background-color: #FFEBEB">
                                                <span class="text-hover-info fw-bold" style="color: #DC3F3F">
                                                    Rejected
                                                </span>
                                            </a>
                                        @elseif ($datatransaksi->status === 3)
                                            <a href="#" class="btn btn-sm btn-block btn-active-color-light"
                                                style="background-color: #eeff8f">
                                                <span class="text-hover-info fw-bold" style="color: white">
                                                    Canceled
                                                </span>
                                            </a>
                                        @elseif ($datatransaksi->status === 4)
                                            <a href="#" class="btn btn-sm btn-block btn-active-color-light"
                                                style="background-color: #eeff8f">
                                                <span class="text-hover-info fw-bold" style="color: white">
                                                    Canceled
                                                </span>
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-sm btn-block btn-active-color-light"
                                                style="background-color: #FFEBEB">
                                                <span class="text-hover-info fw-bold" style="color: #DC3F3F">
                                                    Failed
                                                </span>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
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
            $('.table-transaksi').DataTable({
                "dom": "< <'pull-left'f><t><' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>> >"
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
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
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
    {{-- <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('.table-paginate').dataTable();
        });
    </script> --}}
@endsection
