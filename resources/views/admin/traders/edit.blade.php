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
                <form action="{{route('traders.update',['trader'=>$trader->id])}}" method="post" >
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
                                <h2>@lang('app.trader') </h2>
                                <div class="mt-4 form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label required">@lang('app.name') :</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('name')is-invalid @enderror" placeholder=" @lang('app.name')" value="{{$trader->name}}" name="name"/>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label required">@lang('app.phone')</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('phone')is-invalid @enderror" placeholder=" @lang('app.phone')" value="{{$trader->phone}}" name="phone"/>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">@lang('app.type')</label>
                                    <div class="col-sm-8">
                                     <select class="form-control" name="type">
                                         <option disabled selected >إختر النوع</option>
                                         <option value="1" {{$trader->type == 0 ? 'selected' : ''}}> @lang('app.mobiles') </option>
                                         <option value="0" {{$trader->type == 1 ? 'selected' : ''}}> @lang('app.mobile_accessories') </option>
                                         <option value="2" {{$trader->type == 2 ? 'selected' : ''}}>@lang('app.display_screens')</option>
                                     </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label required">@lang('app.date_of_buy')</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control @error('created_at')is-invalid @enderror" value="{{$trader->created_at->format('Y-m-d')}}" name="created_at"/>
                                        @if ($errors->has('created_at'))
                                            <span class="text-danger">{{ $errors->first('created_at') }}</span>
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
                                    <a href="{{route('traders.index')}}" class="btn btn-danger" style="margin-@lang('app.dir2'): 5px;float: @lang('app.dir2');">@lang('app.back')</a>                                </div>
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
