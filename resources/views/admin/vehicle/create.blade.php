@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">@lang('app.add_new_category')</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        @include('includes.messages')
        <div class="card-body">
            <form action="{{route('vehicle.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.name') (AR)</label>
                            <input type="text"  name="name_ar" class="form-control" placeholder="name_ar" value="{{old('name_ar')}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.name') (EN)</label>
                            <input type="text" name="name_en" class="form-control" placeholder="name_en" value="{{old('name_en')}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.description') (AR)</label>
                            <textarea name="description_ar" class="form-control" >{{old('description_ar')}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.description') (EN)</label>
                            <textarea name="description_en" class="form-control" >{{old('description_en')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.color')</label>
                            <input type="text"  name="color" class="form-control" placeholder="name_ar" value="{{old('color')}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.manufacture_history') </label>
                            <input type="text" name="manufacture_history" class="form-control" placeholder="name_en" value="{{old('manufacture_history')}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.number_seats')</label>
                            <input type="text"  name="number_seats" class="form-control" placeholder="name_ar" value="{{old('number_seats')}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.gear')</label>
                            <select class=" brand_id form-control select-search" data-fouc name="gear" >
                                <option value="">@lang('app.select')</option>
                                <option value="0">@lang('app.normal')</option>
                                <option value="1">@lang('app.automatic')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.price')</label>
                            <input type="text" name="price" class="form-control" placeholder="name_en" value="{{old('price')}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> @lang('app.brand_vehicle')</label>
                            <select class=" brand_id form-control select-search" data-fouc name="brand_id" >
                                <option value="">@lang('app.select')</option>
                            @foreach($brand as $item)
                                <option value="{{$item->id ??'--'}}" {{old('brand_id') == $item->id ? 'selected' : ''}}>{{$item->name ??'--'}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> @lang('app.vehicle_type')</label>
                            <select class=" brand_id form-control select-search" data-fouc name="vehicle_type_id" >
                                <option value="">@lang('app.select')</option>
                                @foreach($vehicleType as $item)
                                <option value="{{$item->id ?? '--'}}" {{old('vehicle_type_id') == $item->id ? 'selected' : ''}}>{{$item->name ?? '--'}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required form-label"class="control-label" for="name">@lang('app.cities')</label>
                            <select id="city_id" class="city_id form-control select-search" name="city_id">
                                <option value="">@lang('app.select')</option>
                                @foreach($city as $item)
                                    <option
                                        value="{{$item->id}}" {{old('city_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required form-label" for="name">@lang('app.branch')</label>
                            <select name="branch_id" id="branch_id" class=" branch_id form-control select-search">
                                <option value="">@lang('app.select')</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.cylinder_number')</label>
                            <select class=" brand_id form-control select-search" data-fouc name="cylinder_number" >
                                <option value="">@lang('app.select')</option>
                                <option value="4 @lang('app.cylinder')">4 @lang('app.cylinder')</option>
                                <option value="5 @lang('app.cylinder')">5 @lang('app.cylinder')</option>
                                <option value="6 @lang('app.cylinder')">6 @lang('app.cylinder')</option>
                                <option value="8 @lang('app.cylinder')">8 @lang('app.cylinder')</option>
                                <option value="10 @lang('app.cylinder')">10 @lang('app.cylinder')</option>
                                <option value="12 @lang('app.cylinder')">12 @lang('app.cylinder')</option>
                                <option value="16 @lang('app.cylinder')">16 @lang('app.cylinder')</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.speed_limit')</label>
                            <input type="text" name="speed_limit" class="form-control" placeholder="name_en" value="{{old('speed_limit')}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.fuel')</label>
                            <select class=" brand_id form-control select-search" data-fouc name="fuel" >
                                <option value="">@lang('app.select')</option>
                                <option value="سولار" >@lang('app.solar')</option>
                                <option value="بنزين">@lang('app.petrol')</option>
                                <option value="كهرباء">@lang('app.electricity')</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <label class="col-lg-6 col-form-label font-weight-semibold">@lang('app.image'):</label>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input  value="{{old('image')}}" type="file" name="image" class="file-input form-control-lg" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-lg" data-remove-class="btn btn-light btn-lg" data-fouc>
                                    <span class="form-text text-muted">Large file input button</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <label class="col-lg-6 col-form-label font-weight-semibold">@lang('app.detailed_photo'):</label>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="file" name="images_detailed[]" class="file-input form-control-lg" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-lg" data-remove-class="btn btn-light btn-lg" data-fouc  multiple="multiple">
                                    <span class="form-text text-muted">Large file input button</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">@lang('app.save') <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(".city_id").on("change", function (e) {
            var city_id = $(this).val();
            $('#branch_id').html('<option value="">اختر المدينة</option>');
            $.ajax({
                type: 'get',
                dataType: "json",
                url: '{{url('/cities/branch/')}}/' + city_id,
                data: {'branch_id': '{{old('branch_id') ?? ''}}'},
                cache: "false",
                success: function (data) {
                    $('#branch_id').html(data.options);
                }, error: function (data) {
                    if (city_id === '') {
                        $('#branch_id').html('<option value="">اختر المنطقة</option>');
                    } else {
                        $('#branch_id').html('<option value="">لا يوجد مناطق لهذا المدن</option>');
                    }
                }
            });
            return false;
        });
        $(".city_id").change();

    </script>

@endsection
