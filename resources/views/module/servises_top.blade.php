<div class="container-fluid" style="height: 40px; border: 1px solid rgb(241, 241, 241)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-md-12 col-sm-12 d-xl-block d-lg-block d-md-none d-sm-none d-none " style="height: 10px">
                <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; background: lightskyblue; padding: 9px 9px 0px 10px">
                    <i class="far fa-clock" style="opacity: 0.5"></i>
                    <span style="margin-top: -3px; font-size: 10px">{{ __('calendar.'.now()->format('l')).' '.now()->format('d').' '.__('calendar.'.now()->format('F')) }}</span>
                </div>
                <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                    <i class="fas fa-cloud-sun-rain" style="opacity: 0.5"></i>
                    <span style="margin-top: -3px; font-size: 10px">20 C- Sydney</span>
                </div>
                <span style="width: 1px; height: 30px; border: 0.5px solid rgb(241, 241, 241)"></span>
                @if(Auth::guard()->check())
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                        <a href="{{ route('user-dashboard') }}" >
                            <i class="fas fa-address-card" style="opacity: 0.5"></i>
                            <span style="margin-top: -3px; font-size: 10px">{{ __('login.personal_page') }}</span>
                        </a>
                    </div>
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                        <i class="fas fa-comment-dots" style="opacity: 0.5"></i>
                        <span style="margin-top: -3px; font-size: 10px">{{ __('login.comments') }}</span>
                    </div>
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                        <i class="fas fa-envelope-open" style="opacity: 0.5"></i>
                        <span style="margin-top: -3px; font-size: 10px">{{ __('login.comments') }}</span>
                    </div>
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">

                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                            <i class="fa fa-sign-out" aria-hidden="true" style="opacity: 0.5"></i>
                            <span style="margin-top: -3px; font-size: 10px">{{ __('login.out') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @else
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                        <i class="fas fa-user-lock" style="opacity: 0.5"></i>
                        <a href="/login" in>
                            <span style="margin-top: -3px; font-size: 10px">{{ __('login.log_in') }}</span>
                        </a>
                    </div>
                    <span style="width: 1px; height: 30px; border: 0.5px solid rgb(241, 241, 241)"></span>
                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">
                        <i class="fas fa-user-plus" style="opacity: 0.5"></i>
                        <span style="margin-top: -3px; font-size: 10px">{{ __('login.sign_up') }}</span>
                    </div>
                    <span style="width: 1px; height: 30px; border: 0.5px solid rgb(241, 241, 241)"></span>
{{--                    <div style="display: inline-block; height: 40px; width: auto; margin-top: -1px; padding: 9px 9px 0px 10px">--}}
{{--                        <i class="fas fa-id-card" style="opacity: 0.5"></i>--}}
{{--                        <span style="margin-top: -3px; font-size: 10px">Contact</span>--}}
{{--                    </div>--}}
                    <span style="width: 1px; height: 30px; border: 0.5px solid rgb(241, 241, 241)"></span>
                @endif

            </div>
            <div class="co-1 ml-auto" style="margin-top: -3px;">
{{--                @if($article)--}}
{{--                    @if(isset($article->slug))--}}
{{--                        <span>--}}
{{--                                    <a href="/ua/news/{{ $article->slug.'_n'.$article->id }}">--}}
{{--                                        <img src="{{asset('/ico/icon-ua.png')}}" width="28" height="25">--}}
{{--                                    </a>--}}
{{--                                    <a href="/ru/news/{{ $article->slug.'_n'.$article->id }}">--}}
{{--                                        <img src="{{asset('/ico/icon-ru.png')}}" width="28" height="25">--}}
{{--                                    </a>--}}
{{--                                </span>--}}
{{--                    @else--}}
{{--                        <span>--}}
{{--                                    <a href="/ua/news/{{ $article->id }}">--}}
{{--                                        <img src="{{asset('/ico/icon-ua.png')}}" width="28" height="25">--}}
{{--                                    </a>--}}
{{--                                    <a href="/ru/news/{{ $article->id }}">--}}
{{--                                        <img src="{{asset('/ico/icon-ru.png')}}" width="28" height="25">--}}
{{--                                    </a>--}}
{{--                                </span>--}}
{{--                    @endif--}}
{{--                @else--}}
                    <span>
                                <img src="{{asset('/ico/icon-ua.png')}}" onclick="set_lang('ua')" width="28" height="25">
                                <a href="/" hidden></a>
                                <img src="{{asset('/ico/icon-ru.png')}}" onclick="set_lang('ru')" width="28" height="25">
                                <a href="/ru" hidden></a>
                            </span>
{{--                @endif--}}
            </div>
        </div>
    </div>
</div>

<script>
    function set_lang(lang) {
        $.ajax({
            url: '{{ route('set-lang') }}',
            method: 'post',
            data: {"_token": '{{ csrf_token() }}', 'lang': lang},
            success: function (){
                location.reload();
            }
        });
    }
</script>
