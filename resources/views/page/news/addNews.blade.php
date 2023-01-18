@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Add News')
@section('toolbartitle')
    <span>
        <a href="{{ url('/news') }}" style="color: #54CC58">News</a>
        &emsp;/&emsp;Add News
    </span>
@endsection

@section('content')

    <!--begin::Content wrapper-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="div-with-bg">
            <div id="kt_app_content_container" class="app-container container-fluid shadow p-3 rounded">
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
                                    <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Add News</span>
                                </h3>
                                <!--end::Title-->

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body mb-10 py-4">
                                <form method="POST" action="#" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                <div class="row">
                                    <div class="col">
                                        <input readonly type="hidden" name="id" id="form6Example3" class="form-control"
                                        value="" />
                                        <div class="form-outline mb-4">
                                            {{-- <label class="form-label fw-bold" for="form6Example1">Author</label> --}}
                                            <input readonly type="hidden" name="pembuat" id="form6Example3" class="form-control"
                                        value="" />
                                        </div>
            
                                        <div class="form-outline mb-4">
                                            {{-- <label class="form-label fw-bold" for="form6Example1">Waktu</label> --}}
                                            <input readonly type="hidden" name="tanggal" id="form6Example3" class="form-control "
                                                value=""  />
                                        </div>
                                        
                                        <!-- nama -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Judul</label>
                                            <input name="headline" type="text" id="form6Example1" class="form-control"
                                                value="" required/>
                                        </div>
            
                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example3">Gambar</label>
                                            <input type="file" name="file" class="form-control"
                                            required />
                                        </div>
            
                                        {{-- ////////////////////// --}}
            
                                    </div>
                                    <div class="col mx-4">
                                        <!-- Message input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example7">Teks</label>
                                            <textarea class="form-control" id="form6Example7" rows="12" name="text"></textarea>
                                        </div>
            
            
            
                                        {{-- ///////////////// --}}
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse mt-10">
                                    <!-- Submit button -->
                                    <hr>
                                    <input name="verif" type="submit"
                                        class="btn btn-success text-light mb-2 p-5 mx-2" value="Upload">
            
                                    <input type="button" class="btn btn-secondary mb-2 p-5 mx-2 " value="Kembali"
                                        onclick="history.back();">
                                </div>
                                </form>
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
