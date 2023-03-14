@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | News')

@section('content')

<!--begin::Content wrapper-->
<div id="kt_app_content" class="content d-flex flex-column flex-column-fluid">
    <!--begin::Content container-->

    <div id="kt_app_content_container" class="container-fluid">
        <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold mb-10">

            {{-- @section('toolbartitle', 'News') --}}
            @section('toolbartitle')
                <span>
                    <span  style="color: #54CC58">Setting</span>
                    &emsp;/&emsp;News
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
                            <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>List Berita</span>
                            {{-- <span class="text-gray-400 fw-semibold fs-6"> Welcome {{ $profile->data->firstName }}</span> --}}
                        </h3>
                        <!--end::Title-->
                        <div class="card-toolbar">
                            <a href="{{ route('news.formAdd') }}" class="btn btn-success">Tambah data</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <div class="container">
                            <table class="table align-middle table-hover table-row-dashed table-cif">
                                <!--begin::Table body-->
                                <tbody class="fw-semibold">
                                    <!--begin::Table row-->
                                    @forelse ($dataNews->data as $news)
                                        <tr class="table-row" data-href="/news/show/{{ $news->id }}">
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12 text-start">
                                                        {{-- <img style='float:left;margin-right:20px;'
                                                                src="{{ $news->imageUrl }}" height="200px" width="200px" /> --}}
                                                        <div class="fs-1 fw-bold">{{ $news->headline }}</div>
                                                        <div class="fs-8 mb-8">by {{ $news->publishedBy }}</div>

                                                        <div class="fs-6">
                                                            {!! substr(strip_tags($news->text),0,80) !!}
                                                            {{-- {!! substr(strip_tags($news->text), 0, 80) !!} --}}
                                                        </div>
                                                        <div class="fs-8 mt-4 text-gray-400 text-end">
                                                            {{ date('d F Y', strtotime(substr($news->publishedOn, 0, 10))) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="/news/formupdate/{{ $news->id }}"
                                                    class="btn btn-success">Edit</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td><span class="fs-1">Data Kosong</span></td>
                                        </tr>
                                    @endforelse

                                    <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
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
    <script>
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
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
