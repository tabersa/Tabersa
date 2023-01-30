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
    <title>Data Transaksi Tabersa</title>
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
        date_default_timezone_set('Asia/Jakarta');
        function masking($string)
        {
            if (!$string) {
                return null;
            }
            $length = strlen($string);
            $visibleCount = (int) round($length / 4);
            $hiddenCount = $length - $visibleCount * 2;
            return substr($string, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($string, $visibleCount * -1, $visibleCount);
        }
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
        <table class="table table-responsive table-striped align-content-center">
            <thead class="fw-bold" style="background-color: #54cc58; color: #fff">
                <tr>
                    <th>Tanggal</th>
                    <th>Detail</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($datasearch->data as $data)
                    <td colspan="4" class="text-start fw-bold">
                        {{ date('d  F  Y', strtotime(substr($data->date, 0, 10))) }}</td>
                    @foreach ($data->transaction as $datatransaksi)
                        <tr>
                            <td class="text-center align-middle">{{ substr($datatransaksi->transactionDate, 11, 8) }}</td>
                            <td class="text-start align-middle">
                                <p>
                                    {{ $datatransaksi->transactionGroupName }}
                                </p>
                                <p>
                                    {{ masking($datatransaksi->account) }} &nbsp; | &nbsp;
                                    {{ $datatransaksi->accountName }}
                                </p>
                            </td>
                            <td class="text-start align-middle">
                                {{ $datatransaksi->description }}
                            </td>
                        @if ($datatransaksi->dc == 'C')
                            <td class="text-end align-middle">
                                - Rp . {{ number_format($datatransaksi->amount, 0, ',', '.') }}
                            </td>
                            <!--end::Amount=-->
                        @else
                            <!--begin::Amount=-->
                            <td class="text-end">
                                + Rp . {{ number_format($datatransaksi->amount, 0, ',', '.') }}
                            </td>
                    @endif
                    </tr>
                @endforeach

            @empty

                @endforelse


            </tbody>
        </table>
    </div>
    <!--begin::Table-->
    {{-- <table class="tableprint">
        <!--begin::Table head-->
        <thead class="thead">
            <!--begin::Table row-->
            <tr class="text-start fw-bold text-uppercase gs-0">
                <th class="min-w-10px">#</th>
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
            @php
                $i = 0;
            @endphp
            @forelse ($datadetail as $detail)
                <tr>
                    <td>
                        @php
                            $i++;
                        @endphp
                        {{ $i }}
                    </td>
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
    </table> --}}
    <!--end::Table-->

</body>

<script>
    window.print();
    window.onafterprint = window.close;
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
