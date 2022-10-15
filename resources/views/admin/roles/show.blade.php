@extends('layouts.main')


@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">

        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

            <div class="card-header header-elements-inline">
                <h3 class="card-title">@lang('app.showRole')</h3>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" href="{{ route('roles.index') }}"><li class="icon-backward2"></li></a>
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-body p-9">
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.role_name')</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark">   {{ $role->name }}</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

            </div>
            <!--end::Card body-->
        </div>
    </div>

</div>

@endsection
