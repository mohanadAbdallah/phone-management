@extends('layouts.main')


@section('content')
    <div class="card">
        @include('includes.messages')
        @include('sweetalert::alert')
        <div class="card-header header-elements-inline">
            <h2 class="card-title"><b>@lang('app.users')</b></h2>
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
                    <button class=" rounded-round dt-button buttons-pdf buttons-html5 btn bg-primary-400" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span><a href="{{route('users.create')}}" style="color: #ffffff">@lang('app.add_user')</a> <i class="icon-googleplus5"></i></span></button>
                </div>
            </div>
            <div class="datatable-scroll">
                <div class="row">
                    @foreach($user as $item)
                    <div class="col-sm-6 col-xl-6">
                        <div class=" card -grey-300 " style="border-radius: 20px;" >
                            <div class=" rounded-round card-header bg-white header-elements-inline"  style="border-bottom-left-radius: 50px;">
                                <h6 class="card-title"> <img src="{{asset('global_assets/images/placeholders/userman.png')}}" class="rounded-circle mr-2" height="34" alt="">
                                    {{$item->name}}</h6>
                                <div class="header-elements">
                                    <div class="list-icons">
                                            <a  href="{{route('users.edit',$item->id)}}" class=" badge pill list-icons-item">
                                                <span class="badge badge-primary badge-pill">  <i class="icon-pencil7"></i></span>
                                            </a>
                                            <a class=" badge pill list-icons-item" data-placement="top" title="Delete"
                                               href="javascript:void(0)"
                                               onclick="delete_item_orders({{$item->id}})"
                                               data-toggle="modal"
                                               data-target="#delete_item_modal">
                                                <span class="badge badge-danger badge-pill"><i class=" icon-trash"></i></span>
                                            </a>
                                        <a href="{{route('users.show',$item->id)}}" class=" badge pill list-icons-item">

                                            <span class="badge badge-success badge-pill"><i class="icon-cog6"></i></span>
                                        </a>

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <p>{{$item->email}}</p>
                                <p> {{$item->mobile}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
            var url = "{{url('ar/users')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#grup_title').text(title);
            $('#del_label_title').html(title);
        }
    </script>
@endsection
