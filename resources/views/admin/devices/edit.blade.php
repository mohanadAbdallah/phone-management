@extends('layouts.main')
@section('content')
    <div class="card">
    @include('includes.messages')
    @include('sweetalert::alert')

    <!--begin::Form-->
        <form action="{{route('devices.update',['device'=>$device->id])}}" method="post" >
            @csrf
            @method('PUT')
        <div class="card-header">
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

        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="row form-group">
                        <label class="col-sm-2 col-form-label" for="type">Type : </label>
                        <input type="text" id="type" class="form-control col-sm-8" name="type" value="{{$device->type}}">
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-2 col-form-label" for="name">Name : </label>
                        <input type="text" id="name" class="form-control col-sm-8" name="name" value="{{$device->name}}">
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-2 col-form-label" for="color">Color : </label>
                        <input type="color" id="color" class="form-control col-sm-8" name="color" value="{{$device->color}}">
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-2 col-form-label" for="price">Price : </label>
                        <input type="text" id="price" class="form-control col-sm-8" name="price" value="{{$device->price}}">
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-2 col-form-label" for="storage">Storage : </label>
                        <select class="custom-select col-sm-8" name="storage">
                            <option selected disabled value="null">@lang('app.storage')</option>
                            <option value="8" {{$device->storage == '8' ? 'selected': '' }}>8 GB</option>
                            <option value="16"{{$device->storage == '16' ? 'selected': '' }}>16 GB</option>
                            <option value="32"{{$device->storage == '32' ? 'selected': '' }}>32 GB</option>
                            <option value="64"{{$device->storage == '64' ? 'selected': '' }}>64 GB</option>
                            <option value="128"{{$device->storage == '128' ? 'selected': '' }}>128 GB</option>
                            <option value="256"{{$device->storage == '256' ? 'selected': '' }}>256 GB</option>
                            <option value="512"{{$device->storage == '512' ? 'selected': '' }}>512 GB</option>
                            <option value="00"{{$device->storage == '00' ? 'selected': '' }}>@lang('app.other')</option>
                        </select>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-2 col-form-label" for="ram">Ram : </label>
                        <select class="custom-select col-sm-8" name="ram">
                            <option disabled value="null">@lang('app.ram')</option>
                            <option value="1" {{$device->ram == '1' ? 'selected': '' }}>1 GB</option>
                            <option value="2" {{$device->ram == '2' ? 'selected': '' }}>2 GB</option>
                            <option value="3" {{$device->ram == '3' ? 'selected': '' }}>3 GB</option>
                            <option value="4" {{$device->ram == '4' ? 'selected': '' }}>4 GB</option>
                            <option value="6" {{$device->ram == '6' ? 'selected': '' }}>6 GB</option>
                            <option value="8" {{$device->ram == '8' ? 'selected': '' }}>8 GB</option>
                            <option value="00"{{$device->ram == '00' ? 'selected': '' }}>@lang('app.other')</option>
                        </select>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-2 col-form-label" for="description">Description : </label>

                        <textarea rows="4" id="description" name="description" class="form-control col-sm-8">
                            {{$device->description}}
                        </textarea>
                    </div>
                    <div class="row form-group mr-5 container">
                        <label class="col-sm-2 col-form-label" for="description">Image : </label>

                        <img id="image" src="{{asset('storage/images/'.$device->image)}}"
                             class="col-sm-10" alt="hh" height="180">
                        <a class="btn btn-success" id="changeImage" data-toggle="collapse"
                           href="#collapse-link-collapsed" aria-expanded="false">
                            Change Image ..
                        </a>

                    </div>
                </div>
            </div>
            <div class="form-group">

                <div class="collapse" id="collapse-link-collapsed" style="">
                    <div class="form-group row mb-4">
                        <label class="col-lg-2 col-form-label font-weight-semibold">@lang('app.image'):</label>
                        <div class="col-lg-12">
                            <input type="file" name="image"
                                   class="file-input-custom"
                                   data-show-caption="true" data-show-upload="true" accept="image/*" data-fouc>
                        </div>
                    </div>
                </div>

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

    </div>
    <style>
        .container {
            position: relative;
            width: 100%;
        }

        /* Make the image responsive */
        .container img {
            max-width: 370px;
            max-height: 200px;
        }

        /* Style the button and place it in the middle of the container/image */
        .container .btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .container .btn:hover {
            background-color: black;
        }
    </style>

@endsection
