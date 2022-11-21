@extends('layouts.main')


@section('content')
    @include('includes.messages')
    @include('sweetalert::alert')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">

            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">

                <div class="card-header header-elements-inline">
                    <h3 class="card-title">@lang('app.customer_data')</h3>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" href="{{ route('customers.index') }}"><li class="icon-backward2"></li></a>
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body p-9">

                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.name')</label>
                        <div class="col-lg-8">
                            <span class="fw-bolder fs-6 text-dark">{{ $customer->customer_name }}</span>
                        </div>
                    </div>

                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.address')</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6">  {{ $customer->address }}</span>
                        </div>
                    </div>

                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.phone')
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bolder fs-6 me-2" >{{ $customer->phone }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.alternative_phone')
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <span class="fw-bolder fs-6 me-2" >{{ $customer->alternative_phone ?? '--'}}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.mobile_name')</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6">  {{ $customer->mobile->mobile_name ?? ''}}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.date_of_buy')</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6">  {{ $customer->mobile->created_at?? '--' }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.residual')</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6">  {{ $customer->mobile->residual ?? '--' }}</span>
                        </div>
                    </div>
                    <div class="row mb-7">
                        <label class="col-lg-4 fw-bold text-muted" style="font-size: 14px">@lang('app.identity')</label>
                        <div class="col-lg-8 fv-row">
                            <span class="fw-bold fs-6">  {{ $customer->identity ?? '--' }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-danger" data-placement="top" title="Delete" style="float: @lang('app.dir2')"
                       href="javascript:void(0)"
                       onclick="delete_item_customers('{{$customer->id}}','{{$customer->customer_name}}')"
                       data-toggle="modal"
                       data-target="#delete_item_modal">@lang('app.delete')</a>
                    <a href="{{route('customers.edit',$customer->id)}}"  style="float: @lang('app.dir2')" class="btn btn-primary ml-2 mr-2">@lang('app.edit')</a>
                </div>


            </div>

        </div>

    </div>

    <div id="delete_item_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="delete_form" method="post" action="">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input name="id" id="item_id" class="form-control" type="hidden">
                    <input name="_method" type="hidden" value="DELETE">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">@lang('app.delete')
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>@lang('app.confirm_delete_item')</h4>
                        <p id="grup_title"></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">@lang('app.close')</button>
                        <button type="submit" class="btn btn-danger waves-effect" id="delete_url">@lang('app.delete')</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->

    <script>
        function delete_item_customers(id, title) {
            $('#item_id').val(id);
            var url = "{{url('ar/customers')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#grup_title').text(title);
            $('#del_label_title').html(title);
        }
    </script>

@endsection
