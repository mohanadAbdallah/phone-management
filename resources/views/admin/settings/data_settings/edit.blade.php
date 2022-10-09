@extends('layouts.main')

@section('content')

    <div class="content">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">@lang('app.edit')  @lang('app.application_data')</h5>

            </div>

            <div class="card-body">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form class="rated" action="{{route('setting.update',$privacy_policy->id)}}" method="post"
                          enctype="multipart/form-data">
                        @method('put')

                        {{csrf_field()}}
                        <div class="row ">


                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="content_ar">@lang('app.about') (AR)</label>
                                    <textarea rows="15" class="form-control" name="about_ar">{{$about->value_ar ?? ''}}</textarea>
                                </div>



                            </div>

                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="content_en">@lang('app.about') (EN)</label>
                                    <textarea rows="15" class="form-control" name="about_en">{{$about->value_en ?? ''}}</textarea>
                                </div>



                            </div>

                        </div>
                        <div class="row ">


                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="content_ar">@lang('app.privacy_policy') (AR)</label>
                                    <textarea rows="15" class="form-control" name="privacy_policy_ar">{{$privacy_policy->value_ar ?? ''}}</textarea>
                                </div>

                            </div>

                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="content_en">@lang('app.privacy_policy') (EN)</label>
                                    <textarea rows="15" class="form-control" name="privacy_policy_en">{{$privacy_policy->value_en ?? ''}}</textarea>
                                </div>



                            </div>

                        </div>
                        <div class="row">

                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.phone')</label>
                                    <input type="text" class="form-control" id="order_fees" name="phone" value="{{$phone->value_en}}">
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.email')</label>
                                    <input type="email" class="form-control" id="connect_us_number" name="email" value="{{$email->value_en}}">
                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.facebook')</label>
                                    <input type="text" class="form-control" id="order_fees" name="facebook" value="{{$facebook->value_en}}">
                                </div>
                            </div>
                                <div class="col-6 ">
                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.twitter')</label>
                                    <input type="text" class="form-control" id="connect_us_number" name="twitter" value="{{$twitter->value_en}}">
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.snapchat')</label>
                                    <input type="text" class="form-control" id="order_fees" name="snapchat" value="{{$snapchat->value_en}}">
                                </div>
                            </div>
                                <div class="col-6 ">
                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.instagram')</label>
                                    <input type="text" class="form-control" id="connect_us_number" name="instagram" value="{{$instagram->value_en}}">
                                </div>

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.youtube')</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{$youtube->value_en}}">
                                </div>
                            </div>
                            <div class="col-6 ">

                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.whatsapp')</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$whatsapp->value_en}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6 ">
                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.start_date')</label>
                                    <input type="date" class="form-control" id="dateStarting" name="dateStarting" value="{{$dateStarting->value_en}}">
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.offer_price')</label>
                                    <input type="text" class="form-control" id="offer_price" name="offer_price" value="{{$offerPrice->value_en}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6 ">
                                <div class="form-group">
                                    <label class="control-label" for="name">@lang('app.workingtime')</label>
                                    <input type="text" class="form-control" id="work_hours" name="work_hours" value="{{$workHours->value_en}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <label class="col-lg-6 col-form-label font-weight-semibold">@lang('app.icon_info'):</label>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="file" name="icon_info" class="file-input form-control-lg" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-warning" data-remove-class="btn btn-light btn-lg" data-fouc>
                                            <span class="form-text text-muted">Large file input button</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">@lang('app.update') <i class="icon-paperplane ml-2"></i></button>
                        </div>

                    </form>
            </div>
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
        @isset($iconInfo->value)
            options['initialPreview'] = [
            '{{$iconInfo->img_url_icon}}',
        ];
        options['initialPreviewConfig'] =  [
            {caption: 'img_url_icon',  key: 1, url: '{{$iconInfo->img_url_icon}}', showDrag: false},
        ];
        @endisset
        $('.file-input').fileinput(options);

    </script>
@endsection
