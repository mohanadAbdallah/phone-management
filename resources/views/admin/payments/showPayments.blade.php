@extends('layouts.main')

<style>
    .hovertext {
        position: relative;
         }

    .hovertext:before {
        content: attr(data-hover);
        visibility: hidden;
        opacity: 0;
        width: 140px;
        background-color: #000000;
        color: #fff;
        text-align: center;
        border-radius: 5px;
        padding: 5px 0;
        transition: opacity 0.4s ease-in-out;
        position: absolute;
        z-index: 1;
        left: 0;
        top: 110%;
    }

    .hovertext:hover:before {
        opacity: 1;
        visibility: visible;
    }

</style>
@section('content')
    @include('includes.messages')
    @include('sweetalert::alert')

    <div class="card-header header-elements-inline">
        <div class="header-elements">
            <div class="content-header row ml-3">
                <div class="content-header-left">
                    <h3 class="content-header-title"> </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"> <a href="{{route('mobiles.index')}}">@lang('app.customers') </a> </li>
                                <li class="breadcrumb-item active"><a href="{{route('customers.show',$customer->id)}}"> {{$customer->customer_name  ?? '--'}} </a> </li>

                            </ol>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <form name="print-form" method="post" action="{{route('payments.print',$customer->mobile->id)}}">
            @method('post')
            @csrf
            <button type="submit" formtarget="_blank" class="btn btn-success ml-1 mb-2 print-btn " style="float: left" >
                <i class="icon-printer  mx-2"></i>
                @lang('app.print')
                <span
                    class="print-selected"
                    style="color: #ffffff;font-weight: bold;padding: 5px;"></span>
            </button>

        </form>
    </div>

    <form action="{{route('payments.store',$customer->mobile->id)}}" method="post">
        @method('POST')
        @csrf

    <div class="card">

        <div class="card-header header-elements-inline">
            <div class="header-elements">
                <h2 class="card-title"><b>{{$customer->customer_name  ?? '--'}}</b></h2>

            </div>

            <a class="btn btn-danger" href="javascript:void(0)"
               onclick="delete_all('{{$customer->mobile->id}}')"
               data-toggle="modal"
               data-target="#delete_payments_modal">@lang('app.delete_all')
                <i class="icon-trash  mx-2"></i>
            </a>
        </div>

        <div class="card-body">
            <div id="DataTables_Table_0_wrapper"  class="dataTables_wrapper no-footer">
                <div class="datatable-scroll">
                    <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr role="row" class="table-active">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('app.id')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending">@lang('app.payment')</th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.description')</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.date')</th>
                            <th  hidden class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.type_account')</th>
                            <th class="text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer->mobile->mobile_payments as $item)
                        <tr>
                                <td>{{++$i}}</td>
                                <td>{{$item->payment ?? '--'}}</td>
                                <td>{{$item->description ?? '--'}}</td>
                                <td>
                                    <span class="hovertext" data-hover="{{$item->created_at->format('Y-m-d') ?? '--'}}">
                                        {{\Carbon\Carbon::parse($item->created_at)->diffForHumans(\Carbon\Carbon::now(),null,false,2)}}
                                    </span>
                                </td>

                            <td class="text-center" >
                                <div class="list-icons">

                                    <a class="list-icons-item" data-placement="top" title="Delete"
                                       href="javascript:void(0)"
                                       onclick="delete_item_customers('{{$item->id}}','{{$item->payment}}')"
                                       data-toggle="modal"
                                       data-target="#delete_item_modal">
                                        <span class="badge badge-danger badge-pill"><i class=" icon-trash"></i></span>

                                    </a>

                                </div>
                            </td>
                        </tr>
                            <!--Edit Modal -->
                        <div class="modal fade" id="edit" tabindex="-1" style="margin-top: 100px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">@lang('app.edit')</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" placeholder="@lang('app.add_new_payment')" name="payment">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" type="text" placeholder="@lang('app.description')" name="description">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" value="{{$customer->mobile->created_at}}" type="date" name="created_at">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('app.close')</button>
                                        <button type="submit" class="btn btn-primary" name="edit" value="edit">@lang('app.save')</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        <tr>
                            <td>
                                @lang('app.dir')
                            </td>
                            <td><input class="form-control" type="text" placeholder="@lang('app.add_new_payment')" name="payment"></td>
                            <td><input class="form-control" type="text" placeholder="@lang('app.description')" name="description"></td>
                            <td><input class="form-control" value="{{$customer->mobile->created_at->format('Y-m-d')}}" type="date" name="created_at"></td>

                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="card-footer align-content-end">
            <button type="submit" class="btn btn-success" name="add" value="add" style="float: @lang('app.dir2');">@lang('app.add')</button>
            <a href="{{route('mobiles.index')}}" class="btn btn-danger" style="margin-@lang('app.dir2'): 5px;float: @lang('app.dir2');">@lang('app.back')</a>
        </div>
    </div>

    </form>

    <!--DELETE ITEM Modal -->
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
                        <h4 class="modal-title" id="myModalLabel">@lang('app.delete')<span id="del_label_title"></span>
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

    <!--DELETE PAYMENTS Modal -->
    <div id="delete_payments_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="delete_all_form" method="post" action="">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input name="id" id="payments_id" class="form-control" type="hidden">
                    <input name="_method" type="hidden" value="DELETE">
                    <div class="modal-header">
                        <h4>@lang('app.confirm_delete_all')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">

                        <h5>@lang('app.confirm_delete_question')</h5>

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
            var url = "{{url('ar/payments')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#grup_title').text(title);
            $('#del_label_title').html(title);
        }
        function delete_all(id) {
            $('#payments_id').val(id);
            var url = "{{url('ar/delete-all-payments')}}/"+id;
            $('#delete_all_form').attr('action', url);
        }
    </script>


@endsection
