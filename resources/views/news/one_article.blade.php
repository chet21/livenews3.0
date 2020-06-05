@extends('layouts.index')

@section('body')
    <div class="container" style="margin-top: 25px">
        <div class="row" style="height: 200px">
            <div class="col-12" style="height: inherit; background: url('{{ $article->img }}') no-repeat center center / cover;"></div>
            <div style="position: absolute; height: inherit; width: inherit; background: rgba(0,0,0,0.6);"></div>
            <div style="position: absolute; font-size: 35px; margin-top: 60px; margin-left: 30px; color: white; font-family: 'PT Sans Narrow', sans-serif;">{{ $article->title_ua }}</div>
            <div style="position: absolute; margin-top: 110px; margin-left: 30px; padding: 2px 15px 2px 15px; border-radius: 3px; background: white">{{ $article->categories->title_ua}}</div>
            <div style="position: absolute; margin-top: 110px; margin-left: 140px; padding: 2px 15px 2px 15px; border-radius: 3px; background: white">{{ $article->origin_id}}</div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="row" style="margin-top: 25px">
                    <div class="col-12" style="border: 1px solid #F1F1F1; padding: 25px">
                        {{--                <div style="height: 100px; width: 100px;float: left; margin: 0 10px 10px 0;">{{ $article->text_ua[0] }}</div>--}}
                        <p style="display: inline; float: left">{!! $article->text_ua !!}</p>
                        <div style="height: 1px; border-top: 1px solid #F1F1F1; padding-top: 25px; height: auto">
                            <i class="fas fa-tags" style="opacity: 0.5"></i>
                            @foreach( $article->tags->unique()->values()->all() as $tag)
                                <div style="display: inline-block; color: #686868; margin-left: 15px; text-decoration: underline ">{{ $tag->title_ua }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 25px">
                    <div class="col-12" style="border: 1px solid #F1F1F1; padding: 25px">
                        <div class="row">
                            @foreach($article->comments as $comment)
                                <div class="col-12" style="min-height: 50px; border: 1px solid #F1F1F1; margin-bottom: 10px">
                                    <div class="row">
                                        <div class="col-1" style="margin-left: -15px">
                                            <div style="height: 50px; width: 50px; margin: 5px; padding: 5px; border: 1px solid silver; border-radius: 50%">
                                                <i class="far fa-smile" style="height: 10px; width: 10px; margin-left: 12px; margin-top: 10px"></i>
                                            </div>
                                        </div>
                                        <div class="col-10">
                                            <div style="font-weight: bold; margin-top: 5px; margin-left: 5px">{{ $comment->users->name }}</div>
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                <span style="font-weight: lighter; margin-left: 5px; font-size: 11px; cursor: pointer" onclick="comment_response('{{$comment->users->id}}', '{{ \Illuminate\Support\Str::snake($comment->users->name) }}')">{{ '#'.\Illuminate\Support\Str::snake($comment->users->name) }}</span>
                                            @else
                                            @endif
                                            <div style="margin-top: 5px; margin-left: 5px">{{ $comment->text }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 25px">
                    <div class="col-6" style="border: 1px solid #F1F1F1; padding: 25px"></div>
                    <div class="col-6" style="border: 1px solid #F1F1F1; padding: 25px"></div>
                </div>
                @auth()
                    <div class="row" style="margin-top: 25px; color: #56B3E8">
                        <div class="col-12" style="border: 1px solid #F1F1F1; padding: 25px; height: 55px"></div>
                        <div class="col-12" style="border: 1px solid #F1F1F1; padding: 25px; margin-top: -1px">
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <span>Імя</span>--}}
{{--                                    <input style="height: 40px; width: 100%; border: 1px solid #F1F1F1;">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row" style="margin-top: 25px">--}}
{{--                                <div class="col-12">--}}
{{--                                    <span>email</span>--}}
{{--                                    <input style="height: 40px; width: 100%; border: 1px solid #F1F1F1;">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row" style="margin-top: 25px">
                                <div class="col-12">
                                    <span>Повідомлення</span>
                                    <textarea id="text" style="height: 120px; width: 100%; border: 1px solid #F1F1F1;"></textarea>
                                </div>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <div id="comment_response_form">
                                    <i class="fas fa-reply" style="display: none"></i>
                                    <span id="comment_response_form_item"></span>
                                </div>
                            @else
                            @endif
                            <div class="row" style="margin-top: 25px">
                                <div class="col-12">
                                    <button id="send_comment" class="btn" style="background: #56B3E8; color: #F1F1F1">Відправити коментар</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="row" style="margin-top: 25px; color: #56B3E8">
                        <div class="col-12" style="border: 1px solid #F1F1F1; padding: 25px; height: 55px">
                            <div style="margin-left: -25px; margin-top: -13px; padding-left: 25px; color: #56B3E8; font-family: 'PT Sans Narrow', sans-serif; font-size: 20px; border-left: 3px solid #56B3E8; width: 100%; cursor:progress" onclick="come_back()">Авторизуйся щоб коментувати</div>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <script>
        function comment_response(user_id_for_response, user_response_name) {
            $('#comment_response_form_item').text(user_response_name);
            $('#fa-reply').css('display', 'block');
        }

        function come_back() {
            $('html, body').animate({scrollTop: 0},500);
        }

        $('#send_comment').on('click', function () {
            let text = $('#text').val();
            $.ajax({
                url: "{{ route('set_comment') }}",
                method: 'post',
                data: {"_token": '{{ csrf_token() }}', "data": {"article_id": "{{ $article->id }}", "text": text }},
                success: function (response) {
                    if(response.message !== 'ok'){
                        alert('ok')
                    }
                }
            });
        });
    </script>
@endsection
