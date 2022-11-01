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
            @include('sweetalert::alert')

            <!--begin::Form-->
                <form action="{{route('mobiles.update',['mobile'=>$mobile->id])}}" method="post" >
                    @csrf
                    @method('PUT')
                    <div class="card-header mb-3" style="background-color: #0b3251;color: #000000;">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="card-title">@lang('app.edit')</h4>
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
                                <h2>@lang('app.premium_details') </h2>
                                <div class="mt-4 form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label ">@lang('app.name') :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('mobile_name')is-invalid @enderror" placeholder=" @lang('app.name')" value="{{$mobile->mobile_name}}" name="mobile_name"/>
                                        @if ($errors->has('mobile_name'))
                                            <span class="text-danger">{{ $errors->first('mobile_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-4 form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label ">@lang('app.type') :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('type')is-invalid @enderror" placeholder=" @lang('app.type')" value="{{$mobile->type}}" name="type"/>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-4 form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label ">@lang('app.price') :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('salary')is-invalid @enderror" placeholder=" @lang('app.salary')" value="{{$mobile->salary}}" name="salary"/>
                                        @if ($errors->has('salary'))
                                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-4 form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label ">@lang('app.date_of_buy') :</label>
                                    <div class="col-sm-8">
                                        <input type="date" value="{{ $mobile->created_at->format('Y-m-d') }}" class="form-control" name="created_at">
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
                                    <a href="{{route('mobiles.index')}}" class="btn btn-danger" style="margin-@lang('app.dir2'): 5px;float: @lang('app.dir2');">@lang('app.back')</a>                                </div>
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
