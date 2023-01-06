<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link rel="icon" href="{{ asset('assets/media/tabersa/logodaun.png') }}">
    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <title>Mutasi Tabersa</title>
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
    </style>
</head>

<body>
    @php
        date_default_timezone_set("Asia/Jakarta");
    @endphp
    <div class="row mt-20">
        <div class="col-8">
            <img alt="Logo" src="{{ asset('assets/media/tabersa/logohorizontal.png') }}" height="130px"
                width="430px" />
        </div>
        <div class="col-auto mt-20 end-0 fs-6">
            <div class="col ">
                <span><b>Tanggal &emsp;:</b> <?php echo date('l, d-m-Y '); ?></span>
            </div>
            <div class="col ">
                <span><b>Pukul &emsp;&emsp;:</b> <?php echo date('H:i:s'); ?></span>
            </div>
        </div>
    </div>

    <div class="mt-10">
        <table class="table">
            <tbody>
                <tr>
                    <td class="text-start">
                        Id
                    </td>
                    <td>
                        :
                    </td>
                    <td  class="text-start">
                        {{ $datacif->cifNumber }} - {{ $datacif->fullName }}
                    </td>
                    <td class="text-start">
                        Tanggal
                    </td>
                    <td>
                        :
                    </td>
                    <td  class="text-start">
                        {{ date('d - F - Y', strtotime(substr($datainfo->transactionDate, 0, 10))) }}
                    </td>
                </tr>
                <tr>
                    <td class="text-start">
                        Nomor
                    </td>
                    <td>
                        :
                    </td>
                    <td  class="text-start">
                        {{ $datainfo->id }}
                    </td>
                    <td class="text-start">
                        Dok
                    </td>
                    <td>
                        :
                    </td>
                    <td  class="text-start">
                        {{ $datainfo->invoiceNumber }}
                    </td>
                </tr>
                <tr>
                    <td class="text-start">
                        Uang Sejumlah
                    </td>
                    <td>
                        :
                    </td>
                    <td  class="text-start" colspan="4">
                        Rp . {{ number_format($datainfo->totalAmount, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td class="text-start">
                        Terbilang
                    </td>
                    <td>
                        :
                    </td>
                    <td class="text-start" colspan="4">
                        {{ terbilang($datainfo->totalAmount,)}} Rupiah
                    </td>
                </tr>
                <tr>
                    <td class="text-start">
                        Untuk Keperluan
                    </td>
                    <td>
                        :
                    </td>
                    <td  class="text-start" colspan="4">
                        {{$datainfo->description}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--begin::Table-->
    <table class="tableprint">
        <!--begin::Table head-->
        <thead class="thead">
            <!--begin::Table row-->
            <tr class="text-start fw-bold text-uppercase gs-0">
                <th class="min-w-200px">Account</th>
                <th class="min-w-200px">Debit</th>
                <th class="min-w-200px">Kredit</th>
                <th class="min-w-250px">Keterangan</th>

            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="fs-6">
            <!--begin::Table row-->
            @forelse ($datadetail as $detail)
                <tr>

                    <!--begin::order=-->
                    <td>
                        {{ $detail->account }}
                    </td>
                    <!--end::order=-->
                    <!--begin::Amount=-->
                    @if ($detail->dc == 'C')
                        <td>
                            Rp . {{ number_format($detail->amount, 0, ',', '.') }}
                        </td>
                        <!--end::Amount=-->
                        <!--begin::Amount=-->
                        <td> - </td>
                    @else
                        <td>
                            -
                        </td>
                        <!--end::Amount=-->
                        <!--begin::Amount=-->
                        <td>
                            Rp . {{ number_format($detail->amount, 0, ',', '.') }}
                        </td>
                    @endif

                    <!--end::Amount=-->
                    <!--begin::Status=-->
                    <td>
                        {{ $detail->description }}
                        
                    </td>
                    <!--end::Status=-->

                </tr>
            @empty
                <span>Tidak Ada Transaksi</span>
            @endforelse
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->

</body>

<script>
    window.onafterprint = window.close;
    window.print();
</script>
@php
    function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu ", "Dua ", "Tiga ", "Empat ", "Lima ", "Enam ", "Tujuh ", "Delapan ", "Sembilan ", "Sepuluh ", "Sebelas ");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)."Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "Minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
@endphp

</html>
