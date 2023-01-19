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
                    &emsp;/&emsp;Customer Data
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
                        <ul
                            class="nav nav-fill nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item ">
                                <a class="nav-link text-active-primary py-5 me-6  active"
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
                        <form method="POST" action="/infocif/autorisasi/{{ $dataid }}">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <div class="row">
                                <div class="col mx-4">
                                    <div class="form-outline mb-4">
                                        <h4 class="card-title align-items-start flex-column">
                                            <span class="fs-2 fw-bold text-gray-800 mb-10"><br>Identitas</span>
                                            <hr>
                                        </h4>
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">No. CIF</label>
                                        <input name="cifNumber" type="text" id="form6Example1" class="form-control"
                                            value="{{ $datainfo->cifNumber }}" />
                                    </div>

                                    <!-- Text input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example3">Nama Lengkap</label>
                                        <input type="text" id="form6Example3" class="form-control"
                                            value="{{ $datainfo->fullName }}" disabled />
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">NIK</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <select class="form-select" aria-label="Default select example"
                                                            disabled>
                                                            <option value="1" <?php if ($datainfo->identityType == '1') {
                                                                echo 'selected="selected"';
                                                            } ?>>KTP</option>
                                                            <option value="2" <?php if ($datainfo->identityType == '2') {
                                                                echo 'selected="selected"';
                                                            } ?>>Passpor</option>
                                                            <option value="3" <?php if ($datainfo->identityType == '3') {
                                                                echo 'selected="selected"';
                                                            } ?>>NPWP</option>
                                                            <option value="3" <?php if ($datainfo->identityType == '4') {
                                                                echo 'selected="selected"';
                                                            } ?>>SIM</option>
                                                            <option value="3" <?php if ($datainfo->identityType == '9') {
                                                                echo 'selected="selected"';
                                                            } ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <input type="text" id="form6Example1" class="form-control"
                                                        value="{{ $datainfo->identityNumber }}" disabled />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Tanggal Kadaluarsa</label>
                                                <input disabled type="date" id="form6Example2" class="form-control"
                                                    value="{{ date('Y-m-d', strtotime(substr($datainfo->identityExpiredDate, 0, 10))) }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Radio input -->
                                    <div class="row mb-8">
                                        <label class="form-label mb-4" for="form6Example1">Jenis Kelamin <br></label>
                                        @if ($datainfo->gender == '1')
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input disabled class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Laki-Laki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input disabled class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input disabled class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Laki-Laki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input disabled class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        @endif

                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Tempat Lahir</label>
                                                <input disabled type="text" id="form6Example1"
                                                    class="form-control" value="{{ $datainfo->placeOfBirth }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Tanggal Lahir</label>
                                                <input disabled type="date" id="form6Example2"
                                                    class="form-control"
                                                    value="{{ date('Y-m-d', strtotime(substr($datainfo->dateOfBirth, 0, 10))) }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">Nama Ibu kandung</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            value="{{ $datainfo->motherMaidenName }}" />
                                    </div>


                                    {{-- ALAMAT IDENTITAS --}}

                                    <div class="form-outline mb-4">

                                        <h4 class="card-title align-items-start flex-column">
                                            <span class="fs-2 fw-bold text-gray-800 mb-10"><br>Alamat Identitas</span>
                                            <hr>
                                        </h4>

                                    </div>

                                    @if ($dataaddress->identityAddress == $dataaddress->residenceAddress)
                                        <div class="form-outline my-10">
                                            <div class="form-check form-switch">
                                                <input disabled class="form-check-input" type="checkbox"
                                                    role="switch" id="flexSwitchCheckDefault" checked>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Alamat
                                                    Identitas sama dengan domisili</label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-outline my-10">
                                            <div class="form-check form-switch">
                                                <input disabled class="form-check-input" type="checkbox"
                                                    role="switch" id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Alamat
                                                    Identitas sama dengan domisili</label>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- switch -->


                                    <!-- Message input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example7">Alamat Lengkap</label>
                                        <textarea disabled class="form-control" id="form6Example7" rows="4">{{ $dataaddress->identityAddress }}</textarea>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Desa / Kelurahan</label>
                                                <input disabled type="text" id="form6Example1"
                                                    class="form-control"
                                                    value="{{ $dataaddress->identitySubDistrict }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Kecamatan</label>
                                                <input disabled type="text" id="form6Example2"
                                                    class="form-control"
                                                    value="{{ $dataaddress->identityDistrict }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Kabupaten / Kota</label>
                                                <select disabled class="form-select"
                                                    aria-label="Default select example">
                                                    @foreach ($city as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataaddress->identityCity == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Provinsi</label>
                                                <select disabled class="form-control m-bootstrap-select m_selectpicker"
                                                    name="regional_code" required="">
                                                    @foreach ($province as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataaddress->identityProvince == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">Kode Pos</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            value="{{ $dataaddress->identityZipCode }}" />
                                    </div>

                                    {{-- DETAIL KERJAAN --}}
                                    <div class="form-outline mb-4">
                                        <h4 class="card-title align-items-start flex-column">
                                            <span class="fs-2 fw-bold text-gray-800 mb-10"><br>Detail Pekerjaan</span>
                                            <hr>
                                        </h4>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Pekerjaan</label>
                                                <select disabled class="form-select"
                                                    aria-label="Default select example">
                                                    @foreach ($job as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataoccupation->occupation == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Bidang Usaha</label>
                                                <select disabled class="form-select"
                                                    aria-label="Default select example">
                                                    @foreach ($sector as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataoccupation->sectorOfIndustry == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Penghasilan
                                                    Perbulan</label>
                                                <select disabled class="form-select"
                                                    aria-label="Default select example">
                                                    @foreach ($gaji as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataoccupation->monthlyIncome == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Pengeluaran
                                                    Perbulan</label>
                                                <select disabled class="form-select"
                                                    aria-label="Default select example">
                                                    @foreach ($pengeluaran as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataoccupation->monthlySpending == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example1">Sumber Dana</label>
                                        <select disabled class="form-select" aria-label="Default select example">
                                            @foreach ($dari as $list)
                                                <option value="{{ $list->value }}" <?php if ($dataoccupation->sourceOfFund == $list->value) {
                                                    echo 'selected="selected"';
                                                } ?>>
                                                    {{ $list->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">Nama Kantor</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            value="{{ $dataoccupation->companyName }}" />
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">Jabatan</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            @foreach ($jabatan as $list)
                                            <?php
                                            if ($list->value === $dataoccupation->jobPosition);
                                            ?> 
                                            value="{{ $list->label }}" @endforeach />
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">Telepon Kantor</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            value="{{ $dataoccupation->companyPhoneNumber }}" />
                                    </div>

                                    {{-- alamat kantor --}}

                                    <div class="form-outline mb-4">

                                        <h4 class="card-title align-items-start flex-column">
                                            <span class="fs-2 fw-bold text-gray-800 mb-10"><br>Alamat Kantor</span>
                                            <hr>
                                        </h4>

                                    </div>


                                    <!-- Message input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example7">Alamat Lengkap</label>
                                        <textarea disabled class="form-control" id="form6Example7" rows="4">{{ $dataoccupation->companyAddress }}</textarea>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Desa / Kelurahan</label>
                                                <input disabled type="text" id="form6Example1"
                                                    class="form-control"
                                                    value="{{ $dataoccupation->companySubDistrict }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Kecamatan</label>
                                                <input disabled type="text" id="form6Example2"
                                                    class="form-control"
                                                    value="{{ $dataoccupation->companyDistrict }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Kabupaten / Kota</label>
                                                <select disabled class="form-select"
                                                    aria-label="Default select example">
                                                    @foreach ($city as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataaddress->identityCity == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Provinsi</label>
                                                <select disabled class="form-control m-bootstrap-select m_selectpicker"
                                                    name="regional_code" required="">
                                                    @foreach ($province as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataaddress->identityProvince == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">Kode Pos</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            value="{{ $dataoccupation->companyZipCode }}" />
                                    </div>

                                    {{-- ////////////////////// --}}

                                </div>
                                <div class="col mx-4">

                                    <div class="form-outline mb-4 pt-20 mt-3">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Pendidikan Terakhir</label>
                                            <select disabled class="form-select" aria-label="Default select example">
                                                @foreach ($edu as $list)
                                                    <option value="{{ $list->value }}" <?php if ($dataoccupation->latestEducation == $list->value) {
                                                        echo 'selected="selected"';
                                                    } ?>>
                                                        {{ $list->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Telepon</label>
                                                <input disabled type="text" id="form6Example1"
                                                    class="form-control" value="{{ $datainfo->phoneNumber }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Handphone</label>
                                                <input disabled type="text" id="form6Example2"
                                                    class="form-control" value="{{ $datainfo->mobileNumber }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">Email</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            value="{{ $datainfo->emailAddress }}" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label fw-bold" for="form6Example1">NPWP</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            value="{{ $datainfo->taxNumber }}" />
                                    </div>

                                    <div class="form-outline mb-20">
                                        <label class="form-label fw-bold" for="form6Example1">Negara</label>
                                        <select disabled class="form-select" aria-label="Default select example"
                                            id="negara">
                                            @foreach ($national as $list)
                                                <option value="{{ $list->value }}" <?php if ($dataaddress->nationality == $list->value) {
                                                    echo 'selected="selected"';
                                                } ?>>
                                                    {{ $list->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    {{-- alamat domisili --}}

                                    <div class="form-outline mb-4">

                                        <h4 class="card-title align-items-start flex-column pt-10">
                                            <span class="fs-2 fw-bold text-gray-800 mb-10"><br>Alamat Domisili</span>
                                            <hr>
                                        </h4>

                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Status Domisili</label>
                                            <select disabled class="form-select" aria-label="Default select example">
                                                <option selected disabled>Piih</option>
                                                @foreach ($residensial->data as $list)
                                                    <option value="{{ $list->value }}" <?php if ($dataaddress->residensialStatus == $list->value) {
                                                        echo 'selected="selected"';
                                                    } ?>>
                                                        {{ $list->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Message input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form6Example7">Alamat Lengkap</label>
                                        <textarea disabled class="form-control" id="form6Example7" rows="4">{{ $dataaddress->residenceAddress }}</textarea>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Desa / Kelurahan</label>
                                                <input disabled type="text" id="form6Example1"
                                                    class="form-control"
                                                    value="{{ $dataaddress->residenceSubDistrict }}" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example2">Kecamatan</label>
                                                <input disabled type="text" id="form6Example2"
                                                    class="form-control"
                                                    value="{{ $dataaddress->residenceDistrict }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text input -->
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Kabupaten / Kota</label>
                                                <select disabled class="form-select"
                                                    aria-label="Default select example">
                                                    @foreach ($city as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataaddress->residenceCity == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Provinsi</label>
                                                <select disabled class="form-control m-bootstrap-select m_selectpicker"
                                                    name="regional_code" required="">
                                                    @foreach ($province as $list)
                                                        <option value="{{ $list->value }}" <?php if ($dataaddress->residenceProvince == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- nama -->
                                    <div class="form-outline mb-3">
                                        <label class="form-label fw-bold" for="form6Example1">Kode Pos</label>
                                        <input disabled type="text" id="form6Example1" class="form-control"
                                            value="{{ $dataaddress->residenceZipCode }}" />
                                    </div>

                                    {{-- PASANGAN --}}

                                    <div class="form-outline mb-4">

                                        <h4 class="card-title align-items-start flex-column">
                                            <span class="fs-2 fw-bold text-gray-800 mb-4"><br>Pasangan</span>
                                            <hr>
                                        </h4>

                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form6Example1">Status Perkawinan</label>
                                            <div class="row mb-8">
                                                @if ($datainfo->maritalStatus == '1')
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1"
                                                                checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Kawin
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Belum Kawin
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Cerai
                                                            </label>
                                                        </div>
                                                    </div>
                                                @elseif ($datainfo->maritalStatus == '2')
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Kawin
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1"
                                                                checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Belum Kawin
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Cerai
                                                            </label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Kawin
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Belum Kawin
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-outline">
                                                            <input disabled class="form-check-input" type="radio"
                                                                name="flexRadioDefault" id="flexRadioDefault1"
                                                                checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Cerai
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                        @if ($datainfo->maritalStatus == 1)
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold" for="form6Example1">Nama</label>
                                                <input disabled type="text" id="form6Example1"
                                                    class="form-control" value="{{ $dataspouse->spouseName }}" />
                                            </div>

                                            <!-- Text input -->
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <div class="form-outline">
                                                        <label class="form-label"
                                                            for="form6Example1">Identitas</label>
                                                        <select disabled class="form-select"
                                                            aria-label="Default select example">
                                                            @foreach ($type->data as $list)
                                                                <option value="{{ $list->value }}"
                                                                    <?php if ($dataspouse->spouseIdentityType == $list->value) {
                                                                        echo 'selected="selected"';
                                                                    } ?>>
                                                                    {{ $list->label }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold"
                                                            for="form6Example1">Identitas</label>
                                                        <input disabled type="text" id="form6Example1"
                                                            class="form-control"
                                                            value="{{ $dataspouse->spouseIdentityNumber }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold" for="form6Example1">Tanggal
                                                    Kadaluarsa</label>
                                                <input disabled type="date" id="form6Example1"
                                                    class="form-control"
                                                    value="{{ date('Y-m-d', strtotime(substr($dataspouse->spouseIdentityExpiredDate, 0, 10))) }}" />
                                            </div>

                                            <!-- Text input -->
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form6Example1">Tempat
                                                            Lahir</label>
                                                        <input disabled type="text" id="form6Example1"
                                                            class="form-control"
                                                            value="{{ $dataspouse->spousePlaceOfBirth }}" />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form6Example2">Tanggal
                                                            Lahir</label>
                                                        <input disabled type="date" id="form6Example2"
                                                            class="form-control"
                                                            value="{{ date('Y-m-d', strtotime(substr($dataspouse->spouseDateOfBirth, 0, 10))) }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold" for="form6Example1">Jumlah
                                                    Tanggungan</label>
                                                <div class="input-group mb-3">
                                                    <input disabled type="text" class="form-control"
                                                        placeholder="" value="{{ $dataspouse->numberOfDependant }}">
                                                </div>
                                            </div>
                                        @else
                                        @endif

                                        <div class="form-outline mb-8">
                                            <h4 class="card-title align-items-center flex-column">
                                                <span class="fs-2 fw-bold text-gray-800 mb-4"><br>Foto</span>
                                                <hr>
                                            </h4>
                                        </div>

                                        <div class="form-outline mb-4 row">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col justify-content-start">
                                                        <label class="form-label fw-bold" for="form6Example1">
                                                            Foto Identitas
                                                        </label><br>
                                                        <img src="{{ $dataPhoto->imageUrl1 }}" height="200px"
                                                            width="200px">
                                                    </div>
                                                    <div class="col justify-content-start">
                                                        <label class="form-label fw-bold" for="form6Example1">
                                                            Foto Selfie
                                                        </label><br>
                                                        <img src="{{ $dataPhoto->imageUrl2 }}" height="200px"
                                                            width="auto">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ///////////////// --}}

                                <!--end: Card Body-->
                                <div class="card-footer border-top p-9 mb-10">
                                    @if ($datainfo->cifNumber === null)
                                        <div class="d-flex flex-row-reverse mt-10">
                                            <!-- Submit button -->
                                            <hr>
                                            <a href="#" class="btn btn-success text-light mb-2 p-5 mx-2" data-bs-toggle="modal"
                                            data-bs-target="#verifmodal">Verified</a>
                                            <a href="#" class="btn btn-danger text-light mb-2 p-5 mx-2" data-bs-toggle="modal"
                                            data-bs-target="#rejectmodal">Reject</a>
                                            <input type="button" class="btn btn-secondary mb-2 p-5 mx-2 "
                                                value="Kembali" onclick="history.back();">
                                        </div>
                                    @elseif ($newdata->status != 1 && $newdata->status != 2)
                                        <div class="d-flex flex-row-reverse mt-10">
                                            <!-- Submit button -->
                                            <hr>
                                            <a href="#" class="btn btn-success text-light mb-2 p-5 mx-2" data-bs-toggle="modal"
                                            data-bs-target="#verifmodal">Verified</a>
                                            <a href="#" class="btn btn-danger text-light mb-2 p-5 mx-2" data-bs-toggle="modal"
                                            data-bs-target="#rejectmodal">Reject</a>

                                            <input type="button" class="btn btn-secondary mb-2 p-5 mx-2 "
                                                value="Kembali" onclick="history.back();">
                                        </div>
                                    @else
                                        <div class="d-flex flex-row-reverse mt-10">
                                            <!-- Submit button -->
                                            <hr>

                                            <input type="button" onclick="history.back();"
                                                class="btn btn-secondary mb-2 p-5 mx-2 " value="Kembali">
                                        </div>
                                    @endif
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
                            <div class="modal fade" id="verifmodal" tabindex="-1" aria-hidden="true" role="dialog">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header pb-0 border-0 ">
                                            <!--begin::Close-->
                                            <h1 class="mb-3 text-start">Konfirmasi Transaksi</h1>
                                            <div class="btn btn-sm btn-icon btn-active-color-primary right-0" data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                            rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--begin::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body fs-4">
                                            Verifikasi Data CIF {{ $datainfo->fullName }} ?
                                        </div>
                                        <!--end::Modal body-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Tidak</button>
                                            <input type="submit" name="verif" value="Ya" class="btn btn-success text-light ">
                                        </div>
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <div class="modal fade" id="rejectmodal" tabindex="-1" aria-hidden="true" role="dialog">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header pb-0 border-0 ">
                                            <!--begin::Close-->
                                            <h1 class="mb-3 text-start">Konfirmasi</h1>
                                            <div class="btn btn-sm btn-icon btn-active-color-primary right-0" data-bs-dismiss="modal">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                            rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--begin::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body fs-4">
                                            Tolak Data CIF {{ $datainfo->fullName }} ?
                                        </div>
                                        <!--end::Modal body-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Tidak</button>
                                            <input type="submit" name="reject" value="Ya" class="btn btn-success text-light ">
                                        </div>
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                        </form>
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
