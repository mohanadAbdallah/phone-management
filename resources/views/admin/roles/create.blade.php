@extends('layouts.main')


@section('content')

<style>
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #a585ca;
        border-color: #2196f3;
    }
</style>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h3 class="card-title">@lang('app.addrole')</h3>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" href="{{ route('roles.index') }}"><li class="icon-backward2"></li></a>
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        @include('includes.messages')

        <div class="card-header border-0 pt-5">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="post" action="{{route('roles.store')}}">

@csrf
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>@lang('app.role_name')</strong>
                        <input type="text" class="form-control" name="name" {{old('name')}} placeholder="@lang('app.name')">

                    </div>
                </div>
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" style="float:@lang('app.dir2')" class="btn btn-primary">@lang('app.save')</button>
                </div>
            </div>
            </form>
        </div>

    </div>

@endsection





