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
        <div id="kt_app_content_container" class="app-container container-xxl shadow p-3 mb-5 bg-white rounded">
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

                                            <div class="col">
                                                <div class="form-outline">
                                                    <input disabled class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault1" <?php if ($datainfo->gender == '1') {
                                                            echo 'checked="checked"';
                                                        } ?>>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Laki-Laki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input disabled class="form-check-input" type="radio"
                                                        name="flexRadioDefault" id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1"
                                                        <?php if ($datainfo->gender == '2') {
                                                            echo 'checked="checked"';
                                                        } ?>>
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Tempat Lahir</label>
                                                    <input disabled type="text" id="form6Example1" class="form-control"
                                                        value="{{ $datainfo->placeOfBirth }}" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Tanggal Lahir</label>
                                                    <input disabled type="date" id="form6Example2" class="form-control"
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

                                        <!-- switch -->
                                        <div class="form-outline my-10">
                                            <div class="form-check form-switch">
                                                <input disabled class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Alamat
                                                    Identitas sama dengan domisili</label>
                                            </div>
                                        </div>

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

                                            <h4 class="card-title align-items-start flex-column pt-10 mb-20">
                                                <span class="fs-2 fw-bold text-gray-800 mb-10"><br>Alamat Domisili</span>
                                                <hr>
                                            </h4>

                                        </div>


                                        <!-- Message input -->
                                        <div class="form-outline mb-4 pt-5">
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
                                                <select disabled class="form-select" aria-label="Default select example">
                                                    <option selected disabled>Piih</option>
                                                    @foreach ($kawin as $list)
                                                        <option value="{{ $list->value }}" <?php if ($datainfo->maritalStatus == $list->value) {
                                                            echo 'selected="selected"';
                                                        } ?>>
                                                            {{ $list->label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Nama</label>
                                            <input disabled type="text" id="form6Example1" class="form-control"
                                                value="{{ $dataspouse->spouseName }}" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Jumlah
                                                Tanggungan</label>
                                            <div class="input-group mb-3">
                                                <input disabled type="text" class="form-control" placeholder=""
                                                    value="{{ $dataspouse->numberOfDependant }}">
                                            </div>
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Identitas</label>
                                                    <select disabled class="form-select"
                                                        aria-label="Default select example">
                                                        <option selected disabled>Piih</option>
                                                        <option value="1">KTP</option>
                                                        <option value="2">SIM</option>
                                                        <option value="3">VISA</option>
                                                        <option value="4">PASPORT</option>
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
                                            <input disabled type="date" id="form6Example1" class="form-control"
                                                value="{{ date('Y-m-d', strtotime(substr($dataspouse->spouseIdentityExpiredDate, 0, 10))) }}" />
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Tempat Lahir</label>
                                                    <input disabled type="text" id="form6Example1"
                                                        class="form-control"
                                                        value="{{ $dataspouse->spousePlaceOfBirth }}" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Tanggal Lahir</label>
                                                    <input disabled type="date" id="form6Example2"
                                                        class="form-control"
                                                        value="{{ date('Y-m-d', strtotime(substr($dataspouse->spouseDateOfBirth, 0, 10))) }}" />
                                                </div>
                                            </div>
                                        </div>



                                        {{-- ///////////////// --}}
                                    </div>
                                </div>
                                @if ($newdata->status != 1 && $newdata->status != 2)
                                    <div class="d-flex flex-row-reverse mt-10">
                                        <!-- Submit button -->
                                        <hr>
                                        <input name="verif" type="submit"
                                            class="btn btn-success text-light mb-2 p-5 mx-2" value="Verified">
                                        <input name="reject "type="submit"
                                            class="btn btn-danger text-light mb-2 p-5 mx-2" value="Reject">

                                        <input type="button" class="btn btn-secondary mb-2 p-5 mx-2 " value="Kembali"
                                            onclick="history.back();">
                                    </div>
                                @else
                                    <div class="d-flex flex-row-reverse mt-10">
                                        <!-- Submit button -->
                                        <hr>

                                        <input type="button" onclick="history.back();"
                                            class="btn btn-secondary mb-2 p-5 mx-2 " value="Kembali">
                                    </div>
                                @endif

                            </form>

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
