@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Profile Settings')

@section('content')

    <!--begin::Content wrapper-->
    <div id="kt_app_content" class="content d-flex flex-column flex-column-fluid">
        <!--begin::Content container-->

        <div id="kt_app_content_container" class="container-fluid">
            <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold mb-10">
            @section('toolbartitle')
                <span>
                    <span  style="color: #54CC58">Setting</span>
                    &emsp;/&emsp;Profile
                </span>
            @endsection
        </ol>
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
                            <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Profile Setting</span>
                            {{-- <span class="text-gray-400 fw-semibold fs-6">Atur semua kebutuhan Akun Anda di sini</span> --}}
                        </h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
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
                                            value="{{ $dataBank->data->district }}" id="kecamatan"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-form-label text-right col-md-4">Kota</label>
                                    <div class="col-md-8">
                                        <input name="ctl00$MainContent$namakota" type="text" maxlength="25"
                                            id="namakota" class="form-control"
                                            @foreach ($city as $list)
                                                    <?php if ($dataBank->data->city == $list->value) { ?>
                                                        value="{{ $list->label }}"
                                                    <?php } ?> @endforeach>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-form-label text-right col-md-4">Dati II</label>
                                    <div class="col-md-8">
                                        <input type="hidden" name="ctl00$MainContent$kodedati2"
                                            id="MainContent_kodedati2" value="1291">
                                        <div class="input-group">
                                            <input name="ctl00$MainContent$namadati2" type="text" id="namadati2"
                                                class="form-control" onclientclick="return false;"
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
                                        <input name="ctl00$MainContent$kodepos" type="text"
                                            value="{{ $dataBank->data->zipCode }}" id="kodepos"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-2">
                                    <label class="col-form-label text-right col-md-4">Deskripsi</label>
                                    <div class="col-md-8">
                                        <textarea name="ctl00$MainContent$kodepos" type="text" class="form-control text-start" style="height:300px;">
                                                {{ $dataBank->data->description }}
                                            </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed separator-content border-dark my-10 px-10">
                            <span class="fw-bolder text-success text-uppercase">Lokasi</span>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row mb-2">
                                    <label class="col-form-label text-right col-md-4">Longitude</label>
                                    <div class="col-md-8">
                                        <input name="ctl00$MainContent$kodepos" type="text" id="longitude"
                                            class="form-control" />
                                        {{-- <textarea name="" type="text" id="latitude"
                                            value=""
                                            class="form-control"></textarea> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row mb-2">
                                    <label class="col-form-label text-right col-md-4">Latitude</label>
                                    <div class="col-md-8">
                                        <input name="ctl00$MainContent$kodepos" type="text" id="latitude"
                                            class="form-control" />
                                        {{-- <textarea name="" type="text" id="longitude"
                                            value=""
                                            class="form-control"></textarea> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success" id="get-location">Get Location</button>
                            </div>
                            
                        </div>
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
                    </div>
                    <!--end: Card Body-->
                    <div class="card-footer border-top p-9 mb-10">
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
                                <a href="#" class="btn btn-success w-100 ls-3 text-uppercase"
                                    data-bs-toggle="modal" data-bs-target="#updatemodal">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true" role="dialog">
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
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                height="2" rx="1" transform="rotate(-45 6 17.3137)"
                                                fill="currentColor" />
                                            <rect x="7.41422" y="6" width="16" height="2"
                                                rx="1" transform="rotate(45 7.41422 6)"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--begin::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body fs-4">
                                Simpan Perubahan ?
                            </div>
                            <!--end::Modal body-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger text-light w-40 ls-3 text-uppercase"
                                    data-bs-dismiss="modal">Tidak</button>
                                <input type="submit" name="verif" value="Ya"
                                    class="btn btn-success text-light w-40 ls-3 text-uppercase">
                            </div>
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
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


<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<script>
    $("#get-location").click(() => {
        if (!navigator.geolocation)
            return alert("Geolocation is not supported.");

        navigator.geolocation.getCurrentPosition((position) => {
            $("#latitude").val(`${position.coords.latitude}`);
            $("#longitude").val(`${position.coords.longitude}`);
        });
    });
</script>
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
