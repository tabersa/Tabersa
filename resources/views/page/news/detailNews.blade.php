@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Detail News')
@section('toolbartitle')
    <span>
        <a href="{{ url('/news') }}" style="color: #54CC58">News</a>
        &emsp;/&emsp; {{ $detail->data->headline }}
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
                            
                            <!--begin::Body-->
                            <div class="card-body p-lg-10 pb-lg-0">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-xl-row">
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid me-xl-15">
                                        <!--begin::Post content-->
                                        <div class="mb-17">
                                            <!--begin::Wrapper-->
                                            <div class="mb-8">
                                                <!--begin::Info-->
                                                <div class="d-flex flex-wrap mb-6 justify-content-between">
                                                    <!--begin::Item-->
                                                    <div class="me-9 my-1">
                                                        <!--begin::Icon-->
                                                        <span class="svg-icon svg-icon-primary svg-icon-2 me-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 448 512">
                                                                <path fill="#58cc5c"
                                                                d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/>
                                                            </svg>
                                                        </span>
                                                        <!--end::Icon-->
                                                        <!--begin::Label-->
                                                        <span class="fw-bold text-gray-400">
                                                            {{ date('d F Y', strtotime(substr($detail->data->publishedOn, 0, 10))) }}
                                                        </span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <a class="btn btn-success right-0" href="/news/input/{{ $detail->data->id }}">Update News</a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Info-->
                                                <!--begin::Title-->
                                                <a href="#" class="text-dark fs-1 fw-bold">{{ $detail->data->headline }}<br>
                                                <span class="fw-bold text-muted fs-5 ps-1">by {{ $detail->data->publishedBy }}</span></a>
                                                
                                                <!--end::Title-->
                                                <!--begin::Container-->
                                                <div class="overlay mt-8">
                                                    <!--begin::Image-->
                                                    <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-550px" style="background-image:url('{{ $detail->data->imageUrl }}')"></div>
                                                    <!--end::Image-->
                                                </div>
                                                <!--end::Container-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Description-->
                                            <div class="fs-5 fw-semibold text-gray-600">
                                                <!--begin::Text-->
                                                <p class="mb-8">
                                                    {{ $detail->data->text }}
                                                </p>
                                                <!--end::Text-->
                                                
                                            </div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Post content-->
                                    </div>
                                    <!--end::Content-->
                                    
                                </div>
                                <!--end::Layout-->
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
