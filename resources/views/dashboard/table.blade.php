@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Tabungan')
@section('toolbartitle', 'Tabungan')

@section('content')

    <!--begin::Content wrapper-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl shadow p-3 mb-5 rounded">
            <!--begin::Row-->
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <!--begin::Col-->
                <div class="col-xl p-1 m-0">
                    <!--begin::Tables widget 14-->
                    <div class="card bg-transparent">
                        <img class="container-daun" src="{{ asset('assets/media/tabersa/slicelogo.png') }}" style="linear-gradient(to bottom, #FFF 50%, transparent 100%); opacity: 0.3;">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Customer Information File</span>
                                <span class="text-gray-400 fw-semibold fs-6">Periksa Semua Informasi Pelanggan Anda
                                    Disini</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->


                                {{-- ////////////////////////////// --}}

                                <table class="table table-striped table-bordered table-paginate" cellspacing="0"
                                    width="100%">
                                    <thead class="shadow-sm">
                                        <hr>
                                        <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-1350px text-start">No. Rekening / Virtual Account</th>
                                            <th class="p-0 pb-3 min-w-120px text-start">Produk</th>
                                            <th class="p-0 pb-3 min-w-120px text-start">Nasabah</th>
                                            <th class="p-0 pb-3 min-w-100px text-start">Tanggal Register</th>
                                            <th class="p-0 pb-3 min-w-fit text-start">Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- PENDING --}}
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            1289321085095
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabersa
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan BPR
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Donny Sidarta
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        1213213123123124124
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    16 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-secondary btn-active-color-primary">
                                                    <span class="fw-bold text-gray-500 text-hover-primary">
                                                        Pending
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            1289321085095
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabersa
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan BPR
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Donny Sidarta
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        1213213123123124124
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    16 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-secondary btn-active-color-primary">
                                                    <span class="fw-bold text-gray-500 text-hover-primary">
                                                        Pending
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            1289321085095
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabersa
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan BPR
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Donny Sidarta
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        1213213123123124124
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    16 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-secondary btn-active-color-primary">
                                                    <span class="fw-bold text-gray-500 text-hover-primary">
                                                        Pending
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            1289321085095
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabersa
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan BPR
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Donny Sidarta
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        1213213123123124124
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    16 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-secondary btn-active-color-primary">
                                                    <span class="fw-bold text-gray-500 text-hover-primary">
                                                        Pending
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            1289321085095
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabersa
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan BPR
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Donny Sidarta
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        1213213123123124124
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    16 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-secondary btn-active-color-primary">
                                                    <span class="fw-bold text-gray-500 text-hover-primary">
                                                        Pending
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            1289321085095
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabersa
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan BPR
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Donny Sidarta
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        1213213123123124124
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    16 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-secondary btn-active-color-primary">
                                                    <span class="fw-bold text-gray-500 text-hover-primary">
                                                        Pending
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        {{-- VERIFIED --}}
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            85771313
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        BCA
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan VA
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Anna Josepin
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        131313141414
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    19 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-success btn-active-color-primary">
                                                    <span class="fw-bold text-hover-light" style="color: green">
                                                        Verified
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            85771313
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        BCA
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan VA
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Anna Josepin
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        131313141414
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    19 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-success btn-active-color-primary">
                                                    <span class="fw-bold text-hover-light" style="color: green">
                                                        Verified
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            85771313
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        BCA
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan VA
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Anna Josepin
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        131313141414
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    19 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-success btn-active-color-primary">
                                                    <span class="fw-bold text-hover-light" style="color: green">
                                                        Verified
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            85771313
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        BCA
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan VA
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Anna Josepin
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        131313141414
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    19 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-success btn-active-color-primary">
                                                    <span class="fw-bold text-hover-light" style="color: green">
                                                        Verified
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="{{ asset('assets/media/stock/600x600/img-43.jpg') }}"
                                                            class="" alt="" />
                                                    </div>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="fw-bold d-block fs-5">
                                                            85771313
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        BCA
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        Tabungan VA
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        Anna Josepin
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        131313141414
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-start">
                                                <span class="fw-bold mb-1 fs-6">
                                                    19 Jan 2022
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                <a href="#"
                                                    class="btn btn-sm btn-lg btn-bg-success btn-active-color-primary">
                                                    <span class="fw-bold text-hover-light" style="color: green">
                                                        Verified
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <!--end::Table-->
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
