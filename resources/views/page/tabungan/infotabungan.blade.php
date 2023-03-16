@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Mutasi')
@section('toolbartitle')
    <span>
        <span href="{{ url('/tabungan') }}" style="color: #54CC58">Tabungan</span>
        &emsp;/&emsp;Mutasi
    </span>
@endsection

@section('content')
    <style>
        td {
            height: 50px;
            vertical-align: middle;
        }
    </style>
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
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Informasi Tabungan</span>
                                <span class="text-gray-400 fw-semibold fs-6">Informasi Data dari
                                    {{ $datacif->fullName }}</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        @if ($datainfo->auth == 2 && $datainfo->status == 2)
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50px me-5">
                                                            <span class="symbol-label bg-light">
                                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                                    class="h-75 align-self-end" alt="" />
                                                                <img class="h-100 "
                                                                    src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a href="{{ url('infocif') }}"
                                                            class="text-dark fw-bold  mb-1 fs-6">{{ $datacif->fullName }}</a>
                                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                            {{ $datacif->cifNumber }}</span>
                                                    </div>
                                                    {{-- <div class="row">
                                                        <!--begin:: Avatar -->
                                                        <div class="col-4">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-50px me-5">
                                                                    <span class="symbol-label bg-light">
                                                                        <img src="assets/media/svg/avatars/001-boy.svg"
                                                                            class="h-75 align-self-end" alt="" />
                                                                        <img class="h-100 "
                                                                            src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::User details-->
                                                        <div class="col">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="{{ url('infocif') }}"
                                                                    class="text-dark fw-bold  mb-1 fs-6">{{ $datacif->fullName }}</a>
                                                                <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                                    {{ $datacif->cifNumber }}</span>
                                                            </div>
                                                        </div>
                                                        <!--begin::User details-->
                                                    </div> --}}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span
                                                            class="text-dark fw-bold mb-1 fs-6">{{ $dataproduct->productName }}</span>
                                                        @foreach ($dataakun->data as $akun)
                                                            @if ($datainfo->savingAccountType == $akun->value)
                                                                <span
                                                                    class="text-dark fw-semibold d-block fs-7">{{ $akun->label }}</span>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fw-bold text-danger mb-1 fs-4">Tabungan Direject</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                {{-- <div class="d-flex justify-content-between shadow-sm">
                                    <div class="p-6">
                                        <div class="row">
                                            <!--begin:: Avatar -->
                                            <div class="col-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-5">
                                                        <span class="symbol-label bg-light">
                                                            <img src="assets/media/svg/avatars/001-boy.svg"
                                                                class="h-75 align-self-end" alt="" />
                                                            <img class="h-100 "
                                                                src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="col">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="{{ url('infocif') }}"
                                                        class="text-dark fw-bold  mb-1 fs-6">{{ $datacif->fullName }}</a>
                                                    <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                        {{ $datacif->cifNumber }}</span>
                                                </div>
                                            </div>
                                            <!--begin::User details-->
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bold mb-1 fs-6">{{ $dataproduct->productName }}</span>
                                            @foreach ($dataakun->data as $akun)
                                                @if ($datainfo->savingAccountType == $akun->value)
                                                    <span
                                                        class="text-dark fw-semibold d-block fs-7">{{ $akun->label }}</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <span class="fw-bold text-danger mb-1 fs-4">Tabungan Direject</span>
                                    </div>
                                </div> --}}


                            </div>
                        @else
                            <!--begin::Card body-->
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="text-end">
                                                    <div class="symbol symbol-50px me-5">
                                                        <span class="symbol-label bg-light">
                                                            <img class="h-100 "
                                                                src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
                                                        </span>
                                                    </div>
                                                    {{-- <div class="d-flex align-items-end">
                                                        
                                                    </div> --}}
                                                </td>
                                                <td class="text-start">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span
                                                            class="text-dark fw-bold  mb-1 fs-6">{{ $datacif->fullName }}</span>
                                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                            {{ $datacif->cifNumber }}</span>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <div class="row">
                                                        <!--begin:: Avatar -->
                                                        <div class="col-4">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-50px me-5">
                                                                    <span class="symbol-label bg-light">
                                                                        <img class="h-100 "
                                                                            src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::User details-->
                                                        <div class="col">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <span
                                                                    class="text-dark fw-bold  mb-1 fs-6">{{ $datacif->fullName }}</span>
                                                                <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                                    {{ $datacif->cifNumber }}</span>
                                                            </div>
                                                        </div>
                                                        <!--begin::User details-->
                                                    </div>
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span
                                                            class="text-dark fw-bold mb-1 fs-6">{{ $datainfo->accountNumber }}</span>
                                                        <span class="text-dark fw-bold d-block fs-7">VA
                                                            {{ $datainfo->virtualAccountNumber }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span
                                                            class="text-dark fw-bold mb-1 fs-6">{{ $dataproduct->productName }}</span>
                                                        @foreach ($dataakun->data as $akun)
                                                            @if ($datainfo->savingAccountType == $akun->value)
                                                                <span
                                                                    class="text-dark fw-semibold d-block fs-7">{{ $akun->label }}</span>
                                                            @endif
                                                        @endforeach
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="text-dark fw-bold mb-1 fs-6">Saldo
                                                            Akhir</span>
                                                        <span class="text-dark fw-semibold d-block fs-7">Rp.
                                                            {{ number_format($datainfo->endBalance, 0, ',', ',') }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center flex-column">
                                                        <a href="#" class="btn btn-success fs-6 px-8 "
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_view_users">Rekening Koran</a>
                                                        <a href="#" class="btn btn-success fs-6 pt-1 px-8 "
                                                            data-bs-toggle="modal" data-bs-target="#kt_modal_qr">QR CODE</a>
                                                        <form target="_blank" action="{{ route('card') }}" method="post">
                                                            @csrf
                                                            @method('post')
                                                            <input type="hidden" name="nama"
                                                                value="{{ $datacif->fullName }}">
                                                            <input type="hidden" name="nomor"
                                                                value="{{ $datainfo->accountNumber }}">
                                                            <input type="hidden" name="id"
                                                                value="{{ $datainfo->id }}">

                                                            <button type="submit" class="btn btn-success fs-6 pt-1 px-8 ">
                                                                Print Card
                                                            </button>
                                                        </form>
                                                        {{-- <a href="{{ route('card') }}" class="btn btn-success fs-6 pt-1 px-8 ">Print Card</a> --}}
                                                        {{-- <a href="#" class="btn btn-success fs-6 pt-1 px-8 " data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_scan">SCAN QR CODE</a> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class="d-flex justify-content-between shadow-sm">
                                    <div class="p-6">
                                        <div class="row">
                                            <!--begin:: Avatar -->
                                            <div class="col-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-5">
                                                        <span class="symbol-label bg-light">
                                                            <img class="h-100 "
                                                                src="{{ Avatar::create($datacif->fullName)->setTheme('pastel')->setShape('square')->setBorder(2, '#FFF', 90) }}" />
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="col">
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span
                                                        class="text-dark fw-bold  mb-1 fs-6">{{ $datacif->fullName }}</span>
                                                    <span class="text-dark fw-semibold d-block fs-7">CIF ID
                                                        {{ $datacif->cifNumber }}</span>
                                                </div>
                                            </div>
                                            <!--begin::User details-->
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bold mb-1 fs-6">{{ $datainfo->accountNumber }}</span>
                                            <span class="text-dark fw-bold d-block fs-7">VA
                                                {{ $datainfo->virtualAccountNumber }}</span>
                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span
                                                class="text-dark fw-bold mb-1 fs-6">{{ $dataproduct->productName }}</span>
                                            @foreach ($dataakun->data as $akun)
                                                @if ($datainfo->savingAccountType == $akun->value)
                                                    <span
                                                        class="text-dark fw-semibold d-block fs-7">{{ $akun->label }}</span>
                                                @endif
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="p-6">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bold mb-1 fs-6">Saldo
                                                Akhir</span>
                                            <span class="text-dark fw-semibold d-block fs-7">Rp.
                                                {{ number_format($datainfo->endBalance, 0, ',', ',') }}</span>
                                        </div>
                                    </div>

                                    <div class="p-6">
                                        <div class="d-flex justify-content-center flex-column">
                                            <a href="#" class="btn btn-success fs-6 px-8 " data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_view_users">Rekening Koran</a>
                                            <a href="#" class="btn btn-success fs-6 pt-1 px-8 " data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_qr">QR CODE</a>
                                            <form target="_blank" action="{{ route('card') }}" method="post">
                                                @csrf
                                                @method('post')
                                                <input type="hidden" name="nama" value="{{ $datacif->fullName }}">
                                                <input type="hidden" name="nomor" value="{{ $datainfo->accountNumber }}">
                                                <input type="hidden" name="id" value="{{ $datainfo->id }}">
                                                
                                                <button type="submit" class="btn btn-success fs-6 pt-1 px-8 ">
                                                    Print Card
                                                </button>
                                                </form>    
                                        </div>
                                    </div>

                                </div>  --}}
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-row-dashed table-row-gray-200 align-middle  gs-3 gy-5 table-mutasi">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                            <!--begin::Table row-->
                                            <tr class="fw-bolder text-bold text-uppercase">
                                                <th class="min-w-150px text-start ">Tgl Transaksi</th>
                                                <th class="min-w-150px text-start ">Kode Transaksi</th>
                                                <th class="min-w-400px text-start ">Keterangan</th>
                                                <th class="min-w-100px text-end">Nominal</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-semibold">
                                            <!--begin::Table row-->
                                            @forelse ($trs as $data)
                                                <tr>
                                                    <!--begin::order=-->
                                                    <td class="text-start">
                                                        {{ date('d F Y', strtotime(substr($data->transactionDate, 0, 10))) }}
                                                    </td>
                                                    <!--end::order=-->
                                                    <!--begin::Status=-->
                                                    <td class="text-start">
                                                        {{ $data->billerCode }}
                                                    </td>
                                                    <!--end::Status=-->
                                                    <!--begin::Amount=-->
                                                    <td class="text-start">
                                                        {{ $data->description }}

                                                    </td>
                                                    <!--end::Amount=-->
                                                    <!--begin::Amount=-->
                                                    @if ($data->dc == 'D')
                                                        <td class="text-end text-danger"> - Rp
                                                            {{ number_format($data->amount, 0, ',', ',') }}</td>
                                                    @else
                                                        <td class=" text-end text-success">+ Rp
                                                            {{ number_format($data->amount, 0, ',', ',') }}</td>
                                                    @endif

                                                    <!--end::Amount=-->
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        <span>Tidak Ada Transaksi</span>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <div class="divider bg-active-dark">
                                        <hr>
                                    </div>
                                    {{-- <div class="row">
                        <div class="col fs-4 fw-bold text-start text-uppercase">
                            Saldo Akhir
                        </div>
                        <div class="col-lg-4 fs-4 fw-bold text-end">
                            Rp {{ number_format($datainfo->endBalance, 0, ',', ',') }}
                        </div>
                    </div> --}}
                                </div>
                                {{-- <div class="divider bg-active-dark"><hr></div> --}}
                                <!--end::Table-->
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
                                <div class="modal fade" id="kt_modal_qr" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header pb-0 border-0 justify-content-between">
                                                <!--begin::Close-->
                                                <h1 class="mb-3 text-center">QR CODE</h1>
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
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
                                            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-4">
                                                <div class="text-center py-3">
                                                    {!! QrCode::size(300)->generate($datainfo->id) !!}
                                                </div>
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <div class="modal fade" id="kt_modal_scan" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog mw-1000px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header pb-0 border-0 justify-content-between">
                                                <!--begin::Close-->
                                                <h1 class="mb-3 text-center">QR CODE</h1>
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
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
                                            <div class="modal-body mh-lg-100">
                                                <div class="text-center py-3">
                                                    <video id="previewKamera" style="width: 300px;height: 300px;"></video>
                                                    <br>
                                                    <select id="pilihKamera" style="max-width:400px">
                                                    </select>
                                                    <br>
                                                    <input type="text" id="hasilscan">
                                                </div>
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2>Cari Histori Transaksi</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
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
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form id="kt_modal_new_card_form" class="form" method="POST"
                                                    action="/infotabungan/search/{{ $datainfo->id }}">
                                                    <input hidden name="accountNumber" type="text"
                                                        value="{{ $datainfo->accountNumber }}">
                                                    <input hidden name="id" type="text"
                                                        value="{{ $datainfo->id }}">

                                                    <!--begin::Label-->
                                                    @csrf
                                                    <!-- {{ csrf_field() }} -->
                                                    {{-- <label class="required fs-6 fw-semibold form-label mb-2">
                                                        Waktu Filter
                                                    </label> --}}
                                                    <!--end::Label-->
                                                    <!--begin::Row-->
                                                    <div class="row fv-row">
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            @php
                                                                $month = date('m');
                                                            @endphp
                                                            <select name="bulan" class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true"
                                                                data-placeholder="Bulan" required>
                                                                <option></option>
                                                                <option value=01 <?php if ($month == '01') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Januari</option>
                                                                <option value=02 <?php if ($month == '02') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Februari</option>
                                                                <option value=03 <?php if ($month == '03') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Maret</option>
                                                                <option value=04 <?php if ($month == '04') {
                                                                    echo 'selected="selected"';
                                                                } ?>>April</option>
                                                                <option value=05 <?php if ($month == '06') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Mei</option>
                                                                <option value=06 <?php if ($month == '06') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Juni</option>
                                                                <option value=07 <?php if ($month == '07') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Juli</option>
                                                                <option value=08 <?php if ($month == '08') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Agustus</option>
                                                                <option value=09 <?php if ($month == '09') {
                                                                    echo 'selected="selected"';
                                                                } ?>>September</option>
                                                                <option value=10 <?php if ($month == '10') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Oktober</option>
                                                                <option value=11 <?php if ($month == '11') {
                                                                    echo 'selected="selected"';
                                                                } ?>>November</option>
                                                                <option value=12 <?php if ($month == '12') {
                                                                    echo 'selected="selected"';
                                                                } ?>>Desember</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-6">
                                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                                                            <script>
                                                                $(function() {
                                                                    $("input[name='tahun']").on('input', function(e) {
                                                                        $(this).val($(this).val().replace(/[^0-9]/g, ''));
                                                                    });
                                                                });
                                                            </script>
                                                            <input type="text" maxlength=4 minlength=4 name="tahun"
                                                                class="form-control form-control-lg form-control-solid"
                                                                placeholder="Tahun">
                                                            {{-- <select name="tahun" class="form-select form-select-solid"
                                                                data-control="select2" data-hide-search="true"
                                                                data-placeholder="Tahun" required>
                                                                <option></option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                                <option value="2031">2031</option>
                                                                <option value="2032">2032</option>
                                                            </select> --}}
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->

                                                    <!--end::Col-->

                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" id="kt_modal_new_card_cancel"
                                                            class="btn btn-light me-3">Batal</button>
                                                        <button type="submit" id="kt_modal_new_card_submit"
                                                            class="btn btn-success">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        @endif
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

    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        let selectedDeviceId = null;
        const codeReader = new ZXing.BrowserMultiFormatReader();
        const sourceSelect = $("#pilihKamera");

        $(document).on('change', '#pilihKamera', function() {
            selectedDeviceId = $(this).val();
            if (codeReader) {
                codeReader.reset()
                initScanner()
            }
        })

        function initScanner() {
            codeReader
                .listVideoInputDevices()
                .then(videoInputDevices => {
                    videoInputDevices.forEach(device =>
                        console.log(`${device.label}, ${device.deviceId}`)
                    );

                    if (videoInputDevices.length > 0) {

                        if (selectedDeviceId == null) {
                            if (videoInputDevices.length > 1) {
                                selectedDeviceId = videoInputDevices[1].deviceId
                            } else {
                                selectedDeviceId = videoInputDevices[0].deviceId
                            }
                        }


                        if (videoInputDevices.length >= 1) {
                            sourceSelect.html('');
                            videoInputDevices.forEach((element) => {
                                const sourceOption = document.createElement('option')
                                sourceOption.text = element.label
                                sourceOption.value = element.deviceId
                                if (element.deviceId == selectedDeviceId) {
                                    sourceOption.selected = 'selected';
                                }
                                sourceSelect.append(sourceOption)
                            })

                        }

                        codeReader
                            .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                            .then(result => {

                                //hasil scan
                                console.log(result.text)
                                $("#hasilscan").val(result.text);

                                if (codeReader) {
                                    codeReader.reset()
                                }
                            })
                            .catch(err => console.error(err));

                    } else {
                        alert("Camera not found!")
                    }
                })
                .catch(err => console.error(err));
        }


        if (navigator.mediaDevices) {


            initScanner()


        } else {
            alert('Cannot access camera.');
        }
    </script>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/qrcodelib.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/webcodecamjquery.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.table-mutasi').DataTable({
                "dom": "< <'pull-left'f><t> >"
                // <' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>>
            });
        });
    </script>


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

@endsection
