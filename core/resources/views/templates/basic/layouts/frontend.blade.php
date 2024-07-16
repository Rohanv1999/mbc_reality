<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$general->sitename(__($pageTitle))}}</title>
    @include('partials.seo')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/bootstrap-5.0.0.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/all.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('assets/admin/css/line-awesome.min.css')}}"> 
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lightcase.css')}}"> 
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/slick.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/lib/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'frontend/css/main.css')}}">
     @stack('style-lib')
    @stack('style')
    <link href="{{ asset($activeTemplateTrue . 'frontend/css/color.php') }}?color={{$general->base_color}}&secondColor={{$general->secondary_color}}" rel="stylesheet"/>
</head>
<body>
    @stack('fbComment')
    <div class="preloader">
        <div class="preloader-container">
            <span class="animated-preloader"></span>
        </div> 
    </div> 
    @include($activeTemplate . 'partials.header')
    <div class="main-wrapper">
        @yield('content')
    </div>
    @include($activeTemplate . 'partials.footer')
    <script src="{{asset('assets/admin/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/lib/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/lib/slick.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/lib/wow.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/lib/lightcase.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/lib/select2.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'frontend/js/main.js')}}"></script>
    @stack('script-lib')
    @stack('script')
    @include('partials.plugins')
    @include('partials.notify')

    <script>
        (function ($) {
            "use strict";
            $(".langSel").on("change", function() {
                window.location.href = "{{route('home')}}/change/"+$(this).val() ;
            });
        })(jQuery);
    </script>
</body>
</html>

