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
                                                <img class="h-100 "
                                                    src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Avatar-->
                                <!--begin::User details-->
                                <div class="col">
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}"
                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $datacif->fullName }}</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                            {{ $datacif->cifNumber }}</span>
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
                                @if ($datainfo->transactionGroup == 10)
                                    <span class="text-dark fw-semibold d-block fs-7">Transfer</span>
                                @elseif ($datainfo->transactionGroup == 20)
                                    <span class="text-dark fw-semibold d-block fs-7">Pay</span>
                                @elseif ($datainfo->transactionGroup == 30)
                                    <span class="text-dark fw-semibold d-block fs-7">Buy</span>
                                @elseif ($datainfo->transactionGroup == 40)
                                    <span class="text-dark fw-semibold d-block fs-7">E-Wallet</span>
                                @endif

                            </div>
                        </div>
                        <div class="p-6">
                            <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">Tgl Transaksi</span>
                            <span
                                class="text-dark fw-semibold d-block fs-7">{{ date('d F Y', strtotime(substr($datainfo->transactionDate, 0, 10))) }}</span>
                        </div>
                        <div class="p-6">
                            <a href="#" class="btn btn-success er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">Bukti Transfer</a>
                        </div>

                    </div>
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gy-5 table-mutasi">
                        <!--begin::Table head-->
                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                            <!--begin::Table row-->
                            <tr class="fw-bold text-uppercase gs-0">
                                <th class="min-w-200px text-start">Account</th>
                                <th class="min-w-300px text-start">Keterangan</th>
                                <th class="min-w-200px text-end">Debit</th>
                                <th class="min-w-200px text-end">Kredit</th>

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
                                    <td class="text-start">
                                        {{ $detail->account }}
                                    </td>
                                    <!--end::order=-->
                                    <!--begin::Status=-->
                                    <td class="text-start">
                                        {{ $detail->description }}
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Amount=-->
                                    @if ($detail->dc == 'C')
                                        <td class="text-end">
                                            Rp {{ number_format($detail->amount, 0, ',', ',') }}
                                        </td>
                                        <!--end::Amount=-->
                                        <!--begin::Amount=-->
                                        <td class="text-end"> - </td>
                                    @else
                                        <td class="text-end">
                                            -
                                        </td>
                                        <!--end::Amount=-->
                                        <!--begin::Amount=-->
                                        <td class="text-end">
                                            Rp {{ number_format($detail->amount, 0, ',', ',') }}
                                        </td>
                                    @endif

                                    <!--end::Amount=-->
                                </tr>
                            @empty
                                <span>Tidak Ada Transaksi</span>
                            @endforelse
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                    @if ($datainfo->status != 1 && $datainfo->status != 2 && $datainfo->status != 3 && $datainfo->status != 4)
                            <form method="POST" action="/infotransaksi/autorisasi/{{ $datainfo->id }}">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <div class="d-flex flex-row-reverse mt-10">
                                    <!-- Submit button -->
                                    <hr>
                                    <input name="verif" type="submit" class="btn btn-success text-light mb-2 p-5 mx-2"
                                        value="Verified">
                                    <input name="reject "type="submit" class="btn btn-danger text-light mb-2 p-5 mx-2"
                                        value="Reject">
                                    <input type="button" class="btn btn-secondary mb-2 p-5 mx-2 " value="Kembali"
                                        onclick="history.back();">
                                </div>
                            </form>
                        @else
                            <div class="d-flex flex-row-reverse mt-10">
                                <!-- Submit button -->
                                <hr>
                                <a href="/cetakmutasi/{{ $datainfo->id }}" target="_blank" class="btn btn-success mb-2 p-5 mx-2 ">Cetak Mutasi</a>
                                <input type="button" onclick="history.back();" class="btn btn-secondary mb-2 p-5 mx-2 "
                                    value="Kembali">
                            </div>
                    @endif
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-4">
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="mb-3">Bukti Transfer</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">Bukti Transfer Untuk Transaksi</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Users-->
                    <div class="mb-10">
                        <!--begin::List-->
                        <div class="mh-375px scroll-y me-n7 pe-7">
                            <img class="d-block mx-auto " src="{{ $datainfo->imageUrl }}" height="500" width="auto">
                        </div>
                        <!--end::List-->
                    </div>
                    <!--end::Users-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function() {
            $('.table-mutasi').DataTable({
                "dom": "< row'<'col pull-left'f>><t> ",
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
