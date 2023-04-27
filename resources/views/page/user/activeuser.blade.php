@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Active User')
@section('toolbartitle', 'Ubah Status User')

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
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>User</span>
                                <span class="text-gray-400 fw-semibold fs-6">Ubah Status User</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <ul
                            class="nav nav-fill nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item ">
                                <a class="nav-link text-active-primary py-5 me-6 "
                                    href="{{ route('user') }}">Tambah Data</a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6  active"
                                    href="{{ route('user.showactive') }}">Ubah Status</a>
                            </li>
                            <!--end::Nav item-->
                        </ul>
                            <!--begin::Table-->
                            <div class="my-8"></div>
                            <form method="POST" action="{{ route('user.changeactive') }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col">
                                        <div class="fs-5 fw-bold form-label mb-3">Ubah Status User</div>
                                        <div class="form-group row mb-4 text-start">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">Username</label>
                                            <div class="col-sm-10">
                                                <select name="user" class="form-select"
                                                    aria-label="Default select example">
                                                    @foreach ($user as $user)
                                                    <option value="{{ $user->id }}" >{{ $user->firstName }} {{ $user->lastName }} - {{ $user->userName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 text-start">
                                            <label class="col-sm-2 col-form-label" for="form6Example1">Status</label>
                                            <div class="col-sm-10">
                                                <select name="status" class="form-select"
                                                    aria-label="Default select example">
                                                    <option value="true" selected>Active</option>
                                                    <option value="false">Non Active</option>
                                                </select>
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
                                    <div class="card-footer border-top p-9 mb-15">
                                        <div class="row">
                                            <div class="col-md-8">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ route('dashboard') }}"
                                                    class="btn btn-secondary  w-100 ls-3  text-uppercase">Kembali</a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#" class="btn btn-success w-100 ls-3 text-uppercase"
                                                    data-bs-toggle="modal" data-bs-target="#verifmodal">Simpan</a>
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
                                        <h1 class="mb-3 text-start">Konfirmasi Rubah Data</h1>
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
                                        Ubah Data ?
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
                        </form>
                        <!--end::Table-->
                        <div id="kt_scrolltop" class="scrolltop mb-10" data-kt-scrolltop="true">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                            <span class="svg-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                        rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                    <path
                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end: Card Body-->
                    <div class="card-footer border-top p-9 mb-15">

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
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.table-transaksi').DataTable({
                "dom": "< <'pull-left'f><t> >"
                // <' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>>
            });
        });
    </script>

    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
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
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
    <script src="assets/js/custom/apps/user-management/users/list/export-users.js"></script>
    <script src="assets/js/custom/apps/user-management/users/list/add.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    {{-- <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('.table-paginate').dataTable();
        });
    </script> --}}
@endsection
