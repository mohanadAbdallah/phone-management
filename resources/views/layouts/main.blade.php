<!DOCTYPE html>
@if (LaravelLocalization::getCurrentLocale() == 'ar')
    <html lang="ar" dir="rtl">
    @else
        <html lang="en" dir="ltr">
        @endif
        @include('includes.head')

        <style>
            .badge-primary {
                color: #fff;
                background-color: #7931ad;
            }
            .badge-danger {
                color: #fff;
                background-color: #d645cf;
            }
            .badge-success {
                color: #fff;
                background-color: rgba(178, 69, 255, 0.51);
            }
            .badge-warning{
                color: #fff;
                background-color: rgb(146, 0, 156);
            }
            .to-top {
                color: #400057;
            }
            .to-bottom {
                color: rgba(193, 21, 168, 0.6);
                text-decoration: none;
                background-color: transparent;
            }
        </style>
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
        </html>

