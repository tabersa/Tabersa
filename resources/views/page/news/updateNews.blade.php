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
                        <h3 class="card-title align-items-start flex-column text-uppercase">
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
                            <input readonly type="hidden" name="id" id="form6Example3" class="form-control"
                                value="{{ $detail->data->id }}" />
                            <div class="form-outline mb-4">
                                {{-- <label class="form-label fw-bold" for="form6Example1">Author</label> --}}
                                <input readonly type="hidden" name="pembuat" id="form6Example3" class="form-control"
                                    value="{{ $profile->data->firstName . $profile->data->lastName }}" />
                            </div>

                            <div class="form-outline mb-4">
                                {{-- <label class="form-label fw-bold" for="form6Example1">Waktu</label> --}}
                                <input readonly type="hidden" name="tanggal" id="form6Example3" class="form-control "
                                    value="{{ date('Y-m-d H:i:s') }}" />
                            </div>

                            <!-- nama -->
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="form6Example1">Judul</label>
                                <input name="headline" type="text" id="form6Example1" class="form-control"
                                    value="{{ $detail->data->headline }}" required />
                            </div>

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="form6Example3">Gambar</label><br>
                                {{-- <input type="file" name="file" class="form-control" required /> --}}
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                    style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper w-250px h-250px"
                                        style="background-image: url(/assets/media/avatars/150-2.jpg)"></div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <!--begin::Inputs-->
                                        <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->

                                    <!--begin::Cancel button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove button-->
                                </div>
                                <!--end::Image input-->
                            </div>

                            {{-- ////////////////////// --}}


                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <label class="form-label fw-bold" for="form6Example7">Teks</label>
                                {{-- <textarea class="form-control" id="form6Example7" rows="12" name="text">{{ $detail->data->text }}</textarea> --}}
                                <textarea class="form-control" id="summernote" name="text">{!! $detail->data->text !!}</textarea>
                            </div>



                            {{-- ///////////////// --}}



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
                                            data-bs-toggle="modal" data-bs-target="#updateModal">Update</a>
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
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137"
                                                            width="16" height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16"
                                                            height="2" rx="1"
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
                                            Update News {{ $detail->data->headline }} ?
                                        </div>
                                        <!--end::Modal body-->
                                        <div class="modal-footer">
                                            <button type="button"
                                                class="btn btn-danger text-light w-40 ls-3 text-uppercase"
                                                data-bs-dismiss="modal">Tidak</button>
                                            <input type="submit" name="verif" value="Ya"
                                                class="btn btn-success text-light w-40 ls-3 text-uppercase">
                                        </div>
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                        </form>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Isi Text Disini',
        tabsize: 2,
        height: 800,
        dialogsInBody: true,
        callbacks: {
            onInit: function() {
                $('body > .note-popover').hide();
            }
        },
    });
</script>
@endsection
