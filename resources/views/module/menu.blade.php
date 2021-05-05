<style>

</style>
<div class="container-fluid" style="min-height: 50px; background: rgb(31, 32, 36)">
    <div class="container">
        <div class="row">
            <div>
                <div class="col-12 d-none d-xl-block d-lg-block" style="margin-top: 13px">
                    @if(\Illuminate\Support\Facades\App::getLocale() == 'ua')
                        <a style="color: #7BCEF8; font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px; text-decoration: none" href="/">Головна</a>
                    @elseif(\Illuminate\Support\Facades\App::getLocale() === 'ru')
                        <a style="color: #7BCEF8; font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px; text-decoration: none" href="/">Главная</a>
                    @endif
                    @foreach(\App\Models\Category::select('title_'.\Illuminate\Support\Facades\App::getLocale().' as title_ua', 'position', 'slug')->whereHas('articles', function ($query) {
                            $query->where('img', '!=', '');
                        }, '>', 8)->get()->sortBy('position') as $category)
                        <span style="font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px">
                    <a style="color: white; " href="/category/{{ $category->slug }}">{{ $category->title_ua }}</a>
                </span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-xl-none d-lg-none d-md-block d-sm-block d-block" onclick="getXsMenu()" id="xs-menu-but" style="height: 27px; width: 46px; border: 0.5px solid silver; border-radius: 5px; margin-top: 10px; margin-left: 10px">
                <div style="height: 1.5px; width: 32px; border: 0.5px solid silver; margin-top: 5px; margin-left: 6px"></div>
                <div style="height: 1.5px; width: 32px; border: 1px solid silver; margin-top: 4px; margin-left: 6px"></div>
                <div style="height: 1.5px; width: 32px; border: 1px solid silver; margin-top: 4px; margin-left: 6px"></div>
            </div>
            <div class="co-1 ml-auto d-xl-none d-lg-none d-md-block d-sm-block d-block" style="margin-top: 13px;">
                        <span>
                            <img src="{{asset('/ico/icon-ua.png')}}" onclick="set_lang('ua')" width="28" height="25">
                            <a href="/" hidden></a>
                            <img src="{{asset('/ico/icon-ru.png')}}" onclick="set_lang('ru')" width="28" height="25">
                            <a href="/ru" hidden></a>
                        </span>
            </div>
        </div>
        <div class="row">
            <div class="d-xl-none d-lg-none d-md-block d-sm-block d-block">
                <div id="xs-menu" class="col-12 d-xl-none d-lg-none" style="margin-top: 20px; margin-bottom: 25px">
                    @if(\Illuminate\Support\Facades\App::getLocale() == 'ua')
                        <a style="color: #7BCEF8; font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px; text-decoration: none" href="/">Головна</a>
                    @elseif(\Illuminate\Support\Facades\App::getLocale() === 'ru')
                        <a style=" font-size: 15px; color: #7BCEF8; font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px; text-decoration: none" href="/">Главная</a>
                    @endif
                    @foreach(\App\Models\Category::select('title_'.\Illuminate\Support\Facades\App::getLocale().' as title_ua', 'position', 'slug')->whereHas('articles', function ($query) {
                            $query->where('img', '!=', '');
                        }, '>', 8)->get()->sortBy('position') as $category)
                        <div class="menu_item col-12" style="width:100%; color: white; padding-top: 10px">
                    <span style="font-family: 'PT Sans Narrow', sans-serif; padding-top: 10px">
                        <a style="color: white; font-size: 15px; " href="/category/{{ $category->slug }}">{{ $category->title_ua }}</a>
                    </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $('#xs-menu').hide();
    function getXsMenu()
    {
        $menu_raw = $('#xs-menu')
        $menu_items = $menu_raw.find('.menu_item').length;

        if($menu_items > 0 && $menu_raw.is(":hidden")){
            $menu_raw.show();
        }else if($menu_items > 0 && $menu_raw.is(":visible")){
            $menu_raw.hide();
        }
    }
</script>
