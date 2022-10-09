@extends('layouts.main')


@section('content')
    <style>
        .bg-blue-400 {
            background-color: #7931ad;
        }
        .bg-success-400 {
            background-color: #d645cf;
        }
        .bg-danger-400 {
            background-color: rgba(178, 69, 255, 0.51);
        }

        .badge-primary {
            color: #fff;
            background-color: #7931ad;
        }
        .badge-danger {
            color: #fff;
            background-color: #d645cf;
        }
        .badge-success {
            color: #fff;
            background-color: rgba(136, 15, 224, 0.51);
        }
        .badge-secondary {
            color: #fff;
            background-color: rgba(178, 69, 255, 0.51);
        }
        .to-top {
            color: #400057;
        }
        .to-bottom {
            color: rgba(193, 21, 168, 0.6);
            text-decoration: none;
            background-color: transparent;
        }
    </style>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h3 class="card-title">@lang('app.vehicles')</h3>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
        </div>
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="datatable-header">
                    <div class="dt-buttons">
                        <button class=" rounded-round dt-button buttons-pdf buttons-html5 btn bg-primary-400"  style=" background-color: #bb66b2" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>
                            <a class="font-weight-bold font-size-lg" href="{{route('vehicle.create')}}" style="color: #ffffff">@lang('app.add_car')</a> <i class="icon-googleplus5"></i></span></button>
                    </div>
            </div>
            <div class="datatable-scroll">
                <form class="rated categories-order-update-form" action="{{route('vehicle.order.update')}}"
                      method="post"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr role="row" class="table-active">
                            <th class="text-center font-size-lg sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">#</th>
                            <th class="text-center font-size-lg sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending">@lang('app.image')</th>
                            <th class="text-center font-size-lg sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="4" aria-label="Status: activate to sort column ascending">@lang('app.color')</th>
                            <th class="text-center font-size-lg sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.name')</th>
                            <th class="text-center font-size-lg sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="3" aria-label="DOB: activate to sort column ascending">@lang('app.manufacture_history')</th>
                            <th class="text-center font-size-lg sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="4" aria-label="Status: activate to sort column ascending">@lang('app.vehicle_type')</th>
                            <th class="text-center font-size-lg sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="4" aria-label="Status: activate to sort column ascending">@lang('app.ranking')</th>
                            <th class="text-center font-size-lg text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vehicle as $item)
                            <tr role="row" class="row-tr">
                                <td class="sorting_1 text-center">{{++$i}}</td>
                                <td class="text-center">
                                    <img src="{{$item->image_url}}" alt="img" style="width: 40px;border-radius: 5px;">
                                </td>
                                <td class="text-center">{{$item->color ??'--'}}</td>
                                <td class="text-center">{{$item->name ?? '--'}}</td>
                                <td class="text-center">{{$item->manufacture_history ??'--'}}</td>
                                <td class="text-center">{{$item->vehicleType->name?? '--'}}</td>


                                <td class="text-center">
                                    <input type="hidden" class="" value="{{$item->id}}" name="id[]">
                                    <input type="hidden" class="order" value="{{$item->id}}" name="order[]">
                                    <a href="#" class="to-top">
                                        <i class="icon-circle-up2" style="font-size: 22px;">

                                        </i>
                                    </a>
                                    <a href="#" class="to-bottom"><i class="icon-circle-down2" style="font-size: 22px;">
                                        </i>
                                    </a>
                                </td>

                                <td class="text-center">
                                    <div class="list-icons">
                                            <a  href="{{route('vehicle.edit',$item->id)}}" class=" badge pill list-icons-item">
                                                <span class="badge badge-primary badge-pill">  <i class="icon-pencil7"></i></span>
                                            </a>
                                            <a class=" badge pill list-icons-item" data-placement="top" title="Delete"
                                               href="javascript:void(0)"
                                               onclick="delete_item_orders('{{$item->id}}')"
                                               data-toggle="modal"
                                               data-target="#delete_item_modal">
                                                <span class="badge badge-danger badge-pill"><i class=" icon-trash"></i></span>
                                            </a>
                                        <a href="{{route('vehicle.show',$item->id)}}" class=" badge pill list-icons-item">

                                            <span class="badge badge-success badge-pill"><i class="icon-cog6"></i></span>
                                        </a>
                                        <a href="{{route('vehicles.create.renewal',$item->id)}}" class=" badge-pill list-icons-item">
                                            <span class="badge badge-secondary badge-pill"><i class="icon-reply-all"></i></span>
                                        </a>

                                    </div>

                                </td>
                            </tr>
                        @endforeach



                        </tbody>
                    </table>
                </form>
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
            <!-- /.modal-dialog -->
        </div>

    </div>


    <script>
        function delete_item_orders(id, title) {
            $('#item_id').val(id);
            var url = "{{url('ar/vehicle')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#grup_title').text(title);
            $('#del_label_title').html(title);
        }
    </script>
    <script>
        $(document).on('click', '.to-top', function () {
            console.log('hello hey')
            var currentRow = $(this).parent().parent();
            if (currentRow.prev().hasClass('row-tr')) {
                currentRow.prev().before(currentRow);
                changeColor(currentRow);
                reOrder();

            }
            return false;
        });
        $(document).on('click', '.to-bottom', function () {
            var currentRow = $(this).parent().parent();
            if (currentRow.next().hasClass('row-tr')) {
                currentRow.next().after(currentRow);
                changeColor(currentRow)
                reOrder();
            }
            return false;
        });

        function changeColor(currentRow) {
            currentRow.css('background-color', '#c7ffcb');
            setTimeout(function () {
                currentRow.css('background-color', 'white');
            }, 500);
        }

        function reOrder() {
            $('table tbody tr .order').each(function (i) {
                $(this).val(++i);
            });
            var form = $('.categories-order-update-form');
            var values = form.serialize();
            var url = form.attr('action');
            var token = $('input[name="_token"]').attr('value');
            $.ajax({
                url: url,
                type: 'post',  // http method
                data: values,  // data to submit
                headers: {
                    'X-CSRF-Token': token
                },
                success: function (data, status, xhr) { // after success your get data

                },
                error: function (jqXhr, textStatus, errorMessage) { // if any error come then

                }
            });

        }
    </script>

@endsection
