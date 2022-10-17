@extends('layouts.main')
@section('content')
    @include('includes.messages')
    @include('sweetalert::alert')
    <div class="content-body">

        <div class="row">

                    @foreach($customer as $item)
                        <div class="col-xl-3">
                            <a href="{{route('customers.show',$item->id)}}">
                                <div class="card text-center crypto-card-3 pull-up" >
                                    <div class="card-body" >
                                        <i style="color: darkgray;font-size: 70px" class="icon-user"></i>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <h2>
                                            <span style="font-weight: bold; color: green">
                                                {{$item->customer_name}}
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
                                               @lang('app.add_user')
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>

        </div>
    </div>


@endsection
