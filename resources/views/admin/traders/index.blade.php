@extends('layouts.main')
@section('content')
    @include('includes.messages')
    @include('sweetalert::alert')

    <form action="{{ route('customers.index') }}" id="form_search" enctype="multipart/form-data">
        @csrf
        <div class="input-group col-md-6 mt-5 mb-4 col-sm-12 mb-2"
             style="margin-right: 15px;">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">بحث نصي</span>
                <input type="hidden" name="per_page" class="per_page">
            </div>
            <input type="text" class="form-control" autocomplete="chrome-off"
                   name="q"
                   value="{{request()->get('q')}}"
                   aria-describedby="addon-wrapping">

            <button type="submit" class="btn btn-primary mr-1 ml-1">
                <i class="la la-search"></i> بحث
            </button>
        </div>
    </form>
    <hr>
    <div class="content-body mt-4">
        <div class="row">

            @foreach($traders as $item)
                <div class="col-xl-3">
                    <a href="{{route('traders.show',$item->id)}}">
                        <div class="card text-center crypto-card-3 pull-up" >
                            <div class="card-body" >
                                <i style="color: darkgray;font-size: 70px" class="icon-user"></i>
                            </div>
                            <div class="card-footer text-muted">
                                <h2>
                                            <span style="font-weight: bold; color: green;font-size:20px;">
                                                {{$item->name}}
                                            </span>

                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <div class="col-xl-3">
                <a href="{{route('traders.create')}}">
                    <div class="card text-center crypto-card-3 pull-up" >
                        <div class="card-body" >
                            <i style="color: darkgray;font-size: 70px" class="icon-add"></i>
                        </div>
                        <div class="card-footer text-muted">
                            <h2>
                                            <span style="font-weight: bold; color: green">
                                               @lang('app.add_trader')
                                            </span>
                            </h2>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>


@endsection
