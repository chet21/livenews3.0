@extends('layouts.index')

@section('body')
    @isset($articles)
        <div class="container">
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-8 ">--}}
{{--                    <div style="display: inline-block; width: 500px; height: 100px; margin-top: 15px">--}}
{{--                        @include('module.ads.block1')--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row" style="margin-top: 15px">
                @foreach($articles as $article)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-sm-12 col-xs-12" style="height: 200px; background: url({{ $article->img }}) no-repeat center center / cover; border: solid white 2px;">
                        <div style="position: absolute; bottom: 20px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; z-index: 100">
                            <a style="color: white; text-decoration: none" href="{{ route('one_article', [$article->slug.'_n'.$article->id]) }}">{{ $article->title_ua }}</a>
                        </div>
                        <div style="position: absolute; bottom: 5px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; font-size: 10px; z-index: 100">{{ date('y-m-d', strtotime($article->created_at)) }}</div>
                        <div style="position: absolute; bottom: 0; left: 0; width: inherit; height: 100px; opacity: 0.9; background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,1));"></div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-8 col-md-12 col-sm-12 col-xs-12">
                    <div style="display: inline-block; width: 500px; height: 100px; margin-top: 15px">
                        @include('module.ads.block1')
                    </div>
                </div>
            </div>
{{--           <div class="row justify-content-center" style="margin-top: 15px">--}}
{{--               <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-sm-12 col-xs-12">--}}
{{--                   {{ $articles->links() }}--}}
{{--               </div>--}}
{{--           </div>--}}
        </div>
    @endisset
@endsection
