@extends('layouts.index')

@section('body')
    <div class="d-none d-xl-block d-lg-block d-md-block d-sm-none d-none" style="margin-top: 30px"></div>
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-sm-12 col-xs-12">
                <div class="row" style="height: 225px; ">
                    @isset($hotNews[0])
                        <div class="col-12" style="border-right: 1px solid white; border-bottom: 1px solid white; background: url('{{ $hotNews[0]->img }}') no-repeat center center / cover">
                            <div style="position: absolute; bottom: 20px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; z-index: 100">
                                <a style="color: white; text-decoration: none" href="{{ route('one_article', [$hotNews[0]->slug.'_n'.$hotNews[0]->id]) }}">{{ $hotNews[0]->title }}</a>
                            </div>
                            <div style="position: absolute; bottom: 5px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; font-size: 10px; z-index: 100">{{ date('y-m-d H:i', strtotime($hotNews[0]->created_at)) }}</div>
                            <div style="position: absolute; bottom: 0; left: 0; width: inherit; height: 100px; opacity: 0.9; background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,1));"></div>
                        </div>
                        <div style="position: absolute; height: auto; padding: 4px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; background: {{ $hotNews[0]->categories->color }}">{{ $hotNews[0]->categories->title }}</div>
                    @endisset

                </div>
                <div class="row" style="height: 225px">
                    @isset($hotNews[1])
                        <div class="col-12" style="border-right: 1px solid white; border-bottom: 1px solid white; background: url('{{ $hotNews[1]->img }}') no-repeat center center / cover">
                            <div style="position: absolute; bottom: 20px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; z-index: 100">
                                <a style="color: white; text-decoration: none" href="{{ route('one_article', [$hotNews[1]->slug.'_n'.$hotNews[1]->id]) }}">{{ $hotNews[1]->title }}</a>
                            </div>
                            <div>
                                <i class="far fa-clock"></i>
                                <div style="position: absolute; bottom: 5px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; font-size: 10px; z-index: 100">{{ date('y-m-d H:i', strtotime($hotNews[1]->created_at)) }}</div>
                            </div>
                            <div style="position: absolute; bottom: 0; left: 0; width: inherit; height: 100px; opacity: 0.9; background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,1));"></div>
                        </div>
                        <div style="position: absolute; height: auto; padding: 4px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; background: {{ $hotNews[1]->categories->color }}">{{ $hotNews[1]->categories->title }}</div>
                    @endisset
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 col-sm-12 col-xs-12">
                <div class="row" style="height: 225px">
                    @isset($hotNews[2])
                        <div class="col-12" style="border-right: 1px solid white; border-bottom: 1px solid white; background: url('{{ $hotNews[2]->img }}') no-repeat center center / cover">
                            <div style="position: absolute; bottom: 20px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; z-index: 100">
                                <a style="color: white; text-decoration: none" href="{{ route('one_article', [$hotNews[2]->slug.'_n'.$hotNews[2]->id]) }}">{{ $hotNews[2]->title }}</a>
                            </div>
                            <div style="position: absolute; bottom: 5px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; font-size: 10px; z-index: 100">{{ date('y-m-d H:i', strtotime($hotNews[2]->created_at)) }}</div>
                            <div style="position: absolute; bottom: 0; left: 0; width: inherit; height: 100px; opacity: 0.9; background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,1));"></div>
                        </div>
                        <div style="position: absolute; height: auto; padding: 4px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; background: {{ $hotNews[2]->categories->color }}">{{ $hotNews[2]->categories->title }}</div>
                    @endisset
                </div>
                <div class="row" style="height: 225px; ">
                    @isset($hotNews[3])
                        <div class="col-12" style="border-right: 1px solid white; border-bottom: 1px solid white; background: url('{{ $hotNews[3]->img }}') no-repeat center center / cover">
                            <div style="position: absolute; bottom: 20px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; z-index: 100">
                                <a style="color: white; text-decoration: none" href="{{ route('one_article', [$hotNews[3]->slug.'_n'.$hotNews[4]->id]) }}">{{ $hotNews[3]->title }}</a>
                            </div>
                            <div style="position: absolute; bottom: 5px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; font-size: 10px; z-index: 100">{{ date('y-m-d H:i', strtotime($hotNews[3]->created_at)) }}</div>
                            <div style="position: absolute; bottom: 0; left: 0; width: inherit; height: 100px; opacity: 0.9; background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,1));"></div>
                        </div>
                        <div style="position: absolute; height: auto; padding: 4px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; background: {{ $hotNews[3]->categories->color }}">{{ $hotNews[3]->categories->title }}</div>
                    @endisset
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 d-none d-xl-block d-lg-block">
                <div class="row" style="height: 225px">
                    @isset($hotNews[4])
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="border-right: 1px solid white; border-bottom: 1px solid white; background: url('{{ $hotNews[4]->img }}') no-repeat center center / cover">
                            <div style="position: absolute; bottom: 20px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; z-index: 100">
                                <a style="color: white; text-decoration: none" href="{{ route('one_article', [$hotNews[4]->slug.'_n'.$hotNews[4]->id]) }}">{{ $hotNews[4]->title }}</a>
                            </div>
                            <div style="position: absolute; bottom: 5px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; font-size: 10px; z-index: 100">{{ date('y-m-d H:i', strtotime($hotNews[4]->created_at)) }}</div>
                            <div style="position: absolute; bottom: 0; left: 0; width: inherit; height: 100px; opacity: 0.9; background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,1));"></div>
                        </div>
                        <div style="position: absolute; height: auto; padding: 4px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; background: {{ $hotNews[4]->categories->color }}">{{ $hotNews[4]->categories->title }}</div>
                    @endisset
                </div>
                <div class="row" style="height: 225px; ">
                    @isset($hotNews[5])
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-xs-12" style="border-right: 1px solid white; border-bottom: 1px solid white; background: url('{{ $hotNews[5]->img }}') no-repeat center center / cover">
                            <div style="position: absolute; bottom: 20px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; z-index: 100">
                                <a style="color: white; text-decoration: none" href="{{ route('one_article', [$hotNews[5]->slug.'_n'.$hotNews[5]->id]) }}">{{ $hotNews[5]->title }}</a>
                            </div>
                            <div style="position: absolute; bottom: 5px; padding-left: 5px; padding-right: 5px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; font-size: 10px; z-index: 100">{{ date('y-m-d H:i', strtotime($hotNews[5]->created_at)) }}</div>
                            <div style="position: absolute; bottom: 0; left: 0; width: inherit; height: 100px; opacity: 0.9; background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,1));"></div>
                        </div>
                        <div style="position: absolute; height: auto; padding: 4px; color: #F1F1F1; font-family: 'PT Sans Narrow', sans-serif; background: {{ $hotNews[5]->categories->color }}">{{ $hotNews[5]->categories->title }}</div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 25px">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-md-12 col-sm-12 col-xs-12">
                    @foreach($bodyNews as $category)
                        <div class="row"  style="border: 1px solid #F1F1F1; height: 45px">
                            <div class="col-12 ml-auto">
                                <div style="position: absolute; width: 100%; height: 20px; margin-top: 13px; margin-left: -15px; border-left: 3px solid {{ $category[0]->categories->color }}; border-right: 3px solid {{ $category[0]->categories->color }}">
                                    <div style="margin-left: 20px; margin-top: -8px;  font-family: 'PT Sans Narrow', sans-serif; font-size: 25px; color: {{ $category[0]->categories->color }}">{{ $category[0]->categories->title }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border: 1px solid #F1F1F1; margin-top: -1px; ">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                @foreach($category as $k => $article)
                                    <div class="row">
                                        @if($k <= 1)
                                            @if($k == 1)
                                                <div class="col-12" style="min-height: 400px; width: 400px;">
                                                    <div style="min-height: 380px; width: 350px; margin-top: 20px; padding-bottom: 15px; background: white;">
                                                        <div style="width: inherit; height: 210px; background: url('{{ $article->img }}') no-repeat center center / cover"></div>
                                                        <div style="width: inherit; min-height: 45px; margin-top: 10px; font-family: 'PT Sans Narrow', sans-serif; padding-left: 5px; font-size: 18px">
                                                            <a style="color: #1F2024 ; text-decoration: none" href="{{ route('one_article', [$article->slug.'_n'.$article->id]) }}">{{ $article->title }}</a>
                                                        </div>
                                                        <div style="width: inherit; min-height: 15px; margin-top: 10px;  padding-left: 5px; font-size: 13px">
                                                            <i class="far fa-clock"></i>
                                                            <span>{{ date('Y-m-d H:i', strtotime($article->created_at)) }}</span>
                                                            <i class="far fa-eye" style="margin-left: 15px"></i>
                                                            <span>({{ $article->views }})</span>
                                                            <i class="far fa-comments" style="margin-left: 15px"></i>
                                                            <span>(0)</span>
                                                        </div>
                                                        <div style="width: inherit; min-height: 60px; margin-top: 10px">{{ strip_tags($article->description) }}</div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-12" style="min-height: 430px; width: 400px;">
                                                    <div style="min-height: 380px; width: 350px; margin-top: 20px; padding-bottom: 15px; background: white; border-bottom: 1px solid #F1F1F1">
                                                        <div style="width: inherit; height: 210px; background: url('{{ $article->img }}') no-repeat center center / cover"></div>
                                                        <div style="width: inherit; min-height: 45px; margin-top: 10px; font-family: 'PT Sans Narrow', sans-serif; padding-left: 5px; font-size: 18px">
                                                            <a style="color: #1F2024; text-decoration: none" href="{{ route('one_article', [$article->slug.'_n'.$article->id]) }}">{{ $article->title }}</a>
                                                        </div>
                                                        <div style="width: inherit; min-height: 15px; margin-top: 10px;  padding-left: 5px; font-size: 13px">
                                                            <i class="far fa-clock"></i>
                                                            <span>{{ date('Y-m-d H:i', strtotime($article->created_at)) }}</span>
                                                            <i class="far fa-eye" style="margin-left: 15px"></i>
                                                            <span>({{ $article->views }})</span>
                                                            <i class="far fa-comments" style="margin-left: 15px"></i>
                                                            <span>(0)</span>
                                                        </div>
                                                        <div style="width: inherit; min-height: 60px; margin-top: 10px">{{ strip_tags($article->description) }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="row">
                                    @foreach($category as $k => $article)
                                        @if($k >= 2)
                                            <div class="col-12" style="height: 155px; width: 400px;">
                                                @if($k == 7)
                                                    <div style="width: 350px; height: 120px; margin-top: 20px; background: white;">
                                                        <div class="row" >
                                                            <div class="col-5">
                                                                <div style="width: inherit; height: 100px; background: red; background: url('{{ $article->img }}') no-repeat center center / cover"></div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div style="width: inherit; font-family: 'PT Sans Narrow', sans-serif; margin-top: 5px">
                                                                    <a style="color: #1F2024; text-decoration: none" href="{{ route('one_article', [$article->slug.'_n'.$article->id]) }}">{{ $article->title }}</a>
                                                                </div>
                                                                {{--                                                        <div style="width: inherit; height: 15px; font-family: 'PT Sans Narrow', sans-serif; margin-top: 5px; font-size: 15px">{{ $article->created_at }}</div>--}}
                                                                <div style="width: inherit; min-height: 15px; margin-top: 10px;  padding-left: 5px; font-size: 10px">
                                                                    <i class="far fa-clock"></i>
                                                                    <span>{{ date('Y-m-d H:i', strtotime($article->created_at)) }}</span>
                                                                    <i class="far fa-eye" style="margin-left: 5px"></i>
                                                                    <span>({{ $article->views }})</span>
                                                                    <i class="far fa-comments" style="margin-left: 5px"></i>
                                                                    <span>(0)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else()
                                                    <div style="width: 350px; height: 130px; margin-top: 20px; background: white; border-bottom: 1px solid #F1F1F1">
                                                        <div class="row" >
                                                            <div class="col-5">
                                                                <div style="width: inherit; height: 100px; background: red; background: url('{{ $article->img }}') no-repeat center center / cover"></div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div style="width: inherit; font-family: 'PT Sans Narrow', sans-serif; margin-top: 5px">
                                                                    <a style="color: #1F2024; text-decoration: none" href="{{ route('one_article', [$article->slug.'_n'.$article->id]) }}">{{ $article->title }}</a>
                                                                </div>
                                                                {{--                                                        <div style="width: inherit; height: 15px; font-family: 'PT Sans Narrow', sans-serif; margin-top: 5px; font-size: 15px">{{ $article->created_at }}</div>--}}
                                                                <div style="width: inherit; min-height: 15px; margin-top: 10px;  padding-left: 5px; font-size: 10px">
                                                                    <i class="far fa-clock"></i>
                                                                    <span>{{ date('Y-m-d H:i', strtotime($article->created_at)) }}</span>
                                                                    <i class="far fa-eye" style="margin-left: 5px"></i>
                                                                    <span>({{ $article->views }})</span>
                                                                    <i class="far fa-comments" style="margin-left: 5px"></i>
                                                                    <span>(0)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-md-6 d-none d-lx-block d-lg-block" style="padding-left: 30px; font-size: 14px">
                    @include('module.left_side')
                </div>
            </div>
        </div>
@endsection

{{--col-xl-4 col-lg-4 col-md-4 d-none d-sm-block d-md-block--}}
