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

                <div class="dropdown-menu dropdown-menu-right " role="alert" aria-labelledby="navbarDropdownMenuLink">
                    @isset($notifications)

                    @if ($notifications->count() > 0 )

                        @foreach($notifications->where('type','App\Notifications\requiredPaymentNotification') as $notification)
                            <div class="alert alert-light" role="alert">
                                <a href="{{route('customers.showPayments',$notification->data['customer_id'] ?? '')}}" style="color: black">
                            <p class="dropdown-item" style="height:15px;">

                                    <b>دفعة مستحقة -- {{ $notification->data['mobile_name'] ?? '' }} - {{ $notification->data['customer_name'] ?? '' }}  </b>
                                    &nbsp;[{{ $notification->created_at->format('Y-m-d') }}]
                            </p>
                                </a>
                                <a href="#">
                                </a>
                            </div>
                        @endforeach
                        @foreach($notifications->where('type','App\Notifications\ExpiredMobileNotification') as $notification)
                            <div class="alert alert-light" role="alert">

                                <p class="dropdown-item" style="height:15px;">

                                    <b>
                                        قسط منتهي --
                                        بتاريخ :
                                        [{{ $notification->created_at->format('Y-m-d') }}]
                                        <b>الجوال  :</b>
                                        {{ $notification->data['mobile_name'] ?? '' }} :-- <b>للزبون </b>
                                        - {{ $notification->data['customer_name'] ?? '' }}  </b>

                            </p>
                                </a>
                                <a href="#">
                                </a>
                            </div>
                        @endforeach

                        <a href="javascript:void(0);" class="dropdown-item" id="mark-all">
                            @lang('app.mark_all_as_read')
                        </a>
                    @else
                        <p class="dropdown-item">@lang('app.there_are_no_new_notifications')</p>
                    @endif
                    @endisset
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
            $('#notificationDropdown').click(function (){
                    $('#alertsCount').text(0);

                })
            });

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
                    if(data.count !== 0){
                        $('#alertsCount').text(data.count);
                    }
                    console.log(data);
                }
            });



            $('.mark-as-read').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });
            $('#mark-all').click(function() {
                let request = sendMarkRequest();
                request.done(() => {
                    $('div.alert').remove();
                })

        });



        function sendMarkRequest(id = null) {
            return $.ajax("{{ route('admin.markNotification') }}", {
                method: 'POST',

                data: {
                    _token: '{{ csrf_token() }}',
                    id
                }
            });
        }


    </script>
@endsection

{{--@section('script')--}}
{{--    <script>--}}


{{--        $(function() {--}}
{{--            $(document).on('click' , '#notificationDropdown' , function(e) {--}}
{{--                e.preventDefault();--}}

{{--                // alert('Yes');--}}

{{--                var base_url = '{{ url('make/NotificationRead/') }}';--}}

{{--                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

{{--                $.ajax({--}}
{{--                    type: 'get',--}}
{{--                    url: base_url,--}}
{{--                    dataType: "json",--}}
{{--                    data: {--}}
{{--                        _token: CSRF_TOKEN,--}}
{{--                    },--}}
{{--                    success: function(data) {--}}
{{--                        $('#alertsCount').text(0);--}}
{{--                    }--}}


{{--                });--}}
{{--                console.log($('#alertsCount'));--}}
{{--            });--}}



{{--            --}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
