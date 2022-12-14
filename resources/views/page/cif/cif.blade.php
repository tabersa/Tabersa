@extends('index')
@extends('dashboard.layout.toolbar')

@extends('dashboard.layout.headhtml')

@section('title', 'Tabersa | Customer Information Page')
@section('toolbartitle', 'Customer Information Page')
@section('content')

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Header-->
                <div class="card-header">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fs-1 fw-bold text-gray-800 mb-4"><br>Customer Information Page</span>
                        <span class="text-gray-400 fw-semibold fs-6 divider">Periksa Data Customer Anda Disini</span>
                    </h3>
                    <!--end::Title-->

                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 table-cif">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start fw-bold fs-7 text-uppercase gs-0">

                                <th class="min-w-125px ">NASABAH</th>
                                <th class="min-w-125px">TANGGAL REGISTER</th>
                                <th class="min-w-125px">IDENTITAS</th>
                                <th class="min-w-125px">NO. SELULER</th>
                                <th class="min-w-125px">EMAIL</th>
                                <th class="text-center min-w-100px">STATUS</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold">
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}"
                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}"
                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="#"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Donny
                                            Geraldine</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00091</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">1149491941941941</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>0878122233</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>dony@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-light-success fs-7 fw-bold py-3 px-8"
                                        style="color: #54CC58">Verified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                            <!--begin::Table row-->
                            <tr>

                                <!--begin::User=-->
                                <td class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light">
                                                <img src="assets/media/svg/avatars/001-boy.svg"
                                                    class="h-75 align-self-end" alt="" />
                                            </span>
                                        </div>

                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::User details-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ url('infocif') }}" class="text-dark fw-bold text-hover-primary mb-1 fs-6">Mario
                                            Jackvin</a>
                                        <span class="text-dark fw-semibold d-block fs-7">CIF ID 00211</span>

                                    </div>
                                    <!--begin::User details-->
                                </td>
                                <!--end::User=-->
                                <!--begin::tgl regist=-->
                                <td>16 Jan 2022, 15:00</td>
                                <!--end::tgl regist=-->
                                <!--begin::identitas=-->
                                <td>
                                    <a href="{{ url('infocif') }}"
                                        class="text-dark fw-bold text-hover-primary d-block mb-1 fs-4">KTP</a>
                                    <span class="d-block fs-7">12039103910293019310</span>
                                </td>
                                <!--end::identitas=-->
                                <!--begin::no.seluler=-->
                                <td>082121213131</td>
                                <!--end::no.seluler=-->
                                <!--begin::email-->
                                <td>Marmario@gmail.com</td>
                                <!--begin::email-->
                                <!--begin::Action=-->
                                <td class="text-center">
                                    <span class="badge badge-secondary fs-7 fw-bold py-3 px-6"
                                        style="color: #808A82">Unverified</span>
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.table-cif').DataTable({
                "dom": "< <'pull-left'f><t><' row'<'col col-lg-2 py-3'i><'col-md-auto'l><'col'p>> >"
            });
        });
    </script>



    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used by this page)-->
    {{-- <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="assets/js/custom/apps/user-management/users/list/table.js"></script>
    <script src="assets/js/custom/apps/user-management/users/list/export-users.js"></script>
    <script src="assets/js/custom/apps/user-management/users/list/add.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
@endsection
