<div class="navbar navbar-expand-md navbar-dark" style="background-color: #ffffff" id="navbar-mobile">
    <div class="navbar-brand">

    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block" style="color: #000000">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
        <span class="badge bg-success ml-md-3 mr-md-auto">@lang('app.Online')</span>

        <ul class="navbar-nav">

            <li class="nav-item dropdown language-dropdown ml-1  ml-lg-0">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="flagDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/img/'.LaravelLocalization::getCurrentLocale().'.png')  }}" alt="" width="40px" height="20"> <span class="d-lg-inline-block d-none"></span>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="flagDropdown">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img src="{{ asset('assets/img/'.$localeCode.'.png') }}"width="16" height="11" alt="">
                            &#xA0; {{ $properties['native'] }}
                        </a>
                    @endforeach

                </div>
            </li>
            <li class="nav-item dropdown">
                <a href="javascript:void(0);" class="navbar-nav-link dropdown-toggle caret-0" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000000">

                    <i class="icon-bell2"></i>
                    <span class="d-md-none ml-2">Messages</span>
                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0" id="alertsCount">0</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-header">
                        <span class="font-weight-semibold">@lang('app.notification')</span>
                        <a href="#" class="text-default"><i class="icon-bell2"></i></a>
                    </div>

{{--                    <div class="dropdown-content-body dropdown-scrollable" id="notificationDropdown">--}}
{{--                        <ul class=" notificationlist media-list" >--}}
{{--                            @isset($alert)--}}
{{--                            @foreach($alert as $item)--}}
{{--                            <li class="media">--}}
{{--                                <div class="mr-3 position-relative">--}}
{{--                                    <img src="{{asset('global_assets/images/placeholders/notification.png')}}" width="36" height="36" class="rounded-circle" alt="">--}}
{{--                                </div>--}}

{{--                                <div class="media-body">--}}
{{--                                    <div class="media-title">--}}
{{--                                        <a href="#">--}}
{{--                                            <span class="font-weight-semibold">{{$item->shop->name}}</span>--}}
{{--                                            <span class="text-muted float-right font-size-sm">{{ Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <span class="text-muted">{{$item->message}}</span>--}}
{{--                                    <span class="text-muted">{{$item->shop->mobile}}</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            @endforeach--}}
{{--                            @endisset--}}
{{--                                <div class="notificationlist">--}}

{{--                                </div>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown" style="color: #000000">
                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
                    <span> {{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{route('show.profile')}}" class="dropdown-item"><i class="icon-user-plus"></i> @lang('app.profile')</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i> @lang('app.logout')</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
@section('script')
    <script>


        $(function() {
            $(document).on('click' , '#notificationDropdown' , function(e) {
                e.preventDefault();

                // alert('Yes');

                var base_url = '{{ url('make/NotificationRead/') }}';

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'get',
                    url: base_url,
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                    },
                    success: function(data) {
                        $('#alertsCount').text(0);
                    }


                });
                console.log($('#alertsCount'));
            });



            setInterval(() => {
                var alerts_url = '{{ url('get/Unread/Notification') }}' + '/' + 1;
                var csrftoken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'get',
                    url: alerts_url,
                    dataType: "json",
                    cache: false,
                    data: {
                        _token: csrftoken,
                    },
                    success: function(data) {
                        if (data.count != 0) {

                            $notify = "{{asset('global_assets/sound/notifyy.mp3')}}";
                            var audioElement = document.createElement('audio');
                            audioElement.setAttribute('src', $notify);

                            $('.notificationlist').empty();
                            data.notifications.forEach(notifications => {
                                var str = notifications.message.substring(0,40);
                                var text = '<a class="dropdown-item text-center  p-1" href="javascript:void(0);">' +
                                    '<div class="notification-list ">'+
                                    '<div class="notification-item position-relative  mb-3">'+
                                    '<span class="mb-1">'+ str + '</span>'+
                                    '</div>'+
                                    '</div>'+
                                    '</a>';
                                $('.notificationlist').append(text);

                            });

                            audioElement.play();
                            $('#alertsCount').text(data.count);
                            audioElement.stop()
                        }


                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });

            }, 10000);
        });
    </script>
@endsection
