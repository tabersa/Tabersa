@extends('index')
@extends('dashboard.layout.toolbar')
@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Dashboard')
@section('toolbartitle', 'Dashboard')

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
                                    <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Dashboard</span>
                                    <span class="text-gray-400 fw-semibold fs-6"> Welcome {{ $profile->data->firstName }}</span>
                                </h3>
                                <!--end::Title-->

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">

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
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('.table-paginate').dataTable();
        });
    </script>
@endsection
