@extends('layouts.main')


@section('content')
    <div class="card">

        <div class="card-header header-elements-inline">
            <h5 class="card-title"><b>@lang('app.notifications')</b></h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('includes.messages')
        </div>

        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
            <div class="datatable-header">
                    <div class="dt-buttons">

                    </div>

                    <div class="dt-buttons">
                        <button_print>
                            <button class="dt-button buttons-pdf buttons-html5 btn bg-teal-400" tabindex="0" aria-controls="DataTables_Table_1" type="button"><span>
                            <a  style="color: #ffffff">@lang('app.print')</a> <i class="icon-printer"></i></span></button>
                        </button_print>

                        <div class="dt-buttons">
                            <button class="dt-button buttons-primary buttons-html5 btn bg-primary-400" data-target="#modal_theme_danger" data-toggle="modal"  type="button"><span>
                            <a style="color: #ffffff">@lang('app.notifications')</a> <i class="icon-bell2"></i></span></button>
                        </div>

                        <div class="dt-buttons">
                            <button class="dt-button buttons-danger buttons-html5 btn bg-danger-400"  data-toggle="modal"  type="button"><span>
                            <a  href="{{route('notifications.create')}}" style="color: #ffffff">@lang('app.customer_notifications')</a> <i class="icon-bell2"></i></span></button>
                        </div>
                    </div>

            </div>
            <table class="table datatable-reorder dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">

                <thead>
                <tr class="table-active">
                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="First Name: activate to sort column descending">#</th>
                    <th class="text-center">@lang('app.shop')</th>
                    <th class="text-center" >@lang('app.mobile')</th>
                    <th class="text-center">@lang('app.phone')</th>
                    <th class="text-center">@lang('app.count')</th>
                    <th class="text-center">@lang('app.date')</th>
                    <th class="text-center" >@lang('app.status')</th>



                </tr>
                </thead>
                <tbody>
                @foreach($alert as $item)
                    <tr>
                        <td class="text-center sorting_1">{{++$i}}</td>
                        <td class="text-center">{{$item->shop->name ?? 'N/A'}}</td>
                        <td class="text-center">{{$item->shop->mobile ??'N/A'}}</td>
                        <td class="text-center">{{$item->shop->phone ??'N/A'}}</td>
                        <td class="text-center">{{$item->count_offers??'N/A'}}</td>
                        <td class="text-center">{{ Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</td>

                    @if($item->offer)
                        <td class="text-center"><span class="badge badge-success">{{@trans('app.under_procedure_repeated')}}</span></td>
                        @else
                            <td class="text-center"><span class="badge badge-primary">{{@trans('app.new')}}</span></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="modal_theme_danger" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h6 class="modal-title">@lang('app.send_notifications')  <i class="icon-bell2"></i></h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="{{route('send.notifications')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <h6 class="font-weight-semibold">@lang('app.send_notifications')</h6>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="required form-label" for="name">@lang('app.title')</label>
                                        <input type="text"  name="titel" class="form-control" placeholder="@lang('app.title')">
                                    </div>
                                    <div class="form-group">
                                        <label class="required form-label" for="name">@lang('app.body')</label>
                                        <textarea name="body" class="form-control" >{{old('body')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <label class="col-lg-6 col-form-label font-weight-semibold">@lang('app.image'):</label>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input  value="{{old('img')}}" type="file" name="img" class="file-input form-control-lg" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary btn-lg" data-remove-class="btn btn-light btn-lg" data-fouc>
                                                <span class="form-text text-muted">Large file input button</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <hr>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">@lang('app.close')</button>
                            <button type="submit" class="btn bg-primary">@lang('app.send')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function printData()
            {
                var divToPrint=document.getElementById("printTable");
                newWin= window.open("");
                newWin.document.write(divToPrint.outerHTML);
                newWin.print();
                newWin.close();
            }

            $('button_print').on('click',function(){
                printData();
            });

        </script>
@endsection
