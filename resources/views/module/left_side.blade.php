<div class="row" style="padding-left: 50px;">
    @include('module.ads.block2')
</div>
<div class="row">
    @foreach(\App\Models\Article::limit(20)->get() as $article)
        <span style="font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px">
            <a style="color: rgba(31,32,36,0.79); text-decoration: none" href="/news/{{ $article->slug.'_n'.$article->id }}">{{ $article->title_ua }}</a>
        </span>
    @endforeach
</div>
<div class="row" style="padding-left: 50px;">
    @include('module.ads.block2')
</div>
<div class="row">
    @foreach(\App\Models\Article::offset(20)->limit(20)->get() as $article)
        <span style="font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px">
            <a style="color: rgba(31,32,36,0.79); text-decoration: none" href="/news/{{ $article->slug.'_n'.$article->id }}">{{ $article->title_ua }}</a>
        </span>
    @endforeach
</div>
<div class="row" style="padding-left: 50px;">
    @include('module.ads.block2')
</div>
<div class="row">
    @foreach(\App\Models\Article::offset(40)->limit(20)->get() as $article)
        <span style="font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px">
            <a style="color: rgba(31,32,36,0.79); text-decoration: none" href="/news/{{ $article->slug.'_n'.$article->id }}">{{ $article->title_ua }}</a>
        </span>
    @endforeach
</div>
<div class="row" style="padding-left: 50px;">
    @include('module.ads.block2')
</div>
<div class="row">
    @foreach(\App\Models\Article::offset(60)->limit(20)->get() as $article)
        <span style="font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px">
            <a style="color: rgba(31,32,36,0.79); text-decoration: none" href="/news/{{ $article->slug.'_n'.$article->id }}">{{ $article->title_ua }}</a>
        </span>
    @endforeach
</div>
<div class="row" style="padding-left: 50px;">
    @include('module.ads.block2')
</div>