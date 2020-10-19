@if($left_news)
    @foreach($left_news as $k => $v)
        @if(is_int($k / 12))
            <div class="row" style="padding-left: 50px;">
                @include('module.ads.block2')
            </div>
        @endif
        <div class="row">
            <span style="font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px">
                <a style="color: rgba(31,32,36,0.79); text-decoration: none" href="/news/{{ $v->slug.'_n'.$v->id }}">{{ $v->title }}</a>
            </span>
        </div>
    @endforeach
@endif
