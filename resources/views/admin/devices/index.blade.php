@extends('layouts.main')


@section('content')
    <div class="card">
    @include('includes.messages')
    @include('sweetalert::alert')
    <!-- Multiple titles -->
        <div class="card-header text-right mb-3">
            <a href="{{route('devices.create')}}" class="btn btn-primary">@lang('app.add_device')</a>
        </div>
        <div class="row mb-2">
            @foreach($devices as $device)
                <div class="col-sm-4">
                    <div class="card ml-3 mr-3" style="max-width: 18rem;">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <span><i class="icon-mobile mr-2"></i></span>
                            <span class="text-muted">@lang('app.added')
                                {{ $device->created_at ? $device->created_at->diffForHumans(): '--' }}
                            </span>
                        </div>
                        <div class="card-img-actions">
                            <img class="img-fluid" src="{{asset('storage/images/'.$device->image)}}" alt="">
                            <div class="card-img-actions-overlay">
                                <a href="{{asset('storage/images/'.$device->image)}}"
                                   class="btn btn-outline bg-white text-white border-white border-2"
                                   data-popup="lightbox">
                                    @lang('app.preview')                    </a>
                                <a href="{{route('devices.show',$device->id)}}"
                                   class="btn btn-outline bg-white text-white border-white border-2 ml-2">
                                    @lang('app.details')
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title font-weight-semibold">{{$device->type}} {{$device->name}}</h6>

                            <p> {{ substr($device->description,'0','100') .'...' }}</p>


                        </div>
                        <div class="card-footer">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class=""
                                       href="{{route('devices.edit',$device->id)}}">@lang('app.edit')
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a data-placement="top" title="Delete"
                                       class=""
                                       href="javascript:void(0)"
                                       onclick="delete_item_devices('{{$device->id}}','{{$device->type}}','{{$device->name}}')"
                                       data-toggle="modal"
                                       data-target="#delete_item_modal">@lang('app.delete')</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    <!-- /multiple titles -->
        <div class="mr-3 ml-3 mb-3 d-flex justify-content-end ">
            {{ $devices->links() }}
        </div>

    </div>

    <!-- /.modal-dialog -->
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
                        <h4 class="modal-title" id="myModalLabel">@lang('app.confirm_delete')
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>@lang('app.Are you sure, delete this device ?')</h4>
                        <p id="group_title"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info waves-effect"
                                data-dismiss="modal">@lang('app.close')</button>
                        <button type="submit" class="btn btn-danger waves-effect"
                                id="delete_url">@lang('app.delete')</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->

    <script>
        function delete_item_devices(id, type, name) {
            $('#item_id').val(id);
            var url = "{{url('ar/devices')}}/" + id;
            $('#delete_form').attr('action', url);
            $('#group_title').text(type + ' - ' + name);
            $('#del_label_title').html(type);
        }
    </script>
@endsection
