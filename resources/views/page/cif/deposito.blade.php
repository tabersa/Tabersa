@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Customer Information Page')


@section('content')

<!--begin::Content wrapper-->
<div id="kt_app_content" class="content d-flex flex-column flex-column-fluid">
    <!--begin::Content container-->
    
        <div id="kt_app_content_container" class="container-fluid">
            <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold mb-10">
                @section('toolbartitle')
    <span>
        <a href="{{ url('/cif') }}" style="color: #54CC58">Customer Information Page</a>
        &emsp;/&emsp;Customer Deposito
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
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Customer Information
                                    Page</span>
                                <span class="text-gray-400 fw-semibold fs-6">Periksa Informasi Customer Anda Disini</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
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
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('.table-paginate').dataTable();
        });
    </script>
@endsection
