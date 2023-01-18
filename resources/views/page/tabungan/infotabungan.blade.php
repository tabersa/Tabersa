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
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Autorisasi Data Tabungan</span>
                            <span class="text-gray-400 fw-semibold fs-6">Autorisasi Data dari {{ $datacif->fullName }}</span>
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
                                                    <img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end"
                                                        alt="" />
                                                        <img class="h-100 " src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
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
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $dataproduct->productName }}</a>
                                    @foreach ($dataakun->data as $akun)
                                        @if ($datainfo->savingAccountType == $akun->value)
                                        <span class="text-dark fw-semibold d-block fs-7">{{ $akun->label }}</span>
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
                                                <img src="assets/media/svg/avatars/001-boy.svg" class="h-75 align-self-end"
                                                    alt="" />
                                                    <img class="h-100 " src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
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
                                <a href="{{ url('infocif') }}"
                                    class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $dataproduct->productName }}</a>
                                @foreach ($dataakun->data as $akun)
                                    @if ($datainfo->savingAccountType == $akun->value)
                                    <span class="text-dark fw-semibold d-block fs-7">{{ $akun->label }}</span>
                                    @endif
                                @endforeach
                                
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Saldo
                                    Akhir</a>
                                <span class="text-dark fw-semibold d-block fs-7">Rp. {{ $datainfo->endBalance }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <input type="date" class="form-control" id="inputDateEvent" name='dateevent'
                                placeholder="Enter the event start date..." required>

                        </div>

                    </div>
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gy-5 table-mutasi">
                        <!--begin::Table head-->
                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                            <!--begin::Table row-->
                            <tr class=" text-uppercase gs-0">
                                <th class="min-w-150px text-start ">Tgl Transaksi</th>
                                <th class="min-w-150px text-start ">Kode Transaksi</th>
                                <th class="min-w-400px text-start ">Keterangan</th>
                                <th class="min-w-100px text-end">Nominal</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fs-6 fw-semibold text-gray-600">
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
                                        <td class="text-end text-danger"> - Rp {{ number_format($data->amount, 0, ',', ',') }}</td>
                                    @else
                                        <td class=" text-end text-success">+ Rp {{ number_format($data->amount, 0, ',', ',') }}</td>
                                    @endif

                                    <!--end::Amount=-->
                                </tr>
                            @empty
                            <tr>
                                <td rowspan="4">
                                    <span>Tidak Ada Transaksi</span>
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
                    @endif
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
