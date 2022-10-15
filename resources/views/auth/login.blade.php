
<!DOCTYPE html>
<html lang="en" dir="rtl">
@include('includes.head')

<style type="text/css">
    html , body{
        height: 100%;
    }
    body{
        background: url({{ url('/') }}/portal/assets/images/background.jpg);
        background-size: cover;
    }
    .bg-success{
        background: #858aca;
    }
    .bg-white{
        background: rgb(255 255 255 / 50%) !important;
    }
    .btn-success{
        background-color: #858aca;
        border-color: #858aca;
    }
    main{
        position: absolute;
        width: 100%;
        top: 50%;
        left: 0;
        right: 0;
        margin: auto;
        transform: translateY(-50%);
    }
    .form-control{
        border: 1px solid #858aca;
        border-radius: 15px;
    }
    .card{
        border-radius: 15px;
    }
</style>
<body class="bg-slate-800" style="background-color: #858aca">

<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Login card -->
            <form class="login-form"  method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card mb-0 ">
                    <div class="card-body">
                        <div class="text-center mb-3">


                            <i>          <img src="{{asset('global_assets/images/phone3.png')}}" style="width: 140px"></i>
                            <h5 class="mb-0">@lang('app.Login_to_your_account')</h5>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-center">
                            <div class="form-check mb-0">
                                <label class="form-check-label">
                                    <input class="form-input-styled" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    @lang('app.Remember')
                                </label>
                            </div>

                            {{--                            <a href="{{route('admin.password.request')}}" class="ml-auto"> @lang('app.forgot') </a>--}}
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">@lang('app.login') <i class="icon-circle-left2 ml-2"></i></button>
                        </div>

                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">@lang('app.Dont_have_an_account')</span>
                        </div>

                    </div>
                </div>
            </form>
            <!-- /login card -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>

