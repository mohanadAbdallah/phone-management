@extends('layouts.main')

@section('content')
    <div class="content-body">
        <div class="row">

            @foreach($customer->mobile ?? [] as $item)
                <div class="col-xl-3">
                    <a href="{{route('mobiles.show',$item->id ?? '')}}">
                        <div class="card text-center crypto-card-3 pull-up" >
                            <div class="card-body" >
                                <i style="color: darkgray;font-size: 70px" class="icon-mobile"></i>
                            </div>
                            <div class="card-footer text-muted">
                                <h2>
                                            <span style="font-weight: bold; color: green">
                                                {{$item->mobile_name ?? ''}}
                                            </span>
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <div class="col-xl-3">
                <a href="{{route('customers.create')}}">
                    <div class="card text-center crypto-card-3 pull-up" >
                        <div class="card-body" >
                            <i style="color: darkgray;font-size: 70px" class="icon-add"></i>
                        </div>
                        <div class="card-footer text-muted">
                            <h2>
                                            <span style="font-weight: bold; color: green">
                                               @lang('app.add_mobile')
                                            </span>
                            </h2>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>


@endsection
