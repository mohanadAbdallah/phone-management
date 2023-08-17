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
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" novalidate="novalidate" method="post" enctype="multipart/form-data" action="{{route('devices.store')}}" >
                    @csrf
                    <div class="card-header mb-3" style="background-color: #0b3251;color: #000000;">
                        <div class="row">
                            <div class="col-md-3">
                                <h4 class="card-title">@lang('app.add_device')</h4>
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>

                    </div>

                    <div class="card-body" >
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <div class="mt-4 form-group row">
                                    <label for="exampleFormControlInput1"
                                           class="col-sm-2 col-form-label required">@lang('app.type')</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="type">
                                            <option selected disabled>@lang('app.device_type')</option>
                                            <option value="Samsung">Samsung</option>
                                            <option value="Xiaomi">Xiaomi</option>
                                            <option value="Iphone">Iphone</option>
                                            <option value="Huawei">Huawei</option>
                                            <option value="Nokia">Nokia</option>
                                            <option value="Htc">Htc</option>
                                            <option value="other">@lang('app.other')</option>
                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required">@lang('app.price')</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control  @error('price')is-invalid @enderror" value="{{old('price')}}" placeholder=" @lang('app.price')" name="price"/>
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required">@lang('app.ram')</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="ram">
                                            <option selected disabled value="null">@lang('app.ram')</option>
                                            <option value="1">1 GB</option>
                                            <option value="2">2 GB</option>
                                            <option value="3">3 GB</option>
                                            <option value="4">4 GB</option>
                                            <option value="6">6 GB</option>
                                            <option value="8">8 GB</option>
                                            <option value="00">@lang('app.other')</option>
                                        </select>
                                        @if ($errors->has('ram'))
                                            <span class="text-danger">{{ $errors->first('ram') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="col-md-7">
                                <div class="form-group mt-4 row">
                                        <label for="exampleFormControlInput1"
                                               class="col-sm-2 col-form-label required">@lang('app.name') :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                   class="form-control @error('name')is-invalid @enderror"
                                                   value="{{old('name')}}" placeholder=" @lang('app.name')"
                                                   name="name"/>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required">@lang('app.storage')</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select" name="storage">
                                            <option selected disabled value="null">@lang('app.storage')</option>
                                            <option value="8">8 GB</option>
                                            <option value="16">16 GB</option>
                                            <option value="32">32 GB</option>
                                            <option value="64">64 GB</option>
                                            <option value="128">128 GB</option>
                                            <option value="256">256 GB</option>
                                            <option value="512">512 GB</option>
                                            <option value="00">@lang('app.other')</option>
                                        </select>
                                        @if ($errors->has('storage'))
                                            <span class="text-danger">{{ $errors->first('storage') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label required">@lang('app.color')</label>
                                    <div class="col-sm-8">
                                        <input type="color" class="form-control @error('color')is-invalid @enderror"
                                               value="{{old('color')}}" placeholder="@lang('app.color')" name="color"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">@lang('app.description')</label>
                                    <div class="col-sm-8">
                                        <textarea rows="4" id="exampleFormControlInput1" class="form-control @error('description')is-invalid @enderror"
                                                  placeholder="@lang('app.description')" name="description">
                                        </textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row mb-4" >
                            <label class="col-lg-2 col-form-label font-weight-semibold">@lang('app.image'):</label>
                            <div class="col-lg-12">
                                <input type="file" name="image" class="file-input-custom" data-show-caption="true"  data-show-upload="true" accept="image/*" data-fouc>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">@lang('app.save') <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden"><div></div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</script>
@endsection

