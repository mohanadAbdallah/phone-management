<!DOCTYPE html>
<html lang="en" dir="rtl">
@include('includes.head')

<body class="bg-slate-800">
<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Login card -->
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <i class="icon-mobile icon-2x text-info-400 border-info-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-4">@lang('app.Login_to_your_account')</h5>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }} " placeholder="@lang('app.email')" required
                                   autocomplete="email" autofocus>
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left mb-5">
                            <input id="password" type="password" placeholder="@lang('app.password')"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-center">
                            <div class="form-check mb-0">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" {{old('remember')}} class="form-input-styled"
                                           checked data-fouc>
                                    @lang('app.Remember')
                                </label>
                            </div>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">@lang('app.login') <i
                                    class="icon-circle-left2 ml-2"></i></button>
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



