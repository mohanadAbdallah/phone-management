@extends('layouts.main')

@section('js_css_header')
    <style>
        .bg-blue-400 {
            background-color: #7931ad;
        }
        .bg-success-400 {
            background-color: #d645cf;
        }
        .bg-danger-400 {
            background-color: rgba(178, 69, 255, 0.51);
        }
        .card{
            border-radius: 15px;
        }
        .btn{
            border-radius: 15px;
        }
        .btn-primary{
            background-color: #88D645;
        }
        .btn-primary:hover{
            background-color: #70b931;
        }
        .btn-info{
            background-color: #31AD4C;
        }
        .btn-info:hover {
            background-color: #6db530;
        }
        .btn-success {
            background-color: #40bf80;
        }
        .btn-success:hover {
            background-color: #1e8a35;
        }
        .form-control{
            border-radius: 15px;
        }
        .font-weight-semibold {
            font-size: 17px;
            color: #7c3db3;
        }

    </style>
@endsection
@section('content')
    <script src="{{asset('portal/global_assets/js/plugins/visualization/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/demo_charts/echarts/light/pies/pie_basic.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/demo_charts/echarts/light/pies/pie_donut.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/demo_charts/echarts/light/pies/pie_nested.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/demo_charts/echarts/light/pies/pie_rose.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/demo_charts/echarts/light/pies/pie_rose_labels.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/demo_charts/echarts/light/pies/pie_levels.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/demo_charts/echarts/light/pies/pie_timeline.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/demo_charts/echarts/light/pies/pie_multiple.js')}}"></script>
    <script src="{{asset('portal/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>


        <style>
            .gm-style-iw-d {
                overflow: auto !important;
            }

            .gm-style-iw {
                background: #f3ffe5 !important;
            }
        </style>
        <!-- Basic card -->
    <div class="content">

        <div class="row mt-5">
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body bg-success-400 has-bg-image">
                    <div class="media">
                        <div class="media-body ">
                            <h3 class="mb-0">{{$customer}}</h3>
                            <span class="text-uppercase font-size-xs font-weight-bold">Month income</span>
                        </div>

                        <div class="mr-3 align-self-center">
                            <i class="icon-coin-dollar icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body bg-danger-400 has-bg-image">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="mb-0">{{$users}}</h3>
                            <span class="text-uppercase font-size-xs font-weight-bold">Year income</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-cash icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card card-body bg-success-400 has-bg-image">
                    <div class="media">
                        <div class="media-body ">
                            <h3 class="mb-0">{{$customer}}</h3>
                            <span class="text-uppercase font-size-xs font-weight-bold">Month income</span>
                        </div>

                        <div class="mr-3 align-self-center">
                            <i class="icon-coin-dollar icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body" style="">
                            <h6 class="media-title font-weight-semibold">عدد الطلبات</h6>
                            <h3><b> 15 </b></h3>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body" style="">
                            <h6 class="media-title font-weight-semibold">عدد المستخدمين</h6>
                            <h3><b>10</b></h3>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body" style="">
                            <h6 class="media-title font-weight-semibold">عدد الطلبات المنتهية</h6>
                            <h3><b>7</b></h3>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

