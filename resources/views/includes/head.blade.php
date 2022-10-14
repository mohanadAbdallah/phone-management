
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>إدارة أقساط الجوالات</title>
    <link rel="shortcut icon" href="{{asset('global_assets/images/userman.png')}}" />

    @if (LaravelLocalization::getCurrentLocale() == 'ar')

        <!-- Global stylesheets -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
            <!-- /global stylesheets -->

            <!-- Core JS files -->
            <script src="{{asset('global_assets/js/main/jquery.min.js')}}"></script>
            <script src="{{asset('global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
            <!-- /core JS files -->




            <!-- Theme JS files -->
            <script src="{{asset('global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
            <script src="{{asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
            <script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
            <script src="{{asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
            <script src="{{asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

            <script src="{{asset('global_assets/js/demo_pages/dashboard.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/sparklines.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/lines.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/areas.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/donuts.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/bars.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/progress.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js')}}"></script>
            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/pies.js')}}"></script>

            <script src="{{asset('global_assets/js/demo_charts/pages/dashboard/light/bullets.js')}}"></script>





            <!-- /theme JS files -->
    @else
        <!-- Global stylesheets -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
            <link href="{{asset('portal/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('portal/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('portal/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('portal/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('portal/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
            <!-- /global stylesheets -->

            <!-- Core JS files -->
            <script src="{{asset('portal/global_assets/js/main/jquery.min.js')}}"></script>
            <script src="{{asset('portal/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('portal/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
            <!-- /core JS files -->

@endif



<!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/col_reorder.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/datatables_extension_reorder.js') }}"></script>
    <script src="{{asset('portal/assets/js/app.js')}}"></script>
    <!-- /theme JS files -->
{{--    <link href="{{asset('public/global_assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('portal/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/uploader_bootstrap.js')}}"></script>
    <!-- /theme JS files -->










    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>







    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}"></script>

    <script src="{{asset('global_assets/js/demo_pages/datatables_extension_buttons_html5.js')}}"></script>
    <!-- /theme JS files -->


    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/login.js')}}"></script>
    <!-- /theme JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>
    <script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/form_select2.js')}}"></script>



    <!-- Theme JS files -->
    <script src="{{asset('global_assets/js/plugins/media/fancybox.min.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/gallery.js')}}"></script>
    <!-- /theme JS files -->

</head>
