<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--end::Global Stylesheets Bundle-->
    <link rel="icon" href="{{ asset('assets/media/tabersa/logodaun.png') }}">
    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <title>Print CIF</title>
    <style type="text/css">
        * {
            font-size: 12px;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        }

        @media print {
            @page {
                margin-top: 0px;
            }

            body {
                -webkit-print-color-adjust: exact;
            }
        }

        span {
            font-weight: normal;
        }

        .none-border {
            border: 1px solid #fff;
        }

        .border {
            border: 1px solid #000;
        }

        .small-border {
            border: 1px solid #000;
            padding: 5px 15px;
        }

        .normal-border {
            border: 1px solid;
            padding: 3px 6px;
        }

        .normal-border-right {
            border-right: 1px solid;
            padding: 5px 15px;
        }

        .normal-border-left {
            border-left: 1px solid;
            padding: 5px 15px;
        }

        .normal-border-top {
            border-top: 1px solid;
            padding: 5px 15px;
        }

        .col-border {
            border-collapse: collapse;
        }

        .separate-border {
            border-style: double;
        }

        #bordercontainer {
            border: 1px solid #56cc5d;
            margin: -1px;
        }

        #borderleft {
            border-left: 1px solid #56cc5d;
        }
    </style>
</head>

<body>
    @php
        date_default_timezone_set('Asia/Jakarta');
    @endphp
    <div class="row d-flex flex-row align-items-center">
        <div class="col-8 mt-2">
            <div class="d-flex flex-row bd-highlight mb-3">
                <div class="p-2">
                    <img alt="Logo" src="{{ $bank->data->imageUrl }}" height="60px" width="auto" />
                </div>
                <div class="p-2 align-self-center">
                    <div class="col ">
                        <span style="font-size: 18px;font-weight: 700;">{{ $bank->data->bankName }}</span>
                    </div>
                    <div class="col ">
                        <span style="font-size: 13px;">
                            {{ $bank->data->address }},{{ $bank->data->subDistrict }},{{ $bank->data->district }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto mt-2" style="text-align: end">
            <div class="col ">
                <span style="font-size: 20px;font-weight: 800;">Formulir Rekening</span>
            </div>
            <div class="col ">
                <span style="font-size: 15px;font-weight: 800;">Perorangan</span>
            </div>
        </div>
    </div>
    <div class="row d-flex flex-row align-items-center fs-4" id="bordercontainer">
        <div class="col-8 py-3">
            Rekening di Bank {{ $bank->data->bankName }}
        </div>
        <div class="col-4 py-3" id="borderleft">
            CIF &nbsp; : &nbsp; {{ $dataspesifik->cifNumber }}
        </div>
    </div>
    <div class="d-flex flex-row mb-2">
        <div class="p-2">Anda telah / pernah memiliki rekening di bank {{ $bank->data->bankName }}&emsp;</div>
        @if ($saving[0]->accountNumber != null)
            <div class="p-2">
                <input type="checkbox" checked>&emsp; Ya &emsp;&emsp;
                <input type="checkbox">&emsp; Tidak &emsp;
            </div>
            <div class="p-2">
                Nomor Rekening : &emsp;{{ $saving[0]->accountNumber }}
            </div>
        @else
            <div class="p-2">
                <input type="checkbox">&emsp; Ya &emsp;&emsp;
                <input type="checkbox" checked>&emsp; Tidak &emsp;
            </div>
        @endif
    </div>
    <div style="text-align:start; width:40%; background:#56cc5d; ">
        <b style="font-size: 14px; color:white; padding-left: 10px;">DATA UMUM NASABAH PERORANGAN</b>
    </div>
    <table width=100% class="">
        <tr>
            <td class="text-start" width:40%>Nama </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10% colspan="4">{{ strtoupper($dataspesifik->fullName) }}</td>
        </tr>
        {{-- <tr>
            <td class="text-start" width:40%>Gelar didepan nama </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>{{ $dataspesifik->fullName }}</td>
            <td class="text-start" width:40%>Gelar dibelakang nama </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>{{ $dataspesifik->fullName }}</td>
        </tr> --}}
        <tr>
            <td class="text-start" width:40%>Tempat/Tanggal Lahir </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ strtoupper($dataspesifik->placeOfBirth) }}&nbsp;/&nbsp;{{ date('d - m - Y', strtotime(substr($datainfo->dateOfBirth, 0, 10))) }}
            </td>

            <td class="text-start" width:40%>Jenis Kelamin </td>
            @if ($datainfo->gender == '1')
                <td class="text-center" width:20%> : </td>
                <td class="text-start" width:10%><input type="checkbox" checked>&emsp; Laki-Laki &emsp;<input
                        type="checkbox">&emsp; Perempuan</td>
            @else
                <td class="text-center" width:20%> : </td>
                <td class="text-start" width:10%><input type="checkbox">&emsp; Laki-Laki &emsp;<input type="checkbox"
                        checked>&emsp; Perempuan</td>
            @endif
        </tr>
        <tr>
            <td class="text-start" width:40%>Alamat Sesuai KTP</td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10% colspan="4">
                {{ strtoupper($dataaddress->identityAddress) }},
                {{ strtoupper($dataaddress->identitySubDistrict) }},
                {{ strtoupper($dataaddress->identityDistrict) }},
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Alamat Sekarang</td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10% colspan="4">
                {{ strtoupper($dataaddress->residenceAddress) }},
                {{ strtoupper($dataaddress->residenceSubDistrict) }},
                {{ strtoupper($dataaddress->residenceDistrict) }},

            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Kota </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                @foreach ($city as $list)
                    @if ($dataaddress->identityCity == $list->value)
                        {{ strtoupper($list->label) }},
                    @endif
                @endforeach
            </td>

            <td class="text-start" width:40%>Kode Pos </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ $dataaddress->residenceZipCode }}
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Nomor Telepon </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ $dataspesifik->phoneNumber }}
            </td>

            <td class="text-start" width:40%>Nomor HP </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ $dataspesifik->mobileNumber }}
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Nomor Faksmili </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                -
            </td>

            <td class="text-start" width:40%>Alamat Email </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ $dataspesifik->emailAddress }}
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Nama Singkat </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ $dataspesifik->nickName }}
            </td>

            <td class="text-start" width:40%>Nomor NPWP </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ $dataspesifik->taxNumber }}
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Pihak yang dapat dihubungi </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{-- {{ $dataspesifik->nickName }} --}} -
            </td>

            <td class="text-start" width:40%>Nomor Telp </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{-- {{ $dataspesifik->taxNumber }} --}} -
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Pendidikan </td>
            <td class="text-center" width:20%> : </td>
            <td colspan="4" class="text-start" width:10%>
                <div class="row">
                    @foreach ($edu as $list)
                        <div class="col-3">
                            <input type="checkbox" <?php if ($dataoccupation->latestEducation == $list->value) {
                                echo 'checked';
                            } ?>>
                            &nbsp;{{ strtoupper($list->label) }} &emsp;
                        </div>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr></tr>
        <td class="text-start" width:40%>Pekerjaan </td>
        <td class="text-center" width:20%> : </td>
        <td colspan="4" class="text-start" width:10%>
            @foreach ($job as $list)
                @if ($dataoccupation->occupation == $list->value)
                    {{ strtoupper($list->label) }}
                @endif
            @endforeach
        </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Identitas </td>
            <td class="text-center" width:20%> : </td>
            <td colspan="4" class="text-start" width:10%>
                <div class="d-flex flex-row align-items-center">
                    @foreach ($type->data as $list)
                        <div class="col-2">
                            <input type="checkbox" <?php if ($dataspesifik->identityType == $list->value) {
                                echo 'checked';
                            } ?>>
                            &nbsp;{{ strtoupper($list->label) }} &emsp;
                        </div>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Nomor ID </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ $dataspesifik->identityNumber }}
            </td>

            <td class="text-start" width:40%>Berlaku s/d </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ date('d - m - Y', strtotime(substr($dataspesifik->identityExpiredDate, 0, 10))) }}
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Kewarganegaraan </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                <input type="checkbox" <?php if ($dataaddress->nationality == 'ID') {
                    echo 'checked';
                } ?>>
                &nbsp;WNI
            </td>
            <td class="text-start" width:10%>
                <input type="checkbox" <?php if ($dataaddress->nationality != 'ID') {
                    echo 'checked';
                } ?>>
                &nbsp;WNA, Negara
            </td>
            <td colspan="2" class="text-start" width:10%>
                @if ($dataaddress->nationality != 'ID')
                    @foreach ($nationality as $list)
                        @if ($dataaddress->nationality == $list->value)
                            {{ strtoupper($list->label) }},
                        @endif
                    @endforeach
                @else
                    _____________________________
                @endif
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Nama Asli Ibu Kandung </td>
            <td class="text-center" width:20%> : </td>
            <td colspan="4" class="text-start" width:10%>
                {{ $dataspesifik->motherMaidenName }}
            </td>
        </tr>
        @if ($dataspesifik->maritalStatus == '1')
            <tr>
                <td class="text-start" width:40%>Status Perkawinan </td>
                <td class="text-center" width:20%> : </td>
                <td colspan="4" class="text-start" width:10%>
                    <div class="d-flex flex-row align-items-center">
                        @foreach ($kawin as $list)
                            <div class="col-4">
                                <input type="checkbox" <?php if ($dataspesifik->maritalStatus == $list->value) {
                                    echo 'checked';
                                } ?>>
                                &nbsp;{{ strtoupper($list->label) }} &emsp;
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <div style="text-align:start; width:40%; background:#56cc5d; ">
                        <b style="font-size: 14px; color:white; padding-left: 10px;">DATA PASANGAN</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-start" width:40%>Nama Pasangan </td>
                <td class="text-center" width:20%> : </td>
                <td class="text-start" width:10%>
                    {{ $dataspouse->spouseName }}
                </td>

                <td class="text-start" width:40%>Jumlah Tanggungan </td>
                <td class="text-center" width:20%> : </td>
                <td class="text-start" width:10%>
                    {{ $dataspouse->numberOfDependant }}
                </td>
            </tr>
            <tr>
                <td class="text-start" width:40%>Identitas Pasangan</td>
                <td class="text-center" width:20%> : </td>
                <td colspan="4" class="text-start" width:10%>
                    <div class="d-flex flex-row align-items-center">
                        @foreach ($type->data as $list)
                            <div class="col-2">
                                <input type="checkbox" <?php if ($dataspouse->spouseIdentityType == $list->value) {
                                    echo 'checked';
                                } ?>>
                                &nbsp;{{ strtoupper($list->label) }} &emsp;
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-start" width:40%>Identitas </td>
                <td class="text-center" width:20%> : </td>
                <td class="text-start" width:10%>
                    {{ $dataspouse->spouseIdentityNumber }}
                </td>

                <td class="text-start" width:40%>Berlaku s/d </td>
                <td class="text-center" width:20%> : </td>
                <td class="text-start" width:10%>
                    {{ date('d - m - Y', strtotime(substr($dataspouse->spouseIdentityExpiredDate, 0, 10))) }}
                </td>
            </tr>
            <tr>
                <td class="text-start" width:40%>Tempat Lahir Pasangan </td>
                <td class="text-center" width:20%> : </td>
                <td class="text-start" width:10%>
                    {{ $dataspouse->spousePlaceOfBirth }}
                </td>

                <td class="text-start" width:40%>Tanggal Lahir Pasangan </td>
                <td class="text-center" width:20%> : </td>
                <td class="text-start" width:10%>
                    {{ date('d - m - Y', strtotime(substr($dataspouse->spouseDateOfBirth, 0, 10))) }}
                </td>
            </tr>
        @else
            <tr>
                <td class="text-start" width:40%>Status Perkawinan </td>
                <td class="text-center" width:20%> : </td>
                <td colspan="4" class="text-start" width:10%>
                    <div class="d-flex flex-row align-items-center">
                        @foreach ($kawin as $list)
                            <div class="col-4">
                                <input type="checkbox" <?php if ($dataspesifik->maritalStatus == $list->value) {
                                    echo 'checked';
                                } ?>>
                                &nbsp;{{ strtoupper($list->label) }} &emsp;
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
        @endif




    </table>
    <div style="text-align:start; width:80%; background:#56cc5d; ">
        <b style="font-size: 14px; color:white; padding-left: 10px;">KETERANGAN SUMBER DANA / PENGHASILAN DAN
            PENGGUNAAN</b>
    </div>
    <table width=100% class="">
        <tr>
            <td class="text-start" width:40%>Jabatan Pekerjaan </td>
            <td class="text-center" width:20%> : </td>
            <td colspan="4" class="text-start" width:10%>
                @foreach ($jabatan as $list)
                    <input type="checkbox" <?php if ($dataoccupation->jobPosition == $list->value) {
                        echo 'checked';
                    } ?>>
                    &nbsp;{{ strtoupper($list->label) }} &emsp;
                @endforeach
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Bidang Usaha </td>
            <td class="text-center" width:20%> : </td>
            <td colspan="4" class="text-start" width:10%>
                @foreach ($sector as $list)
                    @if ($dataoccupation->sectorOfIndustry == $list->value)
                        {{ strtoupper($list->label) }}
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="text-start" width:40%>Penghasilan Perbulan </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                @foreach ($gaji as $list)
                    @if ($dataoccupation->monthlyIncome == $list->value)
                        &nbsp;{{ strtoupper($list->label) }} &emsp;
                    @endif
                @endforeach
            </td>

            <td class="text-start" width:40%>Pengeluaran Perbulan </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                @foreach ($pengeluaran as $list)
                    @if ($dataoccupation->monthlySpending == $list->value)
                        &nbsp;{{ strtoupper($list->label) }} &emsp;
                    @endif
                @endforeach
            </td>
        </tr>

        <tr>
            <td class="text-start" width:40%>Sumber Dana </td>
            <td class="text-center" width:20%> : </td>
            <td colspan="4" class="text-start" width:10%>
                <div class="row">
                    @foreach ($dari as $list)
                        <div class="col-3">
                            <input type="checkbox" <?php if ($dataoccupation->sourceOfFund == $list->value) {
                                echo 'checked';
                            } ?>>
                            &nbsp;{{ strtoupper($list->label) }} &emsp;
                        </div>
                    @endforeach
                </div>
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Nama Kantor </td>
            <td class="text-center" width:20%> : </td>
            <td colspan="4" class="text-start" width:10%>
                {{ strtoupper($dataoccupation->companyName) }}
            </td>
        </tr>
        <tr>
            <td class="text-start" width:40%>Alamat Kantor </td>
            <td class="text-center" width:20%> : </td>
            <td colspan="4" class="text-start" width:10%>
                {{ strtoupper($dataoccupation->companyAddress) }},
                {{ strtoupper($dataoccupation->companySubDistrict) }},
                {{ strtoupper($dataoccupation->companyDistrict) }},
                @foreach ($city as $list)
                    @if ($dataoccupation->companyCity == $list->value)
                        {{ strtoupper($list->label) }},
                    @endif
                @endforeach
                @foreach ($province as $list)
                    @if ($dataoccupation->companyProvince == $list->value)
                        {{ strtoupper($list->label) }},
                    @endif
                @endforeach
                {{ strtoupper($dataoccupation->companyZipCode) }}
            </td>
        </tr>

        <tr>
            <td class="text-start" width:40%>Nomor Telepon Kantor </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{ $dataoccupation->companyPhoneNumber }}
            </td>

            <td class="text-start" width:40%>Nomor Fax Kantor </td>
            <td class="text-center" width:20%> : </td>
            <td class="text-start" width:10%>
                {{-- {{ $dataspesifik->taxNumber }} --}} -
            </td>
        </tr>
    </table>
    <div class="mb-1 mt-3" style="text-align:start; width:40%; background:#56cc5d; ">
        <b style="font-size: 14px; color:white; padding-left: 10px;">PERNYATAAN NASABAH</b>
    </div>
    <table width=100% class="">
        <tr>
            <td colspan="6" class="text-start" style="font-size: 9px">
                Dengan menandatangani aplikasi ini Saya/Kami menyatakan bahwa :
            </td>
        </tr>
        <tr>
            <td colspan="6" class="text-start" style="font-size: 9px">
                - semua informasi dalam formulir ini adalah lengkap dan benar. <br>
                - mengerti, menyetujui dan mentaati aturan Ketentuan Umum Produk Bank {{ $bank->data->bankName }}, dan
                ketentuan lainnya yang berlaku di Bank {{ $bank->data->bankName }} berikut perubahannya<br>
                - dokumen - dokumen yang Saya/Kami lampirkan adalah benar dan masih berlaku. Bilamana kelak terdapat
                perubahan, maka segera akan Saya/Kami lampirkan perubahannya. <br>
            </td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td width="60%">
                <table class="table-bordered" style="margin-left: 20px">
                    <tr>
                        <td colspan="3" class="text-center" style="background:#56cc5d;color:white; ">DIISI OLEH
                            BANK</td>
                    </tr>
                    <tr>
                        <td class="text-center" width="100px">Dibuat</td>
                        <td class="text-center" width="100px">Diperiksa</td>
                        <td class="text-center" width="100px">Disetujui</td>
                    </tr>
                    <tr>
                        <td class="text-center" width="100px" height="60px"></td>
                        <td class="text-center" width="100px" height="60px"></td>
                        <td class="text-center" width="100px" height="60px"></td>
                    </tr>
                </table>
            </td>
            <td class="text-center">
                <table class="">
                    <tr>
                        <td colspan="3" class="text-center">
                            @foreach ($city as $list)
                                @if ($dataaddress->identityCity == $list->value)
                                    {{ $list->label }},{{ date('d m Y') }}
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr height="60px">
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3" width="60px">
                            ________________________
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

<script>
    window.print();
    window.onafterprint = window.close;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
@php
    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = ['', 'Satu ', 'Dua ', 'Tiga ', 'Empat ', 'Lima ', 'Enam ', 'Tujuh ', 'Delapan ', 'Sembilan ', 'Sepuluh ', 'Sebelas '];
        $temp = '';
        if ($nilai < 12) {
            $temp = ' ' . $huruf[$nilai];
        } elseif ($nilai < 20) {
            $temp = penyebut($nilai - 10) . ' Belas';
        } elseif ($nilai < 100) {
            $temp = penyebut($nilai / 10) . 'Puluh' . penyebut($nilai % 10);
        } elseif ($nilai < 200) {
            $temp = ' Seratus' . penyebut($nilai - 100);
        } elseif ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . ' Ratus' . penyebut($nilai % 100);
        } elseif ($nilai < 2000) {
            $temp = ' Seribu' . penyebut($nilai - 1000);
        } elseif ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . ' Ribu' . penyebut($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . ' Juta' . penyebut($nilai % 1000000);
        } elseif ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . ' Milyar' . penyebut(fmod($nilai, 1000000000));
        } elseif ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . ' Trilyun' . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }
    
    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = 'Minus ' . trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }
@endphp

</html>
