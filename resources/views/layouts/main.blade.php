<!DOCTYPE html>
@if (LaravelLocalization::getCurrentLocale() == 'ar')
    <html lang="ar" dir="rtl">
    @else
        <html lang="en" dir="ltr">
        @endif
        @include('includes.head')


        <body>
        <!-- Main navbar -->
        @include('includes.navbar')
        <!-- /main navbar -->
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
        @include('includes.sidebar')
        <!-- /main sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>
                <!-- Footer -->
            @include('includes.footer')
            <!-- /footer -->
            </div>
        </div>
        <!-- /main content -->
        <!-- /page content -->
        </body>
        @yield('script')
        @yield('js_css_header')
        <style>

            body{
                font-family: 'Droid Arabic Kufi', serif;
                overflow: initial;

            }
            /*.fixed-nav-bar {*/
            /*    position: fixed;*/
            /*    top: 0;*/
            /*    left: 0;*/
            /*    z-index: 9999;*/
            /*    width: 100%;*/
            /*    height: 50px;*/
            /*    background-color: #00a087;*/
            /*    padding-top:10px;*/

            /*}*/


            ::-webkit-scrollbar {
                width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                background: #1a1a1a;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #1a1a1a;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #1a1a1a;
            }

            .sidebar-main, .sidebar-main .sidebar-content, .sidebar-secondary, .sidebar-secondary .sidebar-content {
                right: -18.5625rem;
                font-family: Roboto,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"
            }
            .required:after{
                content:' *';
                color:red;
                padding-left:5px;
            }
        </style>
        </html>

