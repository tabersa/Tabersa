@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Sinkronisasi')
@section('toolbartitle', 'Sinkronisasi')

@section('content')

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
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Sinkronisasi</span>
                            <span class="text-gray-400 fw-semibold fs-6">Sinkronisasi Akun Anda Disini</span>
                        </h3>
                        <!--end::Title-->

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Input group-->
                        <div class="row pl-2">
                            <!--begin::Title-->
                            <span class="row fs-4 fw-bold text-gray-800"><br>Download Template</span>
                            <span class="row text-gray-400 fw-semibold fs-6 mb-8">Download template Anda pilih dan ubah detail
                                sebelum di upload</span>
                            <!--end::Title-->
                            <div class=" col px-8 fv-row mb-2">
                                <!--begin::Dropzone-->
                                <label class="custom-file-upload">
                                    <input type="file" />
                                    <div class="svg">
                                        <svg height="50px" width="auto" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                        </svg>
                                    </div>
                                    <br>
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="p-2 fs-4 text-center">
                                            <b>Download Template</b><br>
                                            Tabungan
                                        </span>
                                    </div>
                                </label>
                                <!--end::Dropzone-->
                            </div>
                            <div class=" col px-8 fv-row mb-2">
                                <!--begin::Dropzone-->
                                <label class="custom-file-upload">
                                    <input type="file" />
                                    <div class="svg">
                                        <svg height="50px" width="auto" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                        </svg>
                                    </div>
                                    <br>
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="p-2 fs-4 text-center">
                                            <b>Download Template</b><br>
                                            Tabungan
                                        </span>
                                    </div>
                                </label>
                                <!--end::Dropzone-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row pl-2">
                            <!--begin::Title-->
                            <span class="row fs-4 fw-bold text-gray-800"><br>Upload Data</span>
                            <span class="row text-gray-400 fw-semibold fs-6 mb-8">Upload data template yang telah Anda ubah di
                                bawah ini</span>
                            <!--end::Title-->
                            <div class=" col px-8 fv-row mb-2">
                                <!--begin::Dropzone-->
                                <label class="custom-file-upload">
                                    <input type="file" />
                                    <div class="svg">
                                        <svg height="50px" width="auto" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 3 448 512">
                                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                                        </svg>
                                    </div>
                                    <br>
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="p-2 fs-4 text-center">
                                            <b>Upload Data</b><br>
                                            Tabungan
                                        </span>
                                    </div>
                                </label>
                                <!--end::Dropzone-->
                            </div>
                            <div class=" col px-8 fv-row mb-2">
                                <!--begin::Dropzone-->
                                <label class="custom-file-upload">
                                    <input type="file" />
                                    <div class="svg">
                                        <svg height="50px" width="auto" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 3 448 512">
                                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                            <path
                                                d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z" />
                                        </svg>
                                    </div>
                                    <br>
                                    <div class="d-flex flex-column justify-content-center">
                                        <span class="p-2 fs-4 text-center">
                                            <b>Upload Data</b><br>
                                            Informasi Nasabah
                                        </span>
                                    </div>
                                </label>
                                <!--end::Dropzone-->
                            </div>
                        </div>
                        <!--end::Input group-->
    
                        
                    </div>
                    <!--end: Card Body-->
                    <div class="card-footer border-top p-9">
                        <div class="d-flex flex-row-reverse my-10">
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-success">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
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

    <style>
        input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            align-self: center;
            border: 1px solid #ccc;
            display: inline-block;
            padding: 30px 50px;
            cursor: pointer;
            width: 500px;
            height: 200px;
            border-radius: 10px;
        }

        .tombol {
            background-color: #0a0a23;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 80px auto;
            min-height: 30px;
            min-width: 120px;
        }
    </style>


    <script>
        var fileobj;
        $(document).ready(function() {
            $("#drop_zone").on("dragover", function(event) {
                event.preventDefault();
                event.stopPropagation();
                return false;
            });
            $("#drop_zone").on("drop", function(event) {
                event.preventDefault();
                event.stopPropagation();
                fileobj = event.originalEvent.dataTransfer.files[0];
                var fname = fileobj.name;
                var fsize = fileobj.size;
                if (fname.length > 0) {
                    document.getElementById('file_info').innerHTML = "File name : " + fname +
                        ' <br>File size : ' + bytesToSize(fsize);
                }
                document.getElementById('selectfile').files[0] = fileobj;
                document.getElementById('btn_upload').style.display = "inline";
            });
            $('#btn_file_pick').click(function() {
                /*normal file pick*/
                document.getElementById('selectfile').click();
                document.getElementById('selectfile').onchange = function() {
                    fileobj = document.getElementById('selectfile').files[0];
                    var fname = fileobj.name;
                    var fsize = fileobj.size;
                    if (fname.length > 0) {
                        document.getElementById('file_info').innerHTML = "File name : " + fname +
                            ' <br>File size : ' + bytesToSize(fsize);
                    }
                    document.getElementById('btn_upload').style.display = "inline";
                };
            });
            $('#btn_upload').click(function() {
                if (fileobj == "" || fileobj == null) {
                    alert("Please select a file");
                    return false;
                } else {
                    ajax_file_upload(fileobj);
                }
            });
        });

        function ajax_file_upload(file_obj) {
            if (file_obj != undefined) {
                var form_data = new FormData();
                form_data.append('upload_file', file_obj);
                $.ajax({
                    type: 'POST',
                    url: 'upload.php',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    beforeSend: function(response) {
                        $('#message_info').html("Uploading your file, please wait...");
                    },
                    success: function(response) {
                        $('#message_info').html(response);
                        alert(response);
                        $('#selectfile').val('');
                    }
                });
            }
        }

        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
    </script>

@endsection
