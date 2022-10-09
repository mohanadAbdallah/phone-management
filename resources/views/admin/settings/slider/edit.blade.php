@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h2 class="card-title">@lang('app.edit')</h2>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <hr>
        @include('includes.messages')

        <div class="card-body">
            <form action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.description') (AR)</label>
                            <textarea name="description_ar" class="form-control" >{{$slider->description_ar}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.description') (EN)</label>
                            <textarea name="description_en" class="form-control">{{$slider->description_en}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="required form-label"class="control-label" for="name">@lang('app.link')</label>
                            <input type="text" name="link" class="form-control" placeholder="name_en" value="{{$slider->link}}" >

                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <label class="col-lg-2 col-form-label font-weight-semibold">Input button sizing:</label>
                    <div class="col-lg-12">

                        <div class="form-group">
                            <input type="file" name="img" class="file-input form-control-lg" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-warning" data-remove-class="btn btn-light btn-lg" data-fouc>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">@lang('app.update') <i class="icon-paperplane ml-2"></i></button>
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
        @isset($slider->imgs)
            options['initialPreview'] = [
            '{{$slider->image_url}}',
        ];
        options['initialPreviewConfig'] =  [
            {caption: 'image_url',  key: 1, url: '{{$slider->image_url}}', showDrag: false},
        ];
        @endisset
        $('.file-input').fileinput(options);
    </script>
@endsection
