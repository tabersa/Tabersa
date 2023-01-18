@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Update News')


@section('content')

    <!--begin::Content wrapper-->
    <div id="kt_app_content" class="content d-flex flex-column flex-column-fluid">
        <!--begin::Content container-->

        <div id="kt_app_content_container" class="container-fluid">
            <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold mb-10">
                @section('toolbartitle')
                <span>
                    <a href="{{ url('/news') }}" style="color: #54CC58">News</a>
                    &emsp;/&emsp;Update News
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
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Update News</span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <form method="POST" action="{{ route('news.update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="row">
                                <div class="col">
                                    <input readonly type="hidden" name="id" id="form6Example3"
                                        class="form-control" value="{{ $detail->data->id }}" />
                                    <div class="form-outline mb-4">
                                        {{-- <label class="form-label fw-bold" for="form6Example1">Author</label> --}}
                                        <input readonly type="hidden" name="pembuat" id="form6Example3"
                                            class="form-control"
                                            value="{{ $profile->data->firstName . $profile->data->lastName }}" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        {{-- <label class="form-label fw-bold" for="form6Example1">Waktu</label> --}}
                                        <input readonly type="hidden" name="tanggal" id="form6Example3"
                                            class="form-control " value="{{ date('Y-m-d H:i:s') }}" />
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">Judul</label>
                                        <input name="headline" type="text" id="form6Example1"
                                            class="form-control" value="{{ $detail->data->headline }}" required />
                                    </div>

                                    <!-- Text input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example3">Gambar</label>
                                        <input type="file" name="file" class="form-control" required />
                                    </div>

                                    {{-- ////////////////////// --}}

                                </div>
                                <div class="col mx-4">
                                    <!-- Message input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example7">Teks</label>
                                        <textarea class="form-control" id="form6Example7" rows="12" name="text">{{ $detail->data->text }}</textarea>
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
