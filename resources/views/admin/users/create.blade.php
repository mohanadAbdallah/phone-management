@extends('layouts.main')


@section('content')

    <div class="d-flex flex-column-fluid">

        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom example example-compact">
                <div class="card-header">
                    <h2 class="card-title">اضافة مستخدم جديد</h2>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">

                        </div>
                    </div>
                </div>
            @include('includes.messages')

            <!--begin::Form-->
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" novalidate="novalidate" method="post" action="{{route('users.store')}}"enctype="multipart/form-data" >
                    @csrf
                    <div class="card-body">


                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.name')</label>
                            <input type="text" class="form-control rounded-round" placeholder="@lang('app.name')" name="name"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.email')</label>
                            <input type="email" class="form-control rounded-round" placeholder=" @lang('app.email')" name="email"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.phone')</label>
                            <input type="text" class="form-control rounded-round" placeholder=" @lang('app.phone')" name="phone"/>
                        </div>

                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.password')</label>
                            <input type="password" class="form-control rounded-round" placeholder="@lang('app.password')" name="password"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.repassword')</label>
                            <input type="password" class="form-control rounded-round" placeholder="@lang('app.repassword')" name="confirm-password"/>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.role')</label>
                            <select name="roles[]" multiple="multiple" data-placeholder="Select a State..." class="form-control form-control-lg select" data-container-css-class="select-lg" data-fouc>
                             @foreach($roles as $item)
                                <option>{{$item}}</option>
                                @endforeach

                            </select>
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

@endsection
