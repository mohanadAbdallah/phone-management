{{--@section('content')--}}
{{--    <div class="card">--}}

{{--        <div class="card-header header-elements-inline">--}}
{{--            <h2 class="card-title"><b>@lang('app.customers')</b></h2>--}}
{{--            <div class="header-elements">--}}
{{--                <div class="list-icons">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="card-body">--}}
{{--            <div id="DataTables_Table_0_wrapper"  class="dataTables_wrapper no-footer">--}}
{{--                <div class="datatable-scroll">--}}
{{--                    <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">--}}
{{--                        <thead>--}}
{{--                        <tr role="row" class="table-active">--}}
{{--                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">@lang('app.id')</th>--}}
{{--                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending">@lang('app.name')</th>--}}
{{--                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.email')</th>--}}
{{--                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.phone')</th>--}}
{{--                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.address')</th>--}}
{{--                            <th class="text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.actions')</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($customer as $item)--}}
{{--                        <tr>--}}
{{--                            <td>{{++$i}}</td>--}}
{{--                            <td>{{$item->customer_name}}</td>--}}
{{--                            <td>{{$item->email}}</td>--}}
{{--                            <td>{{$item->phone}}</td>--}}
{{--                            <td>{{$item->address}}</td>--}}
{{--                            <td></td>--}}
{{--                        </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}


{{--    </div>--}}

{{--    <script>--}}
{{--        function delete_item_customers(id, title) {--}}
{{--            $('#item_id').val(id);--}}
{{--            var url = "{{url('ar/customers')}}/" + id;--}}
{{--            $('#delete_form').attr('action', url);--}}
{{--            $('#grup_title').text(title);--}}
{{--            $('#del_label_title').html(title);--}}
{{--        }--}}
{{--    </script>--}}
{{--@endsection--}}

@extends('layouts.main')


@section('content')
    <div class="content-body">
        <div class="row">

                    @foreach($customer as $item)
                        <div class="col-xl-3">
                            <a href="{{route('customers.show',$item->id)}}">
                                <div class="card text-center crypto-card-3 pull-up" >
                                    <div class="card-body" >
                                        <i style="color: darkgray;font-size: 70px" class="icon-user"></i>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <h2>
                                            <span style="font-weight: bold; color: green">
                                                {{$item->customer_name}}
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                        <div class="col-xl-3">
                            <a href="{{route('customers.create')}}">
                                <div class="card text-center crypto-card-3 pull-up" >
                                    <div class="card-body" >
                                        <i style="color: darkgray;font-size: 70px" class="icon-add"></i>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <h2>
                                            <span style="font-weight: bold; color: green">
                                               @lang('app.add_user')
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>

        </div>
    </div>


@endsection
