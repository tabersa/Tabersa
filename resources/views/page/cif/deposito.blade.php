@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Customer Information Page')
@section('toolbartitle')
    <span>
        <a href="{{ url('/cif') }}" style="color: #54CC58">Customer Information Page</a>
        &emsp;/&emsp;Customer Information
    </span>
@endsection
@section('content')

    <!--begin::Content wrapper-->
    <div id="kt_app_content" class="app-content flex-column-fluid ">
        <!--begin::Content container-->
                    <div id="kt_app_content_container" class="app-container container-fluid shadow p-3 rounded">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-xl p-1 m-0">
                    <!--begin::Tables widget 14-->
                    <div class="card bg-transparent">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Customer Information
                                    Page</span>
                                <span class="text-gray-400 fw-semibold fs-6">Periksa Informasi Customer Anda Disini</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <ul class="nav nav-fill nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item ">
                                    <a class="nav-link text-active-primary py-5 me-6 "
                                        href="/infocif/cif/{{ $dataspesifik->id }}">CIF</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6"
                                        href="/infocif/tabungan/{{ $dataspesifik->id }}">Tabungan</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6  active"
                                        href="/infocif/deposito/{{ $dataspesifik->id }}"">Deposito</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6"
                                        href="/infocif/kredit/{{ $dataspesifik->id }}"">Kredit</a>
                                </li>
                                <!--end::Nav item-->
                            </ul>
                            
                    </div>
                    <!--end: Card Body-->
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
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('.table-paginate').dataTable();
        });
    </script>
@endsection
