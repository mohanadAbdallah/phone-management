@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">@lang('app.add_slider')</h6>
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
            <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.description') (AR)</label>
                            <textarea name="description_ar" class="form-control" ></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('app.description') (EN)</label>
                            <textarea name="description_en" class="form-control" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="required form-label"class="control-label" for="name">@lang('app.link')</label>
                            <input type="text" name="link" class="form-control" placeholder="name_en" value="{{old('link')}}" >

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <label class="col-lg-2 col-form-label font-weight-semibold">Input button sizing:</label>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="file" name="img" class="file-input form-control-lg" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-lg" data-remove-class="btn btn-light btn-lg" data-fouc>
                            <span class="form-text text-muted">Large file input button</span>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">@lang('app.save') <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
