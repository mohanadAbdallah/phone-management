@extends('layouts.main')


@section('content')


    <div class="content">

        <div class="card">
            <div class="card-header header-elements-inline">
                <h3 class="card-title">@lang('app.profile')</h3>
            </div>
            <hr>

            <div class="card-body">

                <form class="rated" action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-5 ">


                            <div class="form-group">
                                <label class=" font-size-lg control-label" for="name">@lang('app.name')</label>
                                <input type="text" class="form-control" id="name_ar" name="name" value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label class=" font-size-lg control-label" for="email">@lang('app.email')</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                            </div>



                            <div class="form-group">
                                <label class=" font-size-lg control-label" for="mobile">@lang('app.phone')</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{$user->phone}}">
                            </div>

                            <div class="form-group">
                                <a class="btn btn-success" data-toggle="collapse" href="#collapse-link-collapsed" aria-expanded="false">
                                  @lang('app.changepassword')
                                </a>
                                <div class="collapse" id="collapse-link-collapsed" style="">
                                    <div class="mt-3">
                                        <label class="control-label" for="password">@lang('app.password')</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">@lang('app.update') <i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    @endsection
