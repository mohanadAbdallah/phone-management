@extends('layouts.main')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom example example-compact">
                <div class="card-header header-elements-inline">
                    <h3 class="card-title">تعديل المستخدمين</h3>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" href="{{ route('users.index') }}"><li class="icon-backward2"></li></a>
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <hr>
            @include('includes.messages')
            <!--begin::Form-->
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form2" novalidate="novalidate"
                      action="{{route('users.update',$user->id)}}" method="post"  enctype="multipart/form-data">
                    @method('put')
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.name')</label>
                            <input type="text" class="form-control" placeholder="@lang('app.name')" name="name" value="{{$user->name}}"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.email')</label>
                            <input type="email" class="form-control" placeholder=" @lang('app.email')" name="email" value="{{$user->email}}"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.phone')</label>
                            <input type="text" class="form-control" placeholder=" @lang('app.phone')" name="mobile" value="{{$user->mobile}}"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.password')</label>
                            <input type="password" class="form-control" placeholder=" @lang('app.password')" name="password"/>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.repassword')</label>
                            <input type="password" class="form-control" placeholder="@lang('app.repassword')" name="confirm-password"/>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1" class="required form-label">@lang('app.role')</label>
                            <select name="roles[]" multiple="multiple" data-placeholder="Select a State..." class="form-control form-control-lg select" data-container-css-class="select-lg" data-fouc>

                                @foreach($userRole as $Role)
                                    <option  {{$Role ? 'selected' : ''}}>{{$Role}}</option>
                                @endforeach
                            @foreach($roles as $item)
                                    <option>{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">@lang('app.update') <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
