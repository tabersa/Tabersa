<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Kartu Saving</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Source Sans Pro', sans-serif;
        }

        .main {
            /* background-color: #D7D7D7;
            width: 100vw;
            height: 100vh; */
            display:inline-flex;
            justify-content: center;
            align-items: center; 
        }

        .card {
            width: 500px;
            height: 250px;
            /* background-image: url("{{ asset('assets/media/tabersa/KARTU TABERSA BLKG.jpg') }}"); */
            background: #58cc5c;
            border-color: #000000;
            /* box-shadow: rgba(0, 0, 0, 0) 0px 20px 25px -5px, rgba(0, 0, 0, 0.0) 0px 10px 10px -5px; */
            display: flex;
            /* border-radius: 10px; */
        }

        .card2 {
            width: 500px;
            height: 250px;
            background-image: url(asset('assets/media/tabersa/KARTU TABERSA BLKG.jpg'))
            /* background: #58cc5c; */
            border-color: #000000;
            /* box-shadow: rgba(0, 0, 0, 0) 0px 20px 25px -5px, rgba(0, 0, 0, 0.0) 0px 10px 10px -5px; */
            display: flex;
            /* border-radius: 10px; */
        }

        .img-holder {
            min-width: 350px;
            height: 100%;
            overflow: hidden;
        }

        .img1 {
            width: 100%;
            height: 100%;
            object-fit:contain;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            transition: transform 0.5s ease-in-out;
        }

        .img2 {
            width: 100%;
            height: 100%;
            object-fit:contain;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            transition: transform 0.5s ease-in-out;
        }


        .content {
            padding: 25px 20px;
            transition-property: transform;
            animation-name: joes;
            animation-duration: 0.5s;
            animation-timing-function: ease-in-out;
        }

        @keyframes joes {
            from {
                transform: translateX(-20px);
            }

            to {
                transform: translateX(0px);
            }
        }

        .title {
            color: #66656a;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: underline;
            text-underline-offset: 5px;
            text-decoration-color: #ecebf3;
        }

        .content h3 {
            color: #FF4E8A;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .content p {
            color: #7F7E84;
            line-height: 25px;
        }

        .footer {
            color: #66656a;
            display: block;
            margin-top: 20px;
            height: 50px;
            line-height: 50px;
            border-top: 1px solid #ecebf3;
        }
    </style>
    <div class="main">
        <div class="card">
            <img class="img1" src="{{ asset('assets/media/tabersa/KARTU TABERSA DEPAN.jpg') }}" alt="logo" style="position: absolute; object-fit: fill">
            {{--<div class="img-holder">
            </div>
            <img class="img2" src="{{ asset('assets/media/tabersa/logoborder.png') }}" >--}}
            <span class="fs-1 fw-bolder text-dark text-center" style="position: absolute;margin-left: 20px;margin-top: 20px;" >
                Kartu Tabungan
            </span> 
            <table style="position: absolute;margin-left: 20px;margin-top: 120px;font-size: 14px" >
                <tbody>
                    <tr>
                        {{-- <td class=" text-dark text-start" >Nama</td>
                        <td class=" text-dark text-center" >&emsp13; : &emsp13;</td> --}}
                        <td class="fs-3 text-dark text-start" >{{ $saving->data->cif->fullName }}</td>
                    </tr>
                    <tr>
                        {{-- <td class=" text-dark text-start" >Nomor Tabungan</td>
                        <td class=" text-dark text-center" >&emsp13; : &emsp13;</td> --}}
                        <td class="fs-7 text-dark text-start" >{{ $saving->data->accountNumber }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- <span class=" text-dark text-center" style="position: absolute;margin-left: 20px;margin-top: 120px;" >
                Nama &emsp14; : &nbsp; Han 
            </span> 
            <span class=" text-dark text-center" style="position: absolute;margin-left: 20px;margin-top: 140px;" >
                Nomor Tabungan &nbsp; : &nbsp; xxxxx-xxxxx-xxxxx-xxxxx 
            </span>  --}}
            
            
            <div style="position: absolute; right: 0; bottom:3; margin-bottom:10px;margin-right: 10px">
                {!! QrCode::size(60)->generate( $saving->data->id ) !!}
            </div>
            <div class="content">
            </div>
        </div>
        <div class="mx-3"></div>
        <div class="card">
            <img class="img1" src="{{ asset('assets/media/tabersa/KARTU TABERSA BLKG.jpg') }}" alt="logo" style="position: absolute; object-fit: fill">
            {{--<div class="img-holder">
            </div>
            <img class="img2" src="{{ asset('assets/media/tabersa/logoborder.png') }}" >
            <span class="fs-1 fw-bolder text-light text-center" >
                TABERSA
            </span> --}}
            <div style="position: absolute; right: 0; bottom:3; margin-bottom:10px;margin-right: 10px">
                {{-- {!! QrCode::size(60)->generate('e1be0000-3e01-0016-e556-08da5db94c0d') !!} --}}
            </div>
            <div class="content">
            </div>
        </div>
        
    </div>
</body>



<script>
    window.print();
    window.onafterprint = window.close;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>
