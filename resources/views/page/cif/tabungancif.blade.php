@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Customer Information Page')
@section('toolbartitle')
    <span>
        <a href="{{ url('/cif') }}" style="color: #54CC58">Customer Information Page</a>
        &emsp;/&emsp;Customer Saving
    </span>
@endsection


@section('content')

<!--begin::Content wrapper-->
<div id="kt_app_content" class="content d-flex flex-column flex-column-fluid">
    <!--begin::Content container-->
    
        <div id="kt_app_content_container" class="container-fluid">
            <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold mb-10">
                @section('toolbartitle')
    <span>
        <a href="{{ url('/cif') }}" style="color: #54CC58">Customer Information Page</a>
        &emsp;/&emsp;Customer Information
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
                                    <a class="nav-link text-active-primary py-5 me-6 active"
                                        href="/infocif/tabungan/{{ $dataspesifik->id }}">Tabungan</a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary py-5 me-6 "
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
                            <div class="table-responsive">
                            <table class="table table-hover table-striped table-row-dashed table-row-gray-200 align-middle  gs-3 gy-5">
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="fw-bolder text-bold text-uppercase">
                                        <th class="min-w-125px text-start ">No. Rekening / Virtual Account</th>
                                        <th class="min-w-125px text-start">Produk</th>
                                        <th class="min-w-125px text-start">Nasabah</th>
                                        <th class="min-w-125px text-start">Tanggal Register</th>
                                        <th class="min-w-125px text-center">Status</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <tbody>
                                    @forelse ($dataID->data as $datasaving)
                                        <!--begin::Table row-->
                                        <tr class="table-row" data-href="infotabungan/show/{{ $datasaving->id }}">
                                            
                                            <!--begin::User=-->
                                            <td class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-50px me-3">
                                                    <img class="h-100 " src="{{ Avatar::create($datasaving->cif->fullName)->setTheme('tabersa')->setShape('square')->toBase64() }}" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::User details-->
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold text-dark d-block fs-5"
                                                        >
                                                        {{ $datasaving->accountNumber }} / {{ $datasaving->virtualAccountNumber }}
                                                    </span>
                                                </div>
                                                <!--begin::User details-->
                                            </td>
                                            <!--end::User=-->
                                            <!--begin::tgl regist=-->
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class=" fw-semibold d-block fs-7">
                                                        {{ $datasaving->savingProduct->productName }}
                                                    </span>
                                                    <span class=" fw-semibold d-block fs-7">
                                                        @foreach ($savingType->data as $list)
                                                        @if ($datasaving->savingAccountType == $list->value)
                                                            {{ $list->label }}
                                                        @endif
                                                        @endforeach
                                                    </span>
                                                </div>
                                            </td>
                                            <!--end::tgl regist=-->
                                            <!--begin::identitas=-->
                                            <td class="text-start">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="fw-bold mb-1 fs-6">
                                                        {{ $datasaving->cif->fullName }}
                                                    </span>
                                                    <span class="fw-semibold d-block fs-8">
                                                        {{ $datasaving->cif->cifNumber }}
                                                    </span>
                                                </div>
                                            </td>
                                            <!--end::identitas=-->
                                            <!--begin::no.seluler=-->
                                            <td class="text-start"> <span class="mb-1 fs-6">
                                                    {{ date('d F Y', strtotime(substr($datasaving->openDate, 0, 10))) }}
                                                </span></td>
                                            <!--end::no.seluler=-->
                                            <!--begin::email-->
                                            <td class="text-center">
                                                @if ($datasaving->status === 1)
                                                    <a href="#" class="badge badge-success  "
                                                        >
                                                        <span class="fw-bold bg-success ">
                                                            Active
                                                        </span>
                                                    </a>
                                                @elseif ($datasaving->status === 2)
                                                <a href="#" class="badge badge-danger  "
                                                    >
                                                    <span class="fw-bold  ">
                                                        Reject
                                                    </span>
                                                </a>
                                                @else
                                                    <a href="#" class="badge  badge-warning">
                                                        <span class="fw-bold text-hover-dark">
                                                            Pending
                                                        </span>
                                                    </a>
                                                @endif
        
                                            </td>
                                            <!--begin::email-->
                                        </tr>
                                        <!--end::Table row-->
                                    @empty
                                        <tr>
                                        <td colspan="5">
                                            Customer Tidak Memiliki Tabungan
                                        </td>
                                        </tr>
                                    @endforelse
        
                                </tbody>
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
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('.table-paginate').dataTable();
        });
    </script>
@endsection
