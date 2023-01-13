@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Setting')
@section('toolbartitle', 'Setting')
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
                        <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Setting</span>
                        {{-- <span class="text-gray-400 fw-semibold fs-6">Atur semua kebutuhan Akun Anda di sini</span> --}}
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <!--begin::Card body-->
                <div class="card-body py-3" id="loader">
					<div class="row gy-0 gx-10">
						{{-- <div class="col-md-2">&nbsp;</div> --}}
						<div class="col-md-4 text-center">
							<div class="card h-175px bgi-no-repeat bgi-size-cover card-xxl-stretch mb-5 mb-xl-8 report-slik shadow-lg">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="text-success fw-bolder line-height-lg mb-5">PROFIL</h3>
                                    <div class="m-0">
                                        <a class="btn btn-success fw-bold px-6 py-3" href="{{ route('profileSetting') }}">Setup</a>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="col-md-4 text-center">
							<div class="card h-175px bgi-no-repeat bgi-size-cover card-xxl-stretch mb-5 mb-xl-8 report-slik shadow-lg">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="text-success fw-bolder line-height-lg mb-5">LITERASI & EDUKASI</h3>
                                    <div class="m-0">
                                        <a class="btn btn-success fw-bold px-6 py-3" href="{{ route('literasiSetting') }}">Setup</a>
                                    </div>
                                </div>
                            </div>
						</div>
                        <div class="col-md-4 text-center">
							<div class="card h-175px bgi-no-repeat bgi-size-cover card-xxl-stretch mb-5 mb-xl-8 report-slik shadow-lg">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h3 class="text-success fw-bolder line-height-lg mb-5">TABUNGAN</h3>
                                    <div class="m-0">
                                        <a class="btn btn-success fw-bold px-6 py-3" href="{{ route('tabunganSetting') }}">Produk Tabungan</a>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
                <!--end::Card body-->
                <!--end::Card header-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center d-block"">
                    <div class="modal-title " id="exampleModalLabel">
                        <div class="h2 fw-bolder py-8">
                            Anda Yakin Keluar Dari Tabersa
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex flex-column">
                    <button type="button" class="w-100 btn btn-success ">
                    <a href="{{ url('/') }}" class="text-light fw-bold">
                        Konfirmasi
                    </a>
                    </button><br>
                    <button type="button" class="px-8 btn btn-primary-outline fw-bold" data-bs-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!--begin::Vendor Stylesheets(used by this page)-->
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
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
    <script src="assets/plugins/custom/formrepeater/formrepeater.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="assets/js/custom/apps/ecommerce/catalog/save-product.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
@endsection
