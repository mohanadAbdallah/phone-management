@extends('layouts.main')


@section('content')
    @include('includes.messages')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h2 class="card-title"><b>@lang('app.premiums')</b></h2>
            <div class="header-elements">
                <div class="list-icons">
                </div>
            </div>
        </div>

        <div class="card-body">
        </div>

        <div id="DataTables_Table_0_wrapper"  class="dataTables_wrapper no-footer">
            <div class="datatable-header">

                <div class="dt-buttons">
                    <button class=" rounded-round dt-button buttons-pdf buttons-html5 btn bg-primary-400" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span><a href="{{route('mobiles.create')}}" style="color: #ffffff">@lang('app.add_premium')</a> <i class="icon-googleplus5"></i></span></button>
                </div>
            </div>

            <div class="datatable-scroll">
                <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                    <tr role="row" class="table-active">
                        <th class="sorting_asc" style="width: 10%" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('app.id')</th>
                        <th class="sorting" style="width: 10%" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending">@lang('app.name')</th>
                        <th class="sorting" tabindex="0" style="width: 15%" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.phone')</th>
                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.address')</th>
                        <th class="text-center sorting_disabled" style="width: 17%" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.remain')</th>
                        <th class="text-center sorting_disabled" style="width: 20%" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.mobile')</th>
                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.actions')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customer as $item)
                        <tr role="row" class="odd">
                            <td >{{++$i}}</td>
                            <td style="width: 20%">
                                <a href="{{route('customers.showPayments',$item->id)}}">
                                    <span>{{$item->customer_name ?? '--'}}</span>
                                </a>

                            </td>
                            <td style="width:10%">{{$item->phone ?? '--'}}</td>
                            <td >
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#addressModal-{{$item->id}}">
                                    <span class="badge badge-secondary" style="font-size: 8px;">عرض العنوان </span>
                                </a>
                            </td>
                            <td style="text-align: center">

                                   <a href="{{route('customers.showPayments',$item->id)}}" style="color: black">
                                            <span class="badge badge-success" style="background-color: #00860a; font-size: 10px;">{{$item->mobile->residual}}</span>
                                        </a>

                            </td>
                            <td>
                                <ul>

                                        <li> <a href="{{route('mobiles.show',$item->mobile->id)}}">
                                            <span style="font-size: 12px;">{{$item->mobile->mobile_name ?? '--'}}</span>
                                        </a>
                                    </li>
                                    </ul>
                            </td>
                            <td class="text-center" >
                                <div class="list-icons">
                                    <a href="{{route('customers.edit',$item->id)}}" class="list-icons-item">
                                        <span class="badge badge-primary badge-pill">  <i class="icon-pencil7"></i></span>

                                    </a>
                                    <a href="{{route('customers.show',$item->id)}}" class="list-icons-item">
                                        <span class="badge badge-success badge-pill"><i class="icon-cog6"></i></span>
                                    </a>

                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="addressModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">العنوان</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{$item->address}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('app.close')</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

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
