@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Mutasi')
@section('toolbartitle')
    <span>
        <a href="{{ url('/tabungan') }}" style="color: #54CC58">Tabungan</a>
        &emsp;/&emsp;Autorisasi
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
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Autorisasi Data Tabungan</span>
                                <span class="text-gray-400 fw-semibold fs-6">Autorisasi Data dari
                                    {{ $datacif->fullName }}</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <form method="POST" action="/infotabungan/autorisasi/{{ $datainfo->id }}">

                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <div class="row">
                                    <div class="col mx-auto">
                                        <div class="form-group row mb-4">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">No.
                                                Rekening</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="accountNumber" id="form6Example1"
                                                    class="form-control" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">No. Virtual
                                                Account</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="virtualAccountNumber" id="form6Example1"
                                                    class="form-control" value="" />
                                            </div>
                                        </div>
                                        <hr class="mt-8 mb-8">
                                        <div class="form-group row mb-4">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">No. CIF</label>
                                            <div class="col-sm-4">
                                                <input name="cifNumber" type="text" disabled id="form6Example1"
                                                    class="form-control" value="{{ $datacif->cifNumber }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">Nama
                                                Lengkap</label>
                                            <div class="col-sm-4">
                                                <input type="text" disabled id="form6Example1" class="form-control"
                                                    value="{{ $datacif->fullName }}" />
                                                <input name="branchId" type="hidden" id="form6Example1"
                                                    class="form-control" value="{{ $datainfo->branchId }}" />
                                                <input name="cifNumber" type="hidden" id="form6Example1"
                                                    class="form-control" value="{{ $datainfo->cifNumber }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">Produk</label>
                                            <div class="col-sm-4">
                                                <select disabled class="form-select" aria-label="Default select example">
                                                    <option value="Tabersa" selected>Tabersa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">Tipe
                                                Tabungan</label>
                                            <div class="col-sm-4">
                                                <select disabled class="form-select" aria-label="Default select example">
                                                    @foreach ($datatipe->data as $list)
                                                        <option value="{{ $list->value }}" <?php if ($datainfo->savingAccountType == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">Tujuan
                                                Pembukaan</label>
                                            <div class="col-sm-4">
                                                <select disabled class="form-select" aria-label="Default select example">
                                                    @foreach ($datapurpose->data as $list)
                                                        <option value="{{ $list->value }}" <?php if ($datainfo->purposeOfAccount == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div id="kt_scrolltop" class="scrolltop mb-10" data-kt-scrolltop="true">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end: Card Body-->
                                    <div class="card-footer border-top p-9 mb-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-2">
                                                <input type="button" class="btn btn-secondary w-100 ls-3 text-uppercase"
                                                    value="Kembali" onclick="history.back();">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#" class="btn btn-danger w-100 ls-3 text-uppercase" data-bs-toggle="modal"
                                                data-bs-target="#rejectmodal">Tolak</a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#" class="btn btn-success w-100 ls-3 text-uppercase" data-bs-toggle="modal"
                                                data-bs-target="#verifmodal">Verifikasi</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="verifmodal" tabindex="-1" aria-hidden="true" role="dialog">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header pb-0 border-0 ">
                                                <!--begin::Close-->
                                                <input type="hidden" name="status" value="1">
                                                <h1 class="mb-3 text-start">Konfirmasi Transaksi</h1>
                                                <div class="btn btn-sm btn-icon btn-active-color-primary right-0" data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
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
                                                Verifikasi Tabungan {{ $datacif->fullName }} ?
                                            </div>
                                            <!--end::Modal body-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger text-light w-40 ls-3 text-uppercase" data-bs-dismiss="modal">Tidak</button>
                                                <input type="submit" name="verif" value="Ya" class="btn btn-success text-light w-40 ls-3 text-uppercase">
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
                                                <input type="hidden" name="status" value="2">
                                                <div class="btn btn-sm btn-icon btn-active-color-primary right-0" data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
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
                                                Tolak Tabungan {{ $datacif->fullName }} ?
                                            </div>
                                            <!--end::Modal body-->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger text-light w-40 ls-3 text-uppercase" data-bs-dismiss="modal">Tidak</button>
                                                <input type="submit" name="verif" value="Tidak" class="btn btn-success text-light w-40 ls-3 text-uppercase">
                                            </div>
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                            </form>
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
