@extends('layouts.main')


@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h3 class="card-title">@lang('app.security_question')</h3>
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
        @include('includes.messages')
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="datatable-header">
                <div class="dt-buttons">
                    <button type="button" class="btn bg-danger form-control" data-toggle="modal" data-target="#modal_theme_danger">@lang('app.add') <i class="icon-plus3"></i></button>
                </div>
            </div>

            <div class="datatable-scroll">
                <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">#</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.question_ar')</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="Job Title: activate to sort column ascending">@lang('app.question_en')</th>

                        <th class="text-center sorting_disabled" rowspan="1" colspan="1" data-column-index="5" aria-label="Actions" style="width: 100px;">@lang('app.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($securityQuestion as $item)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{++$i}}</td>
                        <td>{{$item->text_ar}}</td>
                        <td>{{$item->text_en}}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                @if($item->status == 0)
                                    <a  href="{{route('question.activate',$item->id)}}" data-toggle="tooltip" data-placement="top" title="Active">
                                        <il class="icon-eye"></il>
                                    </a>
                                @else
                                    <a href="{{route('question.activate',$item->id)}}" data-toggle="tooltip" data-placement="top" title="Disable">
                                        <il class="icon-eye-blocked"></il>
                                    </a>
                                @endif
                                <a class="list-icons-item" data-placement="top" title="Delete"
                                   href="javascript:void(0)"
                                   onclick="delete_item_orders('{{$item->id}}')"
                                   data-toggle="modal"
                                   data-target="#delete_item_modal"><i class="icon-trash"></i></a>
                            </div>

                        </td>
                    </tr>
                    @endforeach



                    </tbody>
                </table>
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

    <div id="modal_theme_danger" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h6 class="modal-title">@lang('app.security_question')</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('securityQuestion.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <h6 class="font-weight-semibold">@lang('app.security_question')</h6>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text"  name="text_ar" class="form-control" placeholder="text_ar">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text"  name="text_en" class="form-control" placeholder="text_en">
                                </div>
                            </div>
                        </div>


                        <hr>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">@lang('app.close')</button>
                        <button type="submit" class="btn bg-danger">@lang('app.update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function delete_item_orders(id, title) {
            $('#item_id').val(id);
            var url = "{{url('ar/securityQuestion')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#grup_title').text(title);
            $('#del_label_title').html(title);
        }
    </script>
@endsection
