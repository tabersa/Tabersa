@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | News')
@section('toolbartitle', 'News')
@section('content')

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Contacts App- Edit Contact-->
            <div class="row g-7">

                <!--begin::FEATURED-->
                {{-- <div class="col-lg-6 col-xl-3">
                    <!--begin::Contacts-->
                    <div class="card card-flush" id="kt_contacts_list">
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <div class="fs-1 fw-bold">Featured News</div>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card body-->
                        <div class="card-body pt-5" id="kt_contacts_list_body">
                            <!--begin::List-->
                            <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header"
                                data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body"
                                data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px">
                                <!--begin::User-->
                                <div class="d-flex flex-stack py-4">
                                    <!--begin::Details-->
                                    <div class="d-flex align-items-center">

                                        <table class="table align-middle table-hover table-row-dashed table-cif">
                                            <!--begin::Table body-->
                                            <tbody class="fw-semibold">
                                                <!--begin::Table row-->
                                                @forelse ($dataNews->data as $news)
                                                    <tr class="table-row" data-href="#">
                                                        <td>
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <!--begin::Avatar-->
                                                                <div class="me-5 position-relative">
                                                                    <!--begin::Image-->
                                                                    <div class="symbol symbol-80px ">
                                                                        <img src="{{ $news->imageUrl }}" alt="{{ substr($news->headline,0,5) }}" />
                                                                    </div>
                                                                    <!--end::Image-->
                                                                </div>
                                                                <!--end::Avatar-->
                                                                <!--begin::Details-->
                                                                <div class="fw-semibold text-start">
                                                                    <a href="#"
                                                                        class="fs-6 fw-bold text-gray-900">{{ $news->headline }}</a>
                                                                    <div class="fs-8 text-gray-400 ">by
                                                                        {{ $news->publishedBy }}</div>
                                                                </div>
                                                                <!--end::Details-->
                                                            </div>
                                                            <div class="fs-6 text-start">
                                                                @if(strlen($news->text) < 100)
                                                                {{$news->text}}
                                                                @else
                                                                {{ substr($news->text, 0, 100) }}
                                                                <a class="text-primary"
                                                                    href="#"> Selengkapnya...</a>
                                                                @endif
                                                            </div>

                                                            
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <span class="fs-1">Data Kosong</span>
                                                @endforelse

                                                <!--end::Table row-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>

                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::User-->

                            </div>
                            <!--end::List-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Contacts-->
                </div> --}}
                <!--end::FEATURED-->


                <!--begin::Content-->
                <div class="col">
                    <!--begin::Contacts-->
                    <div class="card card-flush h-lg-100" id="kt_contacts_main">
                        <!--begin::Card header-->
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <div class="fs-1 fw-bold">List News</div>

                            </div>
                            {{-- <div class="card-toolbar">
                                <a href="{{ route('news.input') }}" class="btn btn-bg-success text-light btn-sm">Tambah Data</a>
                            </div> --}}
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-5">
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
                                                                {{ $news->text }}
                                                            </div>
                                                            <div class="fs-8 mt-4 text-gray-400 text-end">
                                                                {{ date('d F Y', strtotime(substr($news->publishedOn, 0, 10))) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <span class="fs-1">Data Kosong</span>
                                        @endforelse

                                        <!--end::Table row-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Contacts App- Edit Contact-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->

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
