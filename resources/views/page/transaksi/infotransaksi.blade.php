@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Mutasi Transaksi')
@section('toolbartitle')
    <span>
        <a href="{{ url('/transaksi') }}" style="color: #54CC58">Transaksi</a>
        &emsp;/&emsp;Mutasi
    </span>
@endsection

@section('content')
    <style>
        td {
            height: 50px;
            vertical-align: middle;
        }
    </style>
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
                            <h3 class="card-title align-items-start flex-column text-uppercase">
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Tabungan</span>
                                <span class="text-gray-400 fw-semibold fs-6">Periksa Tabungan Anda Disini</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Card body-->
                            <div class="card-body py-4">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
                                                            <span class="symbol-label bg-light">
                                                                <img class="h-100 "
                                                                    src="{{ Avatar::create($datacif->fullName)->setTheme('tabersa')->setShape('square')->toBase64() }}" />

                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="{{ url('infocif') }}"
                                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $datacif->fullName }}</a>
                                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                            {{ $datacif->cifNumber }}</span>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">
                                                            Nomor Tagihan
                                                        </span>
                                                        <span
                                                            class="text-dark fw-semibold d-block fs-7">{{ $datainfo->invoiceNumber }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span
                                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">Tipe</span>
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
                                                </td>
                                                <td>
                                                    <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">Tgl
                                                        Transaksi</span>
                                                    <span
                                                        class="text-dark fw-semibold d-block fs-7">{{ date('d F Y', strtotime(substr($datainfo->transactionDate, 0, 10))) }}</span>
                                                </td>
                                                @if ($datainfo->status === 2)
                                                    <td class="text-end">
                                                        <span class="badge badge-danger text-light">Transaksi Ditolak</span>
                                                    </td>
                                                @else
                                                    <td class="text-end">
                                                        <a href="#" class="btn btn-success er fs-6 px-8 py-4"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_view_users">Bukti
                                                            Transfer</a>
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>



                                {{-- <div class="d-flex justify-content-between shadow-sm">
                                    <div class="p-6">
                                        <div class="row">
                                            <!--begin:: Avatar -->
                                            <div class="col-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-5">
                                                        <span class="symbol-label bg-light">
                                                            <img class="h-100 "
                                                                src="{{ Avatar::create($datacif->fullName)->setTheme('tabersa')->setShape('square')->toBase64() }}" />

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
                                            <span
                                                class="text-dark fw-semibold d-block fs-7">{{ $datainfo->invoiceNumber }}</span>
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
                                        <a href="#" class="btn btn-success er fs-6 px-8 py-4" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_view_users">Bukti Transfer</a>
                                    </div>

                                </div> --}}


                                <!--begin::Table-->
                                <div class="table-responsive">

                                    <table class="table align-middle table-row-dashed gy-5">
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

                                </div>

                                <div class="divider">
                                    <hr>
                                </div>
                                <div id="kt_scrolltop" class="scrolltop mb-10" data-kt-scrolltop="true">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                    <span class="svg-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                                rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                            <path
                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end: Card Body-->
                            <div class="card-footer border-top p-9 mb-15">

                                @if ($datainfo->status != 1 && $datainfo->status != 2 && $datainfo->status != 3 && $datainfo->status != 4)
                                    <form method="POST" action="/infotransaksi/autorisasi/{{ $datainfo->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-2">
                                                <input type="button" class="btn btn-secondary w-100 ls-3 text-uppercase"
                                                    value="Kembali" onclick="history.back();">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#" class="btn btn-danger w-100 ls-3 text-uppercase"
                                                    data-bs-toggle="modal" data-bs-target="#rejectmodal">Tolak</a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#" class="btn btn-success w-100 ls-3 text-uppercase"
                                                    data-bs-toggle="modal" data-bs-target="#verifmodal">Verifikasi</a>
                                            </div>
                                        </div>
                            </div>
                            <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header pb-0 border-0 justify-content-end">
                                            <!--begin::Close-->
                                            <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                            width="16" height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                                                <div class="text-muted fw-semibold fs-5">Bukti Transfer Untuk Transaksi
                                                </div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Users-->
                                            <div class="mb-10">
                                                <!--begin::List-->
                                                @if ($datainfo->imageUrl != null)
                                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                                        <img class="d-block mx-auto " src="{{ $datainfo->imageUrl }}"
                                                            height="500" width="auto">
                                                    </div>
                                                @else
                                                    <div class="mh-375px scroll-y me-n7 pe-7">

                                                        <div class="fs-4">Tidak Ada Bukti Transfer</div>
                                                    </div>
                                                @endif

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
                            <!-- Modal -->
                            <div class="modal fade" id="verifmodal" tabindex="-1" aria-hidden="true" role="dialog">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header pb-0 border-0 ">
                                            <!--begin::Close-->
                                            <h1 class="mb-3 text-start">Konfirmasi Transaksi</h1>
                                            <div class="btn btn-sm btn-icon btn-active-color-primary right-0"
                                                data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                            width="16" height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--begin::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body fs-4">
                                            Terima Transaksi Dengan Tiket {{ $datainfo->invoiceNumber }} ?
                                        </div>
                                        <!--end::Modal body-->
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-danger text-light w-40 ls-3 text-uppercase"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <input type="submit" name="verif" value="terima"
                                                class="btn btn-success text-light w-40 ls-3 text-uppercase">
                                        </div>
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <div class="modal fade" id="rejectmodal" tabindex="-1" aria-hidden="true" role="dialog">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header pb-0 border-0 ">
                                            <!--begin::Close-->
                                            <h1 class="mb-3 text-start">Konfirmasi</h1>
                                            <div class="btn btn-sm btn-icon btn-active-color-primary right-0"
                                                data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                            width="16" height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--begin::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body fs-4">
                                            Tolak Transaksi Dengan Tiket {{ $datainfo->invoiceNumber }} ?
                                        </div>
                                        <!--end::Modal body-->
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-danger text-light w-40 ls-3 text-uppercase"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <input type="submit" name="verif" value="tolak"
                                                class="btn btn-success text-light w-40 ls-3 text-uppercase">
                                        </div>
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            </form>
                        @elseif ($datainfo->status == 2 && $datainfo->auth == 2)
                            <div class="row">
                                <div class="col-md-6">
                                    &nbsp;
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-2">
                                    <input type="button" class="btn btn-secondary w-100 ls-3 text-uppercase"
                                        value="Kembali" onclick="history.back();">
                                </div>
                                {{-- <div class="col-md-2">
                                    <a href="/cetakmutasi/{{ $datainfo->id }}" target="_blank"
                                        class="btn btn-success w-100 ls-3 text-uppercase">Cetak Mutasi</a>
                                </div> --}}
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-6">
                                    &nbsp;
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-2">
                                    <input type="button" class="btn btn-secondary w-100 ls-3 text-uppercase"
                                        value="Kembali" onclick="history.back();">
                                </div>
                                <div class="col-md-2">
                                    <a href="/cetakmutasi/{{ $datainfo->id }}" target="_blank"
                                        class="btn btn-success w-100 ls-3 text-uppercase">Cetak Mutasi</a>
                                </div>
                            </div>
                        </div>

                        @endif
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
        $(document).ready(function() {
            $('.table-mutasi').DataTable({
                "dom": "<t> ",
                // < row'<'col pull-left'f>><' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>>
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
