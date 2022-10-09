@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <div class="row mr-2 ml-2">
        <button type="text" class="alert alert-rounded btn-block alert-success mb-2"
                id="type-error">{{Session::get('success')}}
        </button>
    </div>
@endif



@if (session('danger'))
    <div class="alert alert-danger" role="alert" style="margin: 50px">
        {{session('danger')}}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    </div>
@endif

@if (session('info'))
    <div class="alert alert-info" role="alert" style="margin: 50px">
        {{session('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    </div>
@endif
