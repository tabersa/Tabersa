@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Customer Information Page')
@section('toolbartitle', 'Customer Information Page')
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
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Customer Information Page</span>
                                <span class="text-gray-400 fw-semibold fs-6">Periksa Informasi Customer Anda Disini</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-6">
                        
                            <form>
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
                                            <input type="text" id="form6Example1" class="form-control" value="{{ $datainfo->cifNumber }}" />
                                        </div>

                                        <!-- Text input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example3">Nama Lengkap</label>
                                            <input type="text" id="form6Example3" class="form-control" />
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">NIK</label>
                                                    <input type="text" id="form6Example1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Tanggal Kadaluarsa</label>
                                                    <input type="date" id="form6Example2" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Radio input -->
                                        <div class="row mb-8">
                                            <label class="form-label mb-4" for="form6Example1">Jenis Kelamin <br></label>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Laki-Laki
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1">
                                                    <label class="form-check-label" for="flexRadioDefault1">
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
                                                    <input type="text" id="form6Example1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Tanggal Lahir</label>
                                                    <input type="date" id="form6Example2" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- nama -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Nama Ibu kandung</label>
                                            <input type="text" id="form6Example1" class="form-control" />
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
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckDefault">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Alamat
                                                    Identitas sama dengan domisili</label>
                                            </div>
                                        </div>

                                        <!-- Message input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form6Example7">Alamat Lengkap</label>
                                            <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Desa / Kelurahan</label>
                                                    <input type="text" id="form6Example1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Kecamatan</label>
                                                    <input type="text" id="form6Example2" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Kabupaten / Kota</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Piih</option>
                                                        <option value="1">Wilayah Kota Jakarta Utara</option>
                                                        <option value="2">Wilayah Kota Jakarta Barat</option>
                                                        <option value="3">Wilayah Kota Jakarta Selatan</option>
                                                        <option value="4">Wilayah Kota Jakarta Pusat</option>
                                                        <option value="5">Wilayah Kota Jakarta Timur</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Provinsi</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="1">Jakarta</option>
                                                        <option value="2">Banten</option>
                                                        <option value="3">Jawa Barat</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- nama -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Kode Pos</label>
                                            <input type="text" id="form6Example1" class="form-control" />
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
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="1">Guru</option>
                                                        <option value="2">Pengangguran</option>
                                                        <option value="3">Lain Lain</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Bidang Usaha</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Pilih </option>
                                                        <option value="1">Swasta</option>
                                                        <option value="2">Negeri</option>
                                                        <option value="3">Belum Jelas</option>
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
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="1">0 - 5 Juta</option>
                                                        <option value="2">5 - 10 Juta</option>
                                                        <option value="3">10 - 15 Juta</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Pengeluaran
                                                        Perbulan</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="1">0 - 5 Juta</option>
                                                        <option value="2">5 - 10 Juta</option>
                                                        <option value="3">10 - 15 Juta</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- nama -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form6Example1">Sumber Dana</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected disabled>Pilih</option>
                                                <option value="1">Penghasilan</option>
                                                <option value="2">Orang Tua</option>
                                                <option value="3">Tabungan</option>
                                            </select>
                                        </div>

                                        <!-- nama -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Nama Kantor</label>
                                            <input type="text" id="form6Example1" class="form-control" />
                                        </div>

                                        <!-- nama -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Jabatan</label>
                                            <input type="text" id="form6Example1" class="form-control" />
                                        </div>

                                        <!-- nama -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Telepon Kantor</label>
                                            <input type="text" id="form6Example1" class="form-control" />
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
                                            <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Desa / Kelurahan</label>
                                                    <input type="text" id="form6Example1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Kecamatan</label>
                                                    <input type="text" id="form6Example2" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Kabupaten / Kota</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Piih</option>
                                                        <option value="1">Wilayah Kota Jakarta Utara</option>
                                                        <option value="2">Wilayah Kota Jakarta Barat</option>
                                                        <option value="3">Wilayah Kota Jakarta Selatan</option>
                                                        <option value="4">Wilayah Kota Jakarta Pusat</option>
                                                        <option value="5">Wilayah Kota Jakarta Timur</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Provinsi</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected disabled>Pilih</option>
                                                        <option value="1">Jakarta</option>
                                                        <option value="2">Banten</option>
                                                        <option value="3">Jawa Barat</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- nama -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Kode Pos</label>
                                            <input type="text" id="form6Example1" class="form-control" />
                                        </div>

                                    </div>
                                    <div class="col mx-4">

                                        <div class="form-outline mb-4 pt-20 mt-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Pendidikan Terakhir</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected disabled>Piih</option>
                                                    <option value="1"> SD / SMP / SMA </option>
                                                    <option value="2">D3</option>
                                                    <option value="3">S1</option>
                                                    <option value="4">S2</option>
                                                    <option value="5">S3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Telepon</label>
                                                    <input type="text" id="form6Example1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Handphone</label>
                                                    <input type="text" id="form6Example2" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Email</label>
                                            <input type="text" id="form6Example1" class="form-control" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">NPWP</label>
                                            <input type="text" id="form6Example1" class="form-control" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Negara</label>
                                            <input type="text" id="form6Example1" class="form-control" />
                                        </div>


                                        {{-- ALAMAT IDENTITAS --}}

                                        <div class="form-outline mb-4 mt-20 pt-8">

                                            <h4 class="card-title align-items-start flex-column">
                                                <span class="fs-2 fw-bold text-gray-800 mb-10"><br>Alamat Identitas</span>
                                                <hr>
                                            </h4>

                                        </div>

                                        <div class="form-outline mb-4 pt-20 mt-3">
                                            <div class="form-outline">
                                                <label class="form-label" for="form6Example1">Status Perkawinan</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected disabled>Piih</option>
                                                    <option value="1"> Belum Kawin </option>
                                                    <option value="2"> Kawin </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Nama</label>
                                            <input type="text" id="form6Example1" class="form-control" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Jumlah
                                                Tanggungan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Identitas</label>
                                                    <select class="form-select" aria-label="Default select example">
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
                                                    <label class="form-label fw-bold" for="form6Example1">Nama</label>
                                                    <input type="text" id="form6Example1" class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="form6Example1">Tanggal
                                                Kadaluarsa</label>
                                            <input type="date" id="form6Example1" class="form-control" />
                                        </div>

                                        <!-- Text input -->
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example1">Tempat Lahir</label>
                                                    <input type="text" id="form6Example1" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form6Example2">Tanggal Lahir</label>
                                                    <input type="date" id="form6Example2" class="form-control" />
                                                </div>
                                            </div>
                                        </div>



                                        {{-- ///////////////// --}}
                                    </div>
                                </div>
                            <div class="d-flex flex-row-reverse mt-10">
                                <!-- Submit button -->
                                <hr>
                                <button type="submit" class="btn btn-success text-light mb-2 p-5 mx-2">Verified</button>
                                <button type="submit" class="btn btn-danger text-light mb-2 p-5 mx-2">Reject</button>
                                <button type="submit" class="btn btn-secondary mb-2 p-5 mx-2 ">Kembali</button>
                            </div>
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
