@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Produk Tabungan')
@section('toolbartitle')
    <span>
        <a href="{{ url('/setting') }}" style="color: #54CC58">Setting</a>
        &emsp;/&emsp;Produk Tabungan
    </span>
@endsection

@section('content')

    <!--begin::Content wrapper-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="div-with-bg">
            <div id="kt_app_content_container" class="app-container container-xxl shadow p-3 rounded">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl p-0 m-0">
                        <!--begin::Tables widget 14-->
                        <div class="card bg-transparent">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Produk Tabungan</span>
                                    {{-- <span class="text-gray-400 fw-semibold fs-6">Atur semua kebutuhan Akun Anda di sini</span> --}}
                                </h3>
                                <!--end::Title-->

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3" id="loader">
                                <div class="separator separator-dashed separator-content border-primary my-10 px-10">
                                    <span class="fw-bolder text-primary text-uppercase">Produk</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-6">Nama Produk</label>
                                            <div class="col-md-6">
                                                <input name="ctl00$MainContent$namafull" type="text" maxlength="30" id="MainContent_namafull" class="form-control" value="TABERSA">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-6">Metode Bunga</label>
                                            <div class="col-md-6">
                                                <select name="ctl00$MainContent$jnshtgbunga" id="MainContent_jnshtgbunga" class="form-control">
                                                    <option value="1">Harian Murni</option>
                                                    <option selected="selected" value="2">Harian Bulanan</option>
                                                    <option value="3">Terendah</option>
                                                    <option value="4">Rata-rata Harian</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-6">Lama Pasif</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input name="ctl00$MainContent$lamapasif" type="text" value="180" id="MainContent_lamapasif" class="form-control text-right">
                                                    <span class="input-group-addon">&emsp; hari</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-6">Saldo Pasif</label>
                                            <div class="col-md-6">
                                                <input name="ctl00$MainContent$saldopasif" type="text" value="20,000" id="MainContent_saldopasif" class="form-control text-right numeric">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-6">Biaya Pasif</label>
                                            <div class="col-md-6">
                                                <input name="ctl00$MainContent$bypasif" type="text" value="5,000" id="MainContent_bypasif" class="form-control text-right numeric">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-6">Tutup Tabungan Otomatis</label>
                                            <div class="col-md-6">
                                                <select name="ctl00$MainContent$autotutup" id="MainContent_autotutup" class="form-control">
                                                    <option selected="selected" value="0">Tidak Tutup Otomatis</option>
                                                    <option value="1">By Saldo Minimal Ditutup</option>
                                                    <option value="2">By Saldo Minimal Ditutup &amp; Status Pasif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-6">Saldo Minimal Ditutup</label>
                                            <div class="col-md-6">
                                                <input name="ctl00$MainContent$mintutup" type="text" value="20,000" id="MainContent_mintutup" class="form-control text-right numeric">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-6">Biaya Penutupan</label>
                                            <div class="col-md-6">
                                                <input name="ctl00$MainContent$bytutup" type="text" value="20,000" id="MainContent_bytutup" class="form-control text-right numeric">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed separator-content border-primary my-10 px-10">
                                    <span class="w-200px fw-bolder text-primary text-uppercase">Suku Bunga</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-4">Tanggal Efektif</label>
                                            <div class="col-md-8">
                                                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                                                    <input name="ctl00$MainContent$tgleffrate" type="text" value="01-07-2022" id="MainContent_tgleffrate" class="form-control">
                                                    <span class="input-group-btn">
                                                        <button id="MainContent_btncal1" class="btn default" type="button">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-4">Suku Bunga Berjalan</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input name="ctl00$MainContent$rate" type="text" value="0.00" id="MainContent_rate" class="form-control text-right">
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-4">Suku Bunga Baru</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input name="ctl00$MainContent$ratenew" type="text" value="0.00" id="MainContent_ratenew" class="form-control text-right">
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">&nbsp;</div>
                                    <div class="col-md-7">
                                        <table class="table table-light table-striped table-hover table-bordered" id="tabprogresif">
                                            <thead>
                                                <tr>
                                                    <th style="width: 25%;">Saldo Min</th>
                                                    <th style="width: 25%;">Saldo Max</th>
                                                    <th style="width: 25%;">Rate (%)</th>
                                                    <th style="width: 25%;">Rate Baru (%)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomin1" type="text" value="1" id="MainContent_saldomin1" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomax1" type="text" value="1,000,000" id="MainContent_saldomax1" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate1" type="text" value="1.00" id="MainContent_rate1" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate1new" type="text" value="0" id="MainContent_rate1new" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomin2" type="text" value="1,000,001" id="MainContent_saldomin2" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomax2" type="text" value="5,000,000" id="MainContent_saldomax2" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate2" type="text" value="3.00" id="MainContent_rate2" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate2new" type="text" value="0" id="MainContent_rate2new" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomin3" type="text" value="5,000,001" id="MainContent_saldomin3" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomax3" type="text" value="10,000,000" id="MainContent_saldomax3" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate3" type="text" value="5.00" id="MainContent_rate3" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate3new" type="text" value="0" id="MainContent_rate3new" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomin4" type="text" value="10,000,001" id="MainContent_saldomin4" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomax4" type="text" value="999,999,999" id="MainContent_saldomax4" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate4" type="text" value="10.00" id="MainContent_rate4" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate4new" type="text" value="0" id="MainContent_rate4new" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomin5" type="text" value="0" id="MainContent_saldomin5" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$saldomax5" type="text" value="0" id="MainContent_saldomax5" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate5" type="text" value="0" id="MainContent_rate5" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                    <td>
                                                        <input name="ctl00$MainContent$rate5new" type="text" value="0" id="MainContent_rate5new" class="aspNetDisabled form-control text-right numeric progresif"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-top p-9 mb-10">
                                <div class="row">
                                    <div class="col-md-6">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <button onclick="" id="MainContent_BTNCancel" type="button" class="btn btn-danger w-100 ls-3 text-uppercase">
                                            Batal
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <button onclick="" id="MainContent_BTNSave" type="button" class="btn btn-success w-100 ls-3 text-uppercase">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end: Card Body-->
                        </div>

                    </div>
                    <!--end::Tables widget 14-->
                </div>
                <!--end::Col-->

            </div>
        </div>
        <!--end::Row-->

    </div>
    <!--end::Content wrapper-->

@endsection

@section('script')


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