@php
    // $side = json_decode(file_get_contents(public_path() . '/assets/menu.json'), true);
    
    // $datamenu = $side['data'][0]['menu'];
    // $menu = [];
    // $jumlah = count($datamenu);
    // $menuhitung = 0;
    
    // for ($i = 0; $i < $jumlah; $i++) {
    //     $menu[] = $datamenu[$i]['name'];
    //     // list($i) = $datamenu[$i]['name'];
    // }
    // // dd($datamenu[5]["hasChild"]);
    
    ///////////////////////////////////////////////
    $api = config('properties.api');
    $token = session()->get('token');
    $curl = curl_init();
    
    curl_setopt_array($curl, [
        CURLOPT_URL => $api . 'v1/appadmin/get-all-menu',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $token
        ],
    ]);
    
    $response = curl_exec($curl);
    $menu = json_decode($response);
    curl_close($curl);
    // dd($menu->data);
    // for ($i = 0; $i < $jumlah; $i++) {
    //     $menu[] = $datamenu[$i]['name'];
    //     list($i) = $datamenu[$i]['name'];
    // }
    
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6 mb-10" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ url('/dashboard') }}">
            <img alt="Logo" src="{{ asset('assets/media/tabersa/logo.png') }}"
                class="h-70px app-sidebar-logo-default mt-10 px-20" />
            <img alt="Logo" src="{{ asset('assets/media/tabersa/logodaunputih.png') }}"
                class="h-25px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                @foreach ($menu->data as $key => $menu)
                    <!--begin:Menu item-->
                    @if ($menu->hasChild == 1)
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion my-4">
                            <!--begin:Menu link-->
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <i class="{{ $menu->icon }}"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title text-light fw-bold">{{ $menu->name }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                @foreach ($menu->subMenu as $key => $submenu)
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="{{ route($submenu->url) }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span
                                                class="menu-title text-light fw-semibold">{{ $submenu->name}}</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                @endforeach
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    @else
                        <div class="menu-item menu-accordion my-4">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{ url($menu->url) }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <i class="{{ $menu->icon }}"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title text-light fw-bold">{{ $menu->name }}</span>
                                {{-- <span class="menu-arrow"></span> --}}
                            </a>
                            <!--end:Menu link-->
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    @endif
                @endforeach

            </div>
            <!--end:Menu item-->

            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <a id="kt_app_sidebar_footer" href="{{ route('out') }}"
        class=" app-sidebar-footer flex-column-auto pt-2 pb-6 px-6">
        @csrf
        {{-- <a href="javascript:;" onclick="parentNode.submit();"> --}}
        {{-- <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer"> --}}
        <div class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click">
            <span class="btn-label text-light">Logout</span>
            <span class="svg-icon btn-icon svg-icon-2 m-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#fff"
                        d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z" />
                </svg>
            </span>
        </div>
        {{-- </div> --}}
    </a>
</div>
