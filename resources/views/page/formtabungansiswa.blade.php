@extends('index')
@extends('dashboard.layout.toolbar')
@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Tabungan Siswa')
@section('toolbartitle', 'Tabungan Siswa')

@section('content')

    <!--begin::Content wrapper-->
    <div id="kt_app_content" class="content d-flex flex-column flex-column-fluid">
        <!--begin::Content container-->

        <div id="kt_app_content_container" class="container-fluid">
            <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold mb-10">

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
                                <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Form Tabungan Siswa</span>
                                {{-- <span class="text-gray-400 fw-semibold fs-6"> Welcome {{ $profile->data->firstName }}</span> --}}
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <div id="kt_scrolltop" class="scrolltop mb-10" data-kt-scrolltop="true">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                <span class="svg-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2"
                                            rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path
                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                            <form action="{{ route('storetabungansiswa') }}" method="post">
                                @csrf
                                @method('post')

                                <div class="row">
                                    <div class="col-2">
                                        <div class="fs-6 fs-bold">
                                            <label for="nama">Nama</label> 
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" readonly class="form-control" name="nama"
                                            value="{{ $saving->data->cif->fullName }}">
                                        <input type="hidden" class="form-control" name="id"
                                            value="{{ $saving->data->id }}">
                                    </div>
                                    {{-- <div class="w-100 mb-3"></div>
                                    <div class="col-2">
                                        <div class="fs-6 fs-bold">
                                            <label for="nama">Account Number</label>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" readonly class="form-control" name="accountnumber"
                                            value="{{ $saving->data->accountNumber }}">

                                    </div> --}}
                                    <div class="w-100 mb-3"></div>
                                    
                                    <div class="col-2">
                                        <div class="fs-6 fs-bold">
                                            Nominal
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" placeholder="Nominal" class="form-control" name="nominal">
                                    </div>
                                    <div class="w-100 mb-3"></div>
                                    <div class="col-2">
                                        <div class="fs-6 fs-bold">
                                            Keterangan
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <textarea placeholder="Keterangan" class="form-control" name="keterangan" rows="4" cols="50"></textarea>

                                    </div>
                                </div>
                                <div class="w-100 mb-4"></div>
                                <div class="col-12">

                                    <div class="d-grid gap-2 mb-3">
                                        <button type="submit" class="btn btn-success" type="button">Kirim</button>
                                    </div>
                                </div>
                        </div>

                        </button>
                        </form>
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
@endsection
