<style>
    .pull-left{float:left!important;}
    .pull-right{float:right!important;}
    
</style>

<script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-theme-mode");
        } else {
            if (localStorage.getItem("data-theme") !== null) {
                themeMode = localStorage.getItem("data-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-theme", themeMode);
    }
</script>
<script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-theme-mode");
        } else {
            if (localStorage.getItem("data-theme") !== null) {
                themeMode = localStorage.getItem("data-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-theme", themeMode);
    }
</script>
<script>
    var hostUrl = {{ asset('assets/') }};
</script>
<!--begin::Javascript-->
<script>
    var hostUrl = "assets/";
</script>

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/b-print-2.3.3/date-1.2.0/kt-2.8.0/r-2.4.0/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/datatables.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/b-print-2.3.3/date-1.2.0/kt-2.8.0/r-2.4.0/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/datatables.js"></script> --}}

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/index.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/xy.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/percent.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/radar.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/map.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/themes/Animated.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/geodata/worldLow.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/geodata/continentsLow.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/geodata/usaLow.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js') }}"></script>
<script src="{{ asset('https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}"></script> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/b-2.3.3/b-print-2.3.3/date-1.2.0/kt-2.8.0/r-2.4.0/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/b-2.3.3/b-print-2.3.3/date-1.2.0/kt-2.8.0/r-2.4.0/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/datatables.min.js"></script>


<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->