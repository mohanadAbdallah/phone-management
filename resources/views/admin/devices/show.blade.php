@extends('layouts.main')


@section('content')
    @include('includes.messages')
    @include('sweetalert::alert')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">

            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

                <div class="card-header header-elements-inline">
                    <h3 class="card-title">@lang('app.device_details')</h3>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" href="{{ route('devices.index') }}"><li class="icon-backward2"></li></a>
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body p-9">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.type')</label>
                                <div class="col-lg-8">
                                    <span class="fw-bolder fs-6 text-dark">{{ $device->type }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.name')</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">  {{ $device->name }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.storage')</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">  {{ $device->storage }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.ram')</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">  {{ $device->ram }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.description')</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">  {{ $device->description }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.color')
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"></i></label>
                                <div class="col-lg-8 d-flex align-items-center">
                                    <span class="badge" style="background-color: {{$device->color}};color: {{$device->color}}">{{ $device->color }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                        <img src="{{asset('storage/images/'.$device->image)}}" style=" border-radius: 10px;" height="300" >
                        </div>
                    </div>


                </div>

            </div>

        </div>

    </div>
@endsection
