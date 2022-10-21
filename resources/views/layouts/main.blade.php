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
            }
        </style>
        </html>

