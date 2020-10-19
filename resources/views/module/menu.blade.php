<style>

</style>
<div class="container-fluid" style="min-height: 50px; background: rgb(31, 32, 36)">
    <div class="container">
        <div class="row">
            <div class="col-12 d-none d-xl-block d-lg-block" style="margin-top: 13px">
                <a style="color: #7BCEF8; font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px; text-decoration: none" href="/">Головна</a>
                @foreach(\App\Models\Category::whereHas('articles', function ($query) {
                        $query->where('img', '!=', '');
                    }, '>', 8)->get()->sortBy('position') as $category)
                    <span style="font-family: 'PT Sans Narrow', sans-serif; padding: 13px 15px 0px 13px">
                    <a style="color: white; " href="/category/{{ $category->slug }}">{{ $category->title_ua }}</a>
                </span>
                @endforeach
            </div>
            <div class="d-xl-none d-lg-none" onclick="getXsMenu()" id="xs-menu-but" style="height: 30px; width: 50px; border: 1px solid silver; border-radius: 5px; margin-top: 10px; margin-left: 10px">
                <div style="height: 1.5px; width: 35px; border: 1px solid silver; margin-top: 6px; margin-left: 6px"></div>
                <div style="height: 1.5px; width: 35px; border: 1px solid silver; margin-top: 5px; margin-left: 6px"></div>
                <div style="height: 1.5px; width: 35px; border: 1px solid silver; margin-top: 5px; margin-left: 6px"></div>
            </div>
            <div id="xs-menu" class="col-12 d-xl-none d-lg-none">
                @foreach(\App\Models\Category::whereHas('articles', function ($query) {
                        $query->where('img', '!=', '');
                    }, '>', 8)->get()->sortBy('position') as $category)
                    <div class="menu_item col-12" style="width:100%; color: white; padding-top: 10px">
                    <span style="font-family: 'PT Sans Narrow', sans-serif; padding-top: 10px">
                        <a style="color: white; " href="/category/{{ $category->slug }}">{{ $category->title_ua }}</a>
                    </span>
                    </div>
                @endforeach
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
