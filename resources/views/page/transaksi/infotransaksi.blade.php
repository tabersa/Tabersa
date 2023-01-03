@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Mutasi')
@section('toolbartitle')
    <span>
        <a href="{{ url('/transaksi') }}" style="color: #54CC58">Transaksi</a>
        &emsp;/&emsp;Mutasi
    </span>
@endsection
@section('content')


    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">

                <!--begin::Card body-->
                <div class="card-body py-4">
                    <div class="d-flex justify-content-between shadow-sm">
                        <div class="p-6">
                            <div class="row">
                                <!--begin:: Avatar -->
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end"
                                                    alt="" />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="col">
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}"
                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>
                                    </div>
                                </div>
                                <!--begin::User details-->
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="d-flex justify-content-start flex-column">
                                <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">Nomor Tiket</span>
                                <span class="text-dark fw-semibold d-block fs-7">{{ $datainfo->invoiceNumber }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="d-flex justify-content-start flex-column">
                                <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">Tipe</span>
                                <span class="text-dark fw-semibold d-block fs-7">Transfer</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">Tgl Transaksi</span>
                            <span class="text-dark fw-semibold d-block fs-7">{{ date('d F Y', strtotime(substr($datainfo->transactionDate, 0, 10))) }}</span>
                        </div>

                    </div>
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gy-5 table-mutasi">
                        <!--begin::Table head-->
                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                            <!--begin::Table row-->
                            <tr class="text-start fw-bold text-uppercase gs-0">
                                <th class="min-w-150px">Account</th>
                                <th class="min-w-400px">Keterangan</th>
                                <th class="min-w-150px">Debit</th>
                                <th class="min-w-100px">Kredit</th>
                                
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fs-6">
                            <!--begin::Table row-->
                            @forelse ($datadetail as $detail)
                            <tr>
                                <!--begin::order=-->
                                <td>
                                    {{ $detail->account }}
                                </td>
                                <!--end::order=-->
                                <!--begin::Status=-->
                                <td>
                                    {{ $detail->description }}
                                </td>
                                <!--end::Status=-->
                                <!--begin::Amount=-->
                                <td>
                                    Rp. {{ $detail->amount }}
                                </td>
                                <!--end::Amount=-->
                                <!--begin::Amount=-->
                                <td>Rp. {{ $datainfo->totalAmount }}</td>
                                <!--end::Amount=-->
                            </tr>    
                            @empty
                                <span>Tidak Ada Transaksi</span>
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
        $(document).ready(function() {
            $('.table-mutasi').DataTable({
                "dom": "< row'<'col pull-left'f><'col pt-4 pull-right'B> ><t><' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>> ",
                'buttons': [{
                    "text":'<span class="text-light fw-bold">Cetak Mutasi</span>',
                    "className": 'btn btn-success btn-lg',
                    'extend': 'print',
                    'filename': 'Report',
                    'title': 'Laporan Transaksi',
                    'messageTop': 'Laporan Ini Dibuat Untuk Pengguna',
                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '14pt')
                            .prepend(
                                '<img src="{{ asset('assets/media/tabersa/logodaun.png') }}" style="position:absolute; display: block;top:300;left:130; opacity:0.3;" />'
                            );

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'arial','10pt');
                    }
                }]
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
