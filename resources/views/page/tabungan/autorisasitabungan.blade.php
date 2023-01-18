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
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Autorisasi Data Tabungan</span>
                            <span class="text-gray-400 fw-semibold fs-6">Autorisasi Data dari {{ $datacif->fullName }}</span>
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
                                            <select disabled class="form-select"
                                                aria-label="Default select example">
                                                <option value="Tabersa" selected>Tabersa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-sm-2 col-form-label" for="form6Example1">Tipe
                                            Tabungan</label>
                                        <div class="col-sm-4">
                                            <select disabled class="form-select"
                                                aria-label="Default select example">
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
                                            <select disabled class="form-select"
                                                aria-label="Default select example">
                                                @foreach ($datapurpose->data as $list)
                                                    <option value="{{ $list->value }}" <?php if ($datainfo->purposeOfAccount == $list->value) {
                                                        echo 'selected="selected"';
                                                    } ?>>
                                                        {{ $list->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    
                    </div>
                    <!--end: Card Body-->
                    <div class="card-footer border-top p-9 mb-15">
                        <div class="d-flex flex-row-reverse mt-10">
                            <!-- Submit button -->
                            <hr>
                            <input name="verif" type="submit"
                                class="btn btn-success text-light mb-2 p-5 mx-2" value="Verified">
                            <input name="reject "type="submit"
                                class="btn btn-danger text-light mb-2 p-5 mx-2" value="Reject">
                            <input type="button" class="btn btn-secondary mb-2 p-5 mx-2 "
                                value="Kembali" onclick="history.back();">
                        </div>
                    </div>
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
