@extends('layouts.main')
@section('content')
    @include('includes.messages')
    @include('sweetalert::alert')
{{--    <div class="form-group row">--}}
{{--        <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">@lang('app.search')</label>--}}
{{--        <div class="col-sm-4">--}}
{{--            <input type="text" class="form-control" placeholder="@lang('app.search')"   name="p"/>--}}
{{--        </div>--}}
{{--    </div>--}}

    <form action="{{ route('customers.index') }}" id="form_search" enctype="multipart/form-data">
        @csrf
    <div class="input-group col-md-6 mt-5 mb-4 col-sm-12 mb-2"
         style="margin-right: 15px;">
        <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping">بحث نصي</span>
            <input type="hidden" name="per_page" class="per_page">
        </div>
        <input type="text" class="form-control" autocomplete="chrome-off"
               name="q"
               value="{{request()->get('q')}}"
               aria-describedby="addon-wrapping">

        <button type="submit" class="btn btn-primary mr-1 ml-1">
            <i class="la la-search"></i> بحث
        </button>
    </div>
    </form>
<hr>
    <div class="content-body mt-4">
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
