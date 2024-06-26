<!doctype html>
<html class="no-js " lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" href="{{ dsld_uploaded_file_path(dsld_get_setting('dashboard_fav_icon')) }}" />

        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/charts-c3/plugin.css') }}"/>
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/sweetalert/sweetalert.css') }}"/>
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/dropify/css/dropify.min.css') }}">
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/morrisjs/morris.min.css') }}" />
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/summernote/dist/summernote.css') }}">
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}">
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/multi-select/css/multi-select.css') }}">
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/plugins/select2/select2.css') }}">
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ dsld_static_asset('backend/assets/css/style.min.css') }}">
        @yield('header')

        <style>
            .sidebar .menu .list .ml-menu li a, .card .body, .card .header h2, .modal-content .modal-header .title, .modal-content .modal-footer button, .bootstrap-select>.dropdown-toggle, .form-control{font-size: 12px;}
            .block-header h2 { font-size: 19px;}
            .table-responsive .btn-sm {padding: 3px 7px;}
            .sidebar{width: 200px;font-size: 12px;}
            .sidebar .user-info .detail h4 {font-size: 12px;}
            section.content{margin: 11px 70px 20px 200px;}
  
            .bootstrap-notify-container {
                z-index: 99999 !important;
            }
            .page_banner_icon{width:30px;}


            .purple{color: #6f42c1;}
            .blue{color: #46b6fe;}
            .cyan{color: #5CC5CD; }
            .green{color: #04BE5B;}
            .orange{color: #FF9948;}
            .blush {color: #e47297;}
            .disable_checkbox label::before, .disable_checkbox label::after{border: 1px solid #c30b0b;}
            .lds-ripple {
                display: inline-block;
                position: relative;
                width: 80px;
                height: 80px;
                }
                .lds-ripple div {
                position: absolute;
                border: 4px solid #fff;
                opacity: 1;
                border-radius: 50%;
                animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
                }
                .lds-ripple div:nth-child(2) {
                animation-delay: -0.5s;
                }
                @keyframes lds-ripple {
                0% {
                    top: 36px;
                    left: 36px;
                    width: 0;
                    height: 0;
                    opacity: 0;
                }
                4.9% {
                    top: 36px;
                    left: 36px;
                    width: 0;
                    height: 0;
                    opacity: 0;
                }
                5% {
                    top: 36px;
                    left: 36px;
                    width: 0;
                    height: 0;
                    opacity: 1;
                }
                100% {
                    top: 0px;
                    left: 0px;
                    width: 72px;
                    height: 72px;
                    opacity: 0;
                }
                }
                .full_page_loader{width: 100%;
                    height: 100%;
                    position: fixed;
                    top: 0;
                    background: #2b2b2b69;
                    z-index: 99999999;
                    display: flex;
                    justify-content: center;
                    align-items: center;}
                    .lds-ring {
                    display: inline-block;
                    position: relative;
                    width: 80px;
                    height: 80px;
                    }
                    .lds-ring div {
                    box-sizing: border-box;
                    display: block;
                    position: absolute;
                    width: 64px;
                    height: 64px;
                    margin: 8px;
                    border: 8px solid #fff;
                    border-radius: 50%;
                    animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
                    border-color: #fff transparent transparent transparent;
                    }
                    .lds-ring div:nth-child(1) {
                    animation-delay: -0.45s;
                    }
                    .lds-ring div:nth-child(2) {
                    animation-delay: -0.3s;
                    }
                    .lds-ring div:nth-child(3) {
                    animation-delay: -0.15s;
                    }
                    @keyframes lds-ring {
                    0% {
                    transform: rotate(0deg);
                    }
                    100% {
                    transform: rotate(360deg);
                    }
                    }
                    .dropdown-loading .lds-ring{width: 20px;height: 20px;}
                    .dropdown-loading .lds-ring div{width: 20px;height: 20px;border: 3px solid #5a8bff;border-color: #5a8bff transparent transparent transparent;margin: 5px 0px 0px;}
        </style>
    </head>
     
    <body class="
        @if(dsld_get_setting('dashboard_base_color') != '') 
            theme-{{ dsld_get_setting('dashboard_base_color') }}
            @else  theme-blush  @endif 

        @if(dsld_get_setting('dashboard_theme_color') == 'dark') theme-dark  @endif 

        @if(dsld_get_setting('dashboard_rtl_version') == 'rtl') rtl @endif 
        ">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ dsld_uploaded_file_path(dsld_get_setting('dashboard_loader_icon')) }}" width="48" height="48" alt="Aero"></div>
                <p>Please wait...</p>
            </div>
        </div>

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>

        <!-- Main Search -->
        <div id="search">
            <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
            <form>
            <input type="search" value="" placeholder="Search..." />
            <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>


        @include('backend.inc.sidebar')
        <section class="content">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            
                            @if(isset($page) && !empty($page['title']))
                                <h2>{{ $page['title'] }}</h2>
                            @endif
                            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12">                
                            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                        </div>
                    </div>
                </div>
                <!-- Main Content -->
                <div class="container-fluid">
                    @include('backend.partials.notifications')
                    @yield('content')
                </div>                    
            </div>
        </section> 

        @include('backend.modals.add_media')
        
        <input type="hidden" name="media_page_no" id="media_page_no" value="1">

        @include('backend.modals.get_media')

        <div class="full_page_loader" style="display:none"><div class="lds-ripple"><div></div><div></div></div></div>
        <!-- Jquery Core Js --> 
        <script src="{{ dsld_static_asset('backend/assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
        <script src="{{ dsld_static_asset('backend/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->
        <script src="{{ dsld_static_asset('backend/assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
        <script src="{{ dsld_static_asset('backend/assets/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
        <script src="{{ dsld_static_asset('backend/assets/bundles/c3.bundle.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/plugins/dropify/js/dropify.min.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/js/pages/forms/dropify.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/bundles/mainscripts.bundle.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/plugins/dropzone/dropzone.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/plugins/summernote/dist/summernote.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/js/pages/index.js') }}"></script>
        <script src="{{ dsld_static_asset('backend/assets/js/pages/dsld_custom_js.js') }}"></script>
        @include('backend.inc.custom_js')
        @yield('footer')
     
    </body>
</html>