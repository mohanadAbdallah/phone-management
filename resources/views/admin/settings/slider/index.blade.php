@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">@lang('app.sliders')</h5>
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
                    <button class="dt-button buttons-pdf buttons-html5 btn bg-teal-400" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>
                            <a href="{{route('slider.create')}}" style="color: #ffffff">@lang('app.add')</a> <i class="icon-googleplus5"></i></span></button>
                </div>
            </div>
            <div class="datatable-scroll">
                <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">#</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="Last Name: activate to sort column ascending">@lang('app.image')</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="3" aria-label="DOB: activate to sort column ascending">@lang('app.description')</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="3" aria-label="DOB: activate to sort column ascending">@lang('app.link')</th>
                        <th></th>
                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.action')</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($slider as $item)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{++$i}}</td>
                            <td>
                                <img src="{{$item->image_url}}" alt="img" style="width: 40px;border-radius: 5px;">
                            </td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->link}}</td>
                            <td></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <a href="{{route('slider.edit',$item->id)}}" class="list-icons-item">
                                        <span class="badge badge-primary badge-pill"><i class="icon-pencil7"></i></span></a>
                                    <a class="list-icons-item" data-placement="top" title="Delete"
                                       href="javascript:void(0)"
                                       onclick="delete_item_orders('{{$item->id}}')"
                                       data-toggle="modal"
                                       data-target="#delete_item_modal">
                                        <span class="badge badge-danger badge-pill"><i class="icon-trash"></i></span></a>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
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


    <script>
        function delete_item_orders(id, title) {
            $('#item_id').val(id);
            var url = "{{url('ar/slider')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#grup_title').text(title);
            $('#del_label_title').html(title);
        }
    </script>
@endsection
