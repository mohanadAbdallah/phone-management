@extends('layouts.main')
@section('content')
    <style>
        h4 {
            display: block;
            margin-block-start: 0.33em;
            margin-block-end: 0.33em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }
        .card-header {
            background: rgba(0, 0, 0, 0.02) !important;
            margin-bottom: 20px !important;
            border-bottom: 1px solid #e3e3e3 !important;
            color: white;
        }

    </style>

    <div class="d-flex flex-column-fluid">

        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom example example-compact">

            @include('includes.messages')

            <!--begin::Form-->
                <form action="{{route('customers.store')}}" method="post" >
                    @csrf
                    @method('post')
                    <div class="card-header mb-3" style="background-color: #0b3251;color: #000000;">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="card-title">@lang('app.add_customer')</h4>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2">
                            </div>

                        </div>

                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <div class="col-md-7">
                                <h2>@lang('app.customer_details') </h2>
                                <div class="mt-4 form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required">@lang('app.name') :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('customer_name')is-invalid @enderror" placeholder=" @lang('app.name')" name="customer_name"/>
                                        @if ($errors->has('customer_name'))
                                            <span class="text-danger">{{ $errors->first('customer_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required ">@lang('app.email')</label>
                                    <div class="col-sm-8">

                                        <input type="text" class="form-control @error('email')is-invalid @enderror" placeholder=" @lang('app.email')"  name="email"/>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required">@lang('app.phone')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('mobile')is-invalid @enderror" placeholder=" @lang('app.phone')"  name="phone"/>
                                        @if ($errors->has('mobile'))
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required">@lang('app.address')</label>
                                    <div class="col-sm-8">

                                        <input type="text" class="form-control @error('address')is-invalid @enderror" placeholder="@lang('app.address')"   name="address"/>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required">@lang('app.identity')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('identity')is-invalid @enderror" placeholder="@lang('app.identity_no')" name="identity"/>
                                        @if ($errors->has('identity'))
                                            <span class="text-danger">{{ $errors->first('identity') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <hr>

                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" style="margin-@lang('app.dir2'): 5px;float: @lang('app.dir2');">@lang('app.save') <i class="icon-paperplane ml-2"></i></button>
                                    <a href="{{route('customers.index')}}" class="btn btn-danger" style="margin-@lang('app.dir2'): 5px;float: @lang('app.dir2');">@lang('app.back')</a>                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

@endsection
