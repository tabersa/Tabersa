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
                                <a href="{{ url('infocif') }}"
                                    class="text-dark fw-bold text-hover-primary mb-1 fs-6">BCA</a>
                                <span class="text-dark fw-semibold d-block fs-7">Tabungan VA</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Saldo
                                    Akhir</a>
                                <span class="text-dark fw-semibold d-block fs-7">Rp. 5.000.000</span>
                            </div>
                        </div>
                        <div class="p-6">
							<input type="date" class="form-control" id="inputDateEvent" name='dateevent' placeholder="Enter the event start date..." required>
                            
                        </div>

                    </div>
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed gy-5 table-mutasi">
                        <!--begin::Table head-->
                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                            <!--begin::Table row-->
                            <tr class="text-start  text-uppercase gs-0">
                                <th class="min-w-150px">Tgl Transaksi</th>
                                <th class="min-w-150px">Kode Transaksi</th>
                                <th class="min-w-400px">Keterangan</th>
                                <th class="min-w-100px">Nominal</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fs-6 fw-semibold text-gray-600">
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::order=-->
                                <td>
                                    12 Nov 2022
                                </td>
                                <!--end::order=-->
                                <!--begin::Status=-->
                                <td>
                                    JF12849AZXY
                                </td>
                                <!--end::Status=-->
                                <!--begin::Amount=-->
                                <td>
                                    Pembayaran Listrik Rumah

                                </td>
                                <!--end::Amount=-->
                                <!--begin::Amount=-->
                                <td class="text-danger">-Rp1.000.000</td>
                                <!--end::Amount=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::order=-->
                                <td>
                                    12 Nov 2022
                                </td>
                                <!--end::order=-->
                                <!--begin::Status=-->
                                <td>
                                    JF12849AZXY
                                </td>
                                <!--end::Status=-->
                                <!--begin::Amount=-->
                                <td>
                                    Cicilan Rumah
                                </td>
                                <!--end::Amount=-->
                                <!--begin::Amount=-->
                                <td class="text-danger">-Rp1.500.000</td>
                                <!--end::Amount=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::order=-->
                                <td>
                                    12 Nov 2022
                                </td>
                                <!--end::order=-->
                                <!--begin::Status=-->
                                <td>
                                    JF12849AZXY
                                </td>
                                <!--end::Status=-->
                                <!--begin::Amount=-->
                                <td>
                                    Cicilan Motor
                                </td>
                                <!--end::Amount=-->
                                <!--begin::Amount=-->
                                <td class="text-danger">-Rp500.000</td>
                                <!--end::Amount=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>
                                <!--begin::order=-->
                                <td>
                                    12 Nov 2022
                                </td>
                                <!--end::order=-->
                                <!--begin::Status=-->
                                <td>
                                    JF12849AZXY
                                </td>
                                <!--end::Status=-->
                                <!--begin::Amount=-->
                                <td>
                                    Deposito
                                </td>
                                <!--end::Amount=-->
                                <!--begin::Amount=-->
                                <td style="color: #27BFEF">+Rp8.000.000</td>
                                <!--end::Amount=-->
                            </tr>
                            <!--end::Table row-->
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
