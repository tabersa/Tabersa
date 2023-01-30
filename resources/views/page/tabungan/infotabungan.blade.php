@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Mutasi')
@section('toolbartitle')
    <span>
        <a href="{{ url('/tabungan') }}" style="color: #54CC58">Tabungan</a>
        &emsp;/&emsp;Mutasi
    </span>
@endsection

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
                            <h3 class="card-title align-items-start flex-column text-uppercase">
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Informasi Tabungan</span>
                                <span class="text-gray-400 fw-semibold fs-6">Informasi Data dari
                                    {{ $datacif->fullName }}</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        @if ($datainfo->auth == 2 && $datainfo->status == 2)
                            <div class="card-body py-3">
                                <div class="d-flex justify-content-between shadow-sm">
                                    <div class="p-6">
                                        <div class="row">
                                            <!--begin:: Avatar -->
                                            <div class="col-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-5">
                                                        <span class="symbol-label bg-light">
                                                            <img src="assets/media/svg/avatars/001-boy.svg"
                                                                class="h-75 align-self-end" alt="" />
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
                                                        class="text-dark fw-bold  mb-1 fs-6">{{ $datacif->fullName }}</a>
                                                    <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                        {{ $datacif->cifNumber }}</span>
                                                </div>
                                            </div>
                                            <!--begin::User details-->
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bold mb-1 fs-6">{{ $dataproduct->productName }}</span>
                                            @foreach ($dataakun->data as $akun)
                                                @if ($datainfo->savingAccountType == $akun->value)
                                                    <span
                                                        class="text-dark fw-semibold d-block fs-7">{{ $akun->label }}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <span class="fw-bold text-danger mb-1 fs-4">Tabungan Direject</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!--begin::Card body-->
                            <div class="card-body py-3">
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
                                                    <span
                                                        class="text-dark fw-bold  mb-1 fs-6">{{ $datacif->fullName }}</span>
                                                    <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                        {{ $datacif->cifNumber }}</span>
                                                </div>
                                            </div>
                                            <!--begin::User details-->
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bold mb-1 fs-6">{{ $datainfo->accountNumber }}</span>
                                            <span class="text-dark fw-bold d-block fs-7">VA
                                                {{ $datainfo->virtualAccountNumber }}</span>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span
                                                class="text-dark fw-bold mb-1 fs-6">{{ $dataproduct->productName }}</span>
                                            @foreach ($dataakun->data as $akun)
                                                @if ($datainfo->savingAccountType == $akun->value)
                                                    <span
                                                        class="text-dark fw-semibold d-block fs-7">{{ $akun->label }}</span>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bold mb-1 fs-6">Saldo
                                                Akhir</span>
                                            <span class="text-dark fw-semibold d-block fs-7">Rp.
                                                {{ number_format($datainfo->endBalance, 0, ',', ',') }}</span>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <input type="date" class="form-control" id="inputDateEvent" name='dateevent'
                                            placeholder="Enter the event start date..." required>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="btn btn-success fs-6 px-8 " data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_view_users">Cari</a>
                                        </div>
                                    </div>

                                </div>
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-row-dashed table-row-gray-200 align-middle  gs-3 gy-5 table-mutasi">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                            <!--begin::Table row-->
                                            <tr class="fw-bolder text-bold text-uppercase">
                                                <th class="min-w-150px text-start ">Tgl Transaksi</th>
                                                <th class="min-w-150px text-start ">Kode Transaksi</th>
                                                <th class="min-w-400px text-start ">Keterangan</th>
                                                <th class="min-w-100px text-end">Nominal</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-semibold">
                                            <!--begin::Table row-->
                                            @forelse ($trs as $data)
                                                <tr>
                                                    <!--begin::order=-->
                                                    <td class="text-start">
                                                        12 Nov 2022
                                                    </td>
                                                    <!--end::order=-->
                                                    <!--begin::Status=-->
                                                    <td class="text-start">
                                                        {{ $data->billerCode }}
                                                    </td>
                                                    <!--end::Status=-->
                                                    <!--begin::Amount=-->
                                                    <td class="text-start">
                                                        {{ $data->description }}

                                                    </td>
                                                    <!--end::Amount=-->
                                                    <!--begin::Amount=-->
                                                    @if ($data->dc == 'D')
                                                        <td class="text-end text-danger"> - Rp
                                                            {{ number_format($data->amount, 0, ',', ',') }}</td>
                                                    @else
                                                        <td class=" text-end text-success">+ Rp
                                                            {{ number_format($data->amount, 0, ',', ',') }}</td>
                                                    @endif

                                                    <!--end::Amount=-->
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        <span>Tidak Ada Transaksi</span>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <div class="divider bg-active-dark">
                                        <hr>
                                    </div>
                                    {{-- <div class="row">
                        <div class="col fs-4 fw-bold text-start text-uppercase">
                            Saldo Akhir
                        </div>
                        <div class="col-lg-4 fs-4 fw-bold text-end">
                            Rp {{ number_format($datainfo->endBalance, 0, ',', ',') }}
                        </div>
                    </div> --}}
                                </div>
                                {{-- <div class="divider bg-active-dark"><hr></div> --}}
                                <!--end::Table-->
                                <div id="kt_scrolltop" class="scrolltop mb-10" data-kt-scrolltop="true">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                    <span class="svg-icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="13" y="6" width="13"
                                                height="2" rx="1" transform="rotate(90 13 6)"
                                                fill="currentColor" />
                                            <path
                                                d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2>Cari Histori Transaksi</h2>
                                                <!--end::Modal title-->
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
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_new_card_form" class="form" method="POST"
                                                    action="{{ route('search') }}" >
                                                    <input hidden name="accountNumber" type="text"
                                                        value="{{ $datainfo->accountNumber }}">
                                                    <!--begin::Label-->
                                                    @csrf <!-- {{ csrf_field() }} -->
                                                    {{-- <label class="required fs-6 fw-semibold form-label mb-2">
                                                        Waktu Filter
                                                    </label> --}}
                                                    <!--end::Label-->
                                                    <!--begin::Row-->
                                                    <div class="row fv-row">
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <select name="bulan" class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true"
                                                                data-placeholder="Bulan" required>
                                                                <option></option>
                                                                <option value=01>Januari</option>
                                                                <option value=02>Februari</option>
                                                                <option value=03>Maret</option>
                                                                <option value=04>April</option>
                                                                <option value=05>Mei</option>
                                                                <option value=06>Juni</option>
                                                                <option value=07>Juli</option>
                                                                <option value=08>Agustus</option>
                                                                <option value=09>September</option>
                                                                <option value=10>Oktober</option>
                                                                <option value=11>November</option>
                                                                <option value=12>Desember</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <select name="tahun" class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true"
                                                                data-placeholder="Tahun" required>
                                                                <option></option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                                <option value="2031">2031</option>
                                                                <option value="2032">2032</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->

                                                    <!--end::Col-->

                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" id="kt_modal_new_card_cancel"
                                                            class="btn btn-light me-3">Batal</button>
                                                        <button type="submit" id="kt_modal_new_card_submit"
                                                            class="btn btn-primary">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        @endif
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
    <!--end::Content wrapper-->

@endsection


@section('script')

    <script>
        $(document).ready(function() {
            $('.table-mutasi').DataTable({
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
