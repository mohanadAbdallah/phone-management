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
            <form action="{{route('vehicles.store.renewal')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.name') (AR)</label>
                            <input type="text"  name="name_ar" class="form-control" placeholder="name_ar" value="{{$vehicle->name_ar}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.name') (EN)</label>
                            <input type="text" name="name_en" class="form-control" placeholder="name_en" value="{{$vehicle->name_en}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.description') (AR)</label>
                            <textarea name="description_ar" class="form-control" >{{$vehicle->description_ar}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.description') (EN)</label>
                            <textarea name="description_en" class="form-control" >{{$vehicle->description_en}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.color')</label>
                            <input type="text"  name="color" class="form-control" placeholder="name_ar" value="{{$vehicle->color}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.manufacture_history') </label>
                            <input type="text" name="manufacture_history" class="form-control" placeholder="name_en" value="{{$vehicle->manufacture_history}}" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.number_seats')</label>
                            <input type="text"  name="number_seats" class="form-control" placeholder="name_ar" value="{{$vehicle->number_seats}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.gear')</label>
                            <select class=" brand_id form-control select-search" data-fouc name="gear" >
                                <option value="{{$vehicle->gear}}">{{$vehicle->gear_name}}</option>
                                <option value="0">@lang('app.normal')</option>
                                <option value="1">@lang('app.automatic')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.price')</label>
                            <input type="text" name="price" class="form-control" placeholder="name_en" value="{{$vehicle->price}}" >
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
                                    <option value="{{$item->id ??'--'}}" {{$vehicle->brand_id == $item->id ? 'selected' : ''}}>{{$item->name ??'--'}} </option>
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
                                    <option value="{{$item->id ?? '--'}}" {{$vehicle->vehicle_type_id == $item->id ? 'selected' : ''}}>{{$item->name ?? '--'}} </option>
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
                                        value="{{$item->id}}" {{$vehicle->city_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
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
                            <input type="text"  name="cylinder_number" class="form-control" placeholder="name_ar" value="{{$vehicle->cylinder_number}}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.speed_limit')</label>
                            <input type="text" name="speed_limit" class="form-control" placeholder="name_en" value="{{$vehicle->speed_limit}}" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('app.fuel')</label>
                            <input type="text"  name="fuel" class="form-control" placeholder="name_ar" value="{{$vehicle->fuel}}">
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

        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: '<i class="icon-arrow-left32"></i>',
            next: '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };
        var options = {
            browseLabel: 'Browse',
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },

            initialPreviewAsData: true,
            initialCaption: "No file selected",
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        };
        @isset($offer->img)
            options['initialPreview'] = [
            '{{$offer->image_url ?? null}}',
        ];
        options['initialPreviewConfig'] =  [
            {caption: 'image_url',  key: 1, url: '{{$offer->image_url ?? null}}', showDrag: false},
        ];
        @endisset
        $('.file-input').fileinput(options);
    </script>


    <script>
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: '<i class="icon-arrow-left32"></i>',
            next: '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            showRemove: true,
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: 'remove-image-btn',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };
        var options = {
            browseLabel: 'Browse',
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            deleteUrl : "{{url('admin/city/districts')}}",
            overwriteInitial: false,

            initialPreviewAsData: true,
            initialCaption: "No file selected",
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        };
        @isset($offer->images)
            options['initialPreview'] = [
            @foreach($offer->images as $image)
                '{{FileStorage::getUrl($image)}}',
            @endforeach
        ];
        options['initialPreviewConfig'] =  [
                @foreach($offer->images as $image)
            {caption: 'Image',  key: '{{$image}}',method:'get', url: '{{url('/offer/image/delete').'/'.$offer->id}}', showDrag: false},
            @endforeach
        ];
        @endisset
        $('.file-input-images').fileinput(options);



    </script>
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
