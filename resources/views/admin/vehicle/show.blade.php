@extends('layouts.main')


@section('content')
<style>
    .img-fluid {
        max-width: 100%;
        height: 300px;
    }
</style>

    <div class="col-lg-12">

        <!-- Blog layout #3 with image -->
        <div class="card blog-horizontal">
            <div class="card-body">
                <div class="card-img-actions mr-3">
                    <img class="card-img img-fluid" src="{{$vehicle->image_url}}" alt="">
                    <div class="card-img-actions-overlay card-img">
                    </div>
                </div>

                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                    <div>
                        <h6 class="font-weight-semibold"> @lang('app.carName')  :{{$vehicle->name}}</h6>
                        <ul class="list list-unstyled mb-0">
                            <li class="font-weight-semibold">@lang('app.description') : <span >{{$vehicle->description}}</span></li>
                            <li class="font-weight-semibold">@lang('app.gear') : <span >{{$vehicle->gear_name}}</span></li>
                            <li class="font-weight-semibold">@lang('app.body_type') : <span >{{$vehicle->vehicle_type_name}}</span></li>
                            <li class="font-weight-semibold">@lang('app.year') : <span >{{$vehicle->manufacture_history}}</span></li>
                            <li class="font-weight-semibold">@lang('app.color') : <span >{{$vehicle->color}}</span></li>
                            <li class="font-weight-semibold">@lang('app.price') : <span >{{$vehicle->price}}   @lang('app.ras')</span></li>
                            <li class="font-weight-semibold">@lang('app.fuel') : <span >{{$vehicle->fuel}}  </span></li>
                            <li class="font-weight-semibold">@lang('app.number_seats') : <span >{{$vehicle->number_seats}}  </span></li>
                            <li class="font-weight-semibold">@lang('app.brand_vehicle') : <span >{{$vehicle->brand->name}}  </span></li>
                            <li class="font-weight-semibold">@lang('app.branch_name') : <span >{{$vehicle->branch->name}}  </span></li>

                        </ul>
                    </div>

                </div>



            </div>
        </div>
        <div class="row">
            @foreach($vehicle->images_url as $item)
            <div class="col-sm-6 col-xl-4">

                <div class="card">

                    <div class="card-img-actions mx-1 mt-1">
                        <img class="card-img img-fluid" src="{{$item}}" alt="">
                        <div class="card-img-actions-overlay card-img">
                            <a href="{{$item}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox" rel="group">
                                <i class="icon-plus3"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            @endforeach


        </div>

        <!-- /blog layout #3 with image -->

    </div>
@endsection
