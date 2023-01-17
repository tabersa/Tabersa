@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Profile Settings')
@section('toolbartitle')
    <span>
        <a href="{{ url('/setting') }}" style="color: #54CC58">Setting</a>
        &emsp;/&emsp;Profile
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
                                    <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Profile Setting</span>
                                    {{-- <span class="text-gray-400 fw-semibold fs-6">Atur semua kebutuhan Akun Anda di sini</span> --}}
                                </h3>
                                <!--end::Title-->

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3" id="loader">
                                <div class="separator separator-dashed separator-content border-dark my-10 px-10">
                                    <span class="w-300px fw-bolder text-success text-uppercase">Identitas Perusahaan</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-4">Nama Bank</label>
                                            <div class="col-md-8">
                                                <input name="nama_bank" type="text" value="{{ $dataBank->data->bankName }}"
                                                    id="nama_bank" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-4">Alamat</label>
                                            <div class="col-md-8">
                                                <textarea name="alamat" rows="2" cols="20" id="alamat" class="form-control" style="height:80px;">{{ $dataBank->data->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-4">Kecamatan</label>
                                            <div class="col-md-8">
                                                <input name="ctl00$MainContent$kecamatan" type="text"
                                                    value="{{ $dataBank->data->district }}" id="kecamatan" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-form-label text-right col-md-4">Kota</label>
                                            <div class="col-md-8">
                                                <input name="ctl00$MainContent$namakota" type="text" maxlength="25" id="namakota"
                                                    class="form-control"
                                                    @foreach ($city as $list)
                                                            <?php if ($dataBank->data->city == $list->value) { ?>
                                                                value="{{ $list->label }}"
                                                            <?php } ?>
                                                            
                                                    @endforeach
                                                    >
                                                    </div>
                                            </div>
                                            <div class="row mb-2">
                                                <label class="col-form-label text-right col-md-4">Dati II</label>
                                                <div class="col-md-8">
                                                    <input type="hidden" name="ctl00$MainContent$kodedati2" id="MainContent_kodedati2"
                                                        value="1291">
                                                    <div class="input-group">
                                                        <input name="ctl00$MainContent$namadati2" type="text" 
                                                            id="namadati2" class="form-control" onclientclick="return false;" 
                                                            @foreach ($province as $list)
                                                    <?php if ($dataBank->data->province == $list->value) { ?>
                                                        value="{{ $list->label }}"
                                                    <?php } ?> @endforeach />
                                                        <span class="input-group-btn btn-right">
                                                            <input type="submit" name="ctl00$MainContent$btndati2" value=""
                                                                onclick="" id="MainContent_btndati2" class="btn blue fa" />
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <label class="col-form-label text-right col-md-4">Kode Pos</label>
                                                <div class="col-md-8">
                                                    <input name="ctl00$MainContent$kodepos" type="text" value="{{ $dataBank->data->zipCode }}" id="kodepos"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <label class="col-form-label text-right col-md-4">Deskripsi</label>
                                                <div class="col-md-8">
                                                    <textarea name="ctl00$MainContent$kodepos" type="text" class="form-control text-start" style="height:300px;">
                                                        {{$dataBank->data->description }}
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed separator-content border-dark my-10 px-10">
                                        <span class="fw-bolder text-success text-uppercase">Lokasi</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <label class="col-form-label text-right col-md-4">Longitude</label>
                                                <div class="col-md-8">
                                                    <input name="ctl00$MainContent$longitude" type="text" value="{{ $dataBank->data->longitude }}" class="form-control
                                                        id="longitude" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <label class="col-form-label text-right col-md-4">Latitude</label>
                                                <div class="col-md-8">
                                                    <input name="ctl00$MainContent$latitude" type="text" value="{{ $dataBank->data->latitude }}"
                                                        id="latitude" class="form-control">
                                                </div>
                                            </div>
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
                                            <button onclick="" id="MainContent_BTNCancel" type="button"
                                                class="btn btn-danger w-100 ls-3 text-uppercase">
                                                Batal
                                            </button>
                                        </div>
                                        <div class="col-md-2">
                                            <button onclick="" id="MainContent_BTNSave" type="button"
                                                class="btn btn-success w-100 ls-3 text-uppercase">
                                                Simpan
                                            </button>
                                        </div>
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
